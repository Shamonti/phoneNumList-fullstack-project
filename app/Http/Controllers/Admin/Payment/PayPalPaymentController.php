<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Payment\StripeController;
use App\Models\Card;
use App\Models\Credit;
use App\Models\PhoneListUserModel;
use App\Models\PurchasePlan;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Common\PayPalModel;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use Notification;

class PayPalPaymentController extends Controller
{
    protected static $user;
    protected static $card;
    private $purchaseValue;
    public function handlePayment($price)
    {

    }
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }
    public function payWithpaypal(Request $request)
    {

        if ($request->price == 0)
        {
            return redirect('/settings/upgrade')->with('message','please choose your plan first');
        }
        else
        {
            $this->purchaseValue = $request;
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $item_1 = new Item();

            $item_1->setName("$request->plan") /** item name **/
            ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($request->price); /** unit price **/

            $item_list = new ItemList();
            $item_list->setItems(array($item_1));

            $amount = new Amount();
            $amount->setCurrency('USD')
                ->setTotal($request->price);

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Your transaction description');

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));


            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
            try {

                $payment->create($this->_api_context);

            } catch (\PayPal\Exception\PPConnectionException $ex) {

                if (\Config::get('app.debug')) {

                    \Session::put('error', 'Connection timeout');
                    return Redirect::to('/');

                } else {

                    \Session::put('error', 'Some error occur, sorry for inconvenient');
                    return Redirect::to('/');

                }

            }

            foreach ($payment->getLinks() as $link) {

                if ($link->getRel() == 'approval_url') {

                    $redirect_url = $link->getHref();
                    break;

                }

            }

            /** add payment ID to session **/
            Session::put('paypal_payment_id', $payment->getId());

            if (isset($redirect_url)) {

                /** redirect to paypal **/
                return Redirect::away($redirect_url);

            }

            Session::put('error', 'Unknown error occurred');
            return Redirect::to('/settings/billing');
        }

    }

    public function getPaymentStatus()
    {

        $request=request();//try get from method

        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        //if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
        if (empty($request->PayerID) || empty($request->token)) {

            Session::put('error', 'Payment failed');
            return Redirect::to('/settings/billing');

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        //$execution->setPayerId(Input::get('PayerID'));
        $execution->setPayerId($request->PayerID);

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            Session::put('success', 'Payment success');
            //add update record for cart
            PurchasePlan::createNew($this->purchaseValue);
            Credit::updateCradit($this->purchaseValue);

            self::invoice($request);

            return redirect('/settings/plans'); //back to product page

        }

        Session::put('error', 'Payment failed');
        return Redirect::to('/settings/billing');

    }

    public static function invoice($request)
    {
        self::$user = PhoneListUserModel::where('id',$request->userId)->get();
        self::$card = Card::where('userId', $request->userId)->last();
        foreach (self::$user as $userInfo){
            $data["email"] = $userInfo->email;
        }

        if (self::$card)
        {
            $data["address"]= self::$card->address;
            $data["city"]= self::$card->city;
            $data["state"]= self::$card->state;
        }
        $data["country"]= self::$user->country;
        $data["date"]= Carbon::now()->toString();
        $data["paidBy"]= $request->paidBy;
        $data["amount"]= $request->price;
        $data["credit"]= $request->credit;
        $data["phoneNumber"]= $request->phoneNumber;
        $data["dataFilter"]= $request->dataFilter;
        $data["csvExport"]= $request->csvExport;


        $data["total"]= $request->price;

        $data["title"] = "From phonelist.io";
        $data["body"] = "This is Demo";

        $pdf = PDF::loadView('myTestMail', $data);

        Mail::send('myTestMail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "invoice.pdf");
        });
    }
}
