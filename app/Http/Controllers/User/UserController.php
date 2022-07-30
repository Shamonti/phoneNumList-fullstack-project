<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Country;
use App\Models\Credit;
use App\Models\CreditHistory;
use App\Models\CSVExportSettings;
use App\Models\DownloadedList;
use App\Models\ExportHistori;
use App\Models\PhoneList;
use App\Models\PhoneListUserModel;
use App\Models\PurchasePlan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Session;
use Illuminate\Support\Facades\Auth;
use Storage;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    protected $email;
    protected $password;
    protected $emailAuth;
    protected $passwordAuth;
    protected $data;
    protected $id;
    protected $user;
    protected $allData;
    protected $credit;
    protected $creditHistory;
    protected $exportHistory;
    protected $purchasePlan;
    protected $creditHistorydate;
    protected $allDataIds;
    protected $allDataIds2;
    protected $countries;
    protected $dataAll;



    public function dashboard()
    {
        /*if(Auth::check()){*/

        // to handle -1 error in credit
        $this->dataAll = DB::table('phone_lists')
            ->whereNotNull('phone')
            ->count();
        $this->credit = Credit::where('userId', Auth::user()->id)->first();
        if ($this->credit->useableCredit == -1)
        {
            Credit::errorCredit();
        }
        $this->creditHistory = CreditHistory::where('userId',Auth::user()->id)->orderBy('date', 'desc')->get();
        $this->purchasePlan = PurchasePlan::where('userId',Auth::user()->id)->orderBy('start', 'desc')->get();
        $this->creditHistorydate = CreditHistory::where('userId',Auth::user()->id)->orderBy('date', 'desc')->get();

        $date = [];
        $k=0;
        foreach ($this->creditHistorydate as $historyDate)
        {
            $date [$k] = $historyDate->date;
            $k++;
        }

        $i=0;
        $dataPurchase = [];
        foreach ($this->creditHistory as $history)
        {
            $dataPurchase [$i] = $history->dataPurchase;
            $i++;
        }

        $j=0;
        $creditPurchase = [];
        /*foreach ($this->purchasePlan as $plan)
        {
            if($date[$j] == $plan->start)
            {
                $creditPurchase [$j] = $plan->credit;
            }
            else
            {
                $creditPurchase [$j] = 0;
            }

            $j++;
        }*/
        return view('userDashboard.userDashboard',['userHistory'=> $this->creditHistory, 'mobile_number'=> $this->dataAll ])->with('data',json_encode($dataPurchase,JSON_NUMERIC_CHECK))->with('credit',json_encode($creditPurchase,JSON_NUMERIC_CHECK))->with('day',json_encode($date,JSON_NUMERIC_CHECK));

        /*}
        return redirect('/phonelistUserLogin')->with('message','Oppes! You have entered invalid credentials');*/

    }
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function userRegister()
    {
        return view('user.userRegister');
    }

    public function newUser(Request $request)
    {
        $data = $request->all();
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email|unique:phone_list_user_models,email',
            'password' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'phone'=>'required|min:11|numeric|unique:phone_list_user_models',
            'country' => 'required',
        ]);
        if ($validator->fails()) {
            //$errors = $validator->errors();
            return redirect()->back()->with('message1', 'The email or phone number has already been taken');
        } else {
            $check = $this->create($data);
            $newUser = PhoneListUserModel::where('email', $data['email'])->first();
            PurchasePlan::create($newUser);
            Credit::create([
                'userId' => $newUser->id,
                'useableCredit' => 20,
            ]);
            CreditHistory::createNew($newUser);
            CSVExportSettings::create($newUser);
            return redirect("/phonelistUserLogin")->with('message2', 'data Updated Successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
        return PhoneListUserModel::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'name' => $data['firstName'].' '.$data['lastName'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'purchasePlan' => 'Free',
            'useAbleCredit' => 20,
        ]);
    }


    /** start updating user information*/
    public function updateUserFirstName(Request $request, $id)
    {
        $this->user = PhoneListUserModel::where('id', $id)->update(['firstName' => $request->firstName]);
        return redirect()->back();

    }
    public function updateUserLastName(Request $request, $id)
    {
        $this->user = PhoneListUserModel::where('id', $id)->update(['lastName' => $request->lastName]);
        return redirect()->back();

    }
    public function updateUserTitle(Request $request)
    {
        $this->user = PhoneListUserModel::where('id', Auth::user()->id)->update(['title' => $request->title]);
        return redirect()->back();

    }
    public function updateUserPhone(Request $request, $id)
    {
        $this->user = PhoneListUserModel::where('id', $id)->update(['phone' => $request->phone]);
        return redirect()->back();

    }
    public function updateUserAddress(Request $request)
    {
        $this->user = PhoneListUserModel::where('id', Auth::user()->id)->update(['address' => $request->address]);
        return redirect()->back();

    }
    public function updateUserCountry($id)
    {
        $this->user = PhoneListUserModel::where('id', Auth::user()->id)->update(['country' => $id]);
        return redirect()->back();
    }
    public function updateUserEmail(Request $request, $id)
    {
        $this->user = PhoneListUserModel::where('id', $id)->update(['email' => $request->email]);
        return redirect()->back();

    }
    public function updateUserPassword(Request $request, $id)
    {
        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();
        return redirect()->back();

    }
    public function updateUserInfo($array)
    {
        $myArray = explode(',', $array);
        $address = array_slice($myArray,5);
        $myAddress = implode(',', $address);
        //dd($myAddress);

        $this->user = PhoneListUserModel::where('id', Auth::user()->id)->update(['firstName' => $myArray[1]]);
        $this->user = PhoneListUserModel::where('id', Auth::user()->id)->update(['lastName' => $myArray[2]]);
        $this->user = PhoneListUserModel::where('id', Auth::user()->id)->update(['title' => $myArray[3]]);
        $this->user = PhoneListUserModel::where('id', Auth::user()->id)->update(['phone' => $myArray[4]]);
        $this->user = PhoneListUserModel::where('id', Auth::user()->id)->update(['address' => $myAddress]);
        return redirect()->back();

    }
    /** end updating user information*/
    /** start add/updating user billing information*/

    public function addCardInfo(Request $request)
    {
        Card::create([
            'userId' => $request->userId,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'creditCardNumber' => $request->creditCardNumber,
            'expirationDate' => $request->expirationDate,
            'cvc' => $request->cvc,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'postalCode' => $request->postalCode,
        ]);
        return redirect()->route('billing');
    }
    public function updateCardInfo(Request $request)
    {
        Card::where('id', $request->cardId)->update([
            'userId' => $request->userId,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'creditCardNumber' => $request->creditCardNumber,
            'expirationDate' => $request->expirationDate,
            'cvc' => $request->cvc,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'postalCode' => $request->postalCode,
        ]);
        return redirect()->route('billing');
    }
    public function removeCard()
    {
        Card::where('userId', Auth::user()->id)->delete();
        return redirect()->route('billing');
    }

    /** end add/updating user billing information*/

    public function userLogin()
    {
        return view('user.userLogin');
    }
    public function userLoginAuth(Request $request)
    {
        return view('user.userLogin');
    }

    /*
     * Write code on Method
     *
     * @return response()
     */
    public function userAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $result = $request->email;
            $this->data = PhoneListUserModel::where('email', 'LIKE', $result. '%'  )->get();
            return redirect('loggedInUser')
                ->with( ['userData' => $this->data] )
                ->withSuccess('You have Successfully loggedin');
        }

        return redirect("/phonelistUserLogin")->with('message','Oppes! You have entered invalid credentials');


    }

    public function handleGoogleRegister($userArray)
    {
        $this->data = $userArray;
        return view('user.', ['newUserData'=>$this->data]);
    }

    public function people()
    {
        $this->countries = Country::all();
        $this->allDataIds = DownloadedList::where('userId', Auth::user()->id)->get();
            $getdownloadedIds = 0;
            foreach ($this->allDataIds as $dataIds)
            {
                $getdownloadedIds = $getdownloadedIds.','.$dataIds->downloadedIds;
            }

            $this->allData = DB::table('phone_lists')
                ->whereNotIn('id', explode(',',$getdownloadedIds))
                ->orderBy('first_name', 'ASC')
                ->paginate(15);
        $dataCount = DB::table('phone_lists')
            ->count();
        return view('userDashboard.people', ['allData' => $this->allData, 'country' => $this->countries, 'count'=>$dataCount]);
    }
    public function people_gender($gender)
    {
        $this->countries = Country::all();
        $this->data = DB::table('phone_lists')
            ->where('gender', '=', $gender)
            ->paginate(200);
        return view('front.gender', ['data'=>$this->data, 'country' => $this->countries])->with('dataId', $gender);
    }









    public function user($id)
    {
        $this->countries = Country::all();
        $this->data = Phonelist::find($id);
        $result = substr($this->data->first_name, 0, 3);
        $this->userData = PhoneList::where('full_name', 'LIKE', $result. '%'  )->get();

        return view('userDashboard.user.user', ['data'=>$this->data, 'country' => $this->countries])->with('userData', $this->userData);
    }


    public function peopleSearchById($id)
    {

        $this->countries = Country::all();
        $this->allDataIds = DownloadedList::where('userId', Auth::user()->id)->get();
        $getdownloadedIds = 0;
        foreach ($this->allDataIds as $dataIds)
        {
            $getdownloadedIds = $getdownloadedIds.','.$dataIds->downloadedIds;
        }
        $this->allData = PhoneList::where('id', $id )->orderBy('full_name', 'ASC')->paginate(15);
        return view('userDashboard.people', ['allData' => $this->allData, 'country' => $this->countries]);
    }

    public function peopleDataHistory(Request $request)
    {
        if($request->ajax())
        {
            $credit=Credit::where('userId',Auth::user()->id)->first();
            if ($credit->useableCredit >= 1)
            {
                Credit::updateUserCreditForOne($request);
                PhoneListUserModel::updateUseAbleCreditForOne($request, Auth::user()->id);
                ExportHistori::newExportHistoriForOne($request);
                DownloadedList::createForOne($request);
                CreditHistory::createForOne($request);
                $data = DB::table('phone_lists')
                    ->where('id', '=', $request->id)
                    ->get();
                echo json_encode($data);
            }

        }
    }


    public function peopleSearch(Request $request)
    {
        $this->countries = Country::all();
        $this->allDataIds = DownloadedList::where('userId', Auth::user()->id)->get();
        $getdownloadedIds = 0;
        foreach ($this->allDataIds as $dataIds)
        {
            $getdownloadedIds = $getdownloadedIds.','.$dataIds->downloadedIds;
        }
        $result = $request->name;
        $this->allData = DB::table('phone_lists')
            ->whereNotIn('id', explode(',',$getdownloadedIds))
            ->where('first_name', '=',  $result)
            ->orWhere('last_name', '=',  $result)
            ->orWhere('full_name', '=',  $result)
            ->orderBy('first_name', 'ASC')
            ->paginate(15);
        return view('userDashboard.people', ['allDataName' => $this->allData, 'country' => $this->countries, 'res' => $result]);
    }
    public function account()
    {
        return view('userDashboard.settings.account');
    }
    public function managePlan()
    {
        $data = PurchasePlan::where('userId', Auth::user()->id)->get();
        $this->credit = Credit::where('userId', Auth::user()->id)->first();
        $items[0] = $data->last()->plan;
        $items[1] = $this->credit->useableCredit;

        $items[2] = $this->credit->useableCredit;
        $items[3] = $data->last()->price;

        $monthName = Carbon::now()->subMonth()->format('M');
        if (Carbon::now()->format('M') == 'Jan')
        {
            $year = Carbon::now()->subYear()->format('Y');
        }
        else
        {
            $year = Carbon::now()->format('Y');
        }
        $day = Carbon::now()->subDays(30)->format('d');
        $items[4] = $monthName; $items[5] = $year; $items[6] = $day;
        //$date2 = Carbon::createFromFormat('Y-m-d', $data->last()->end);
        $monthName2 = Carbon::now()->format('M');
        $day2 = Carbon::now()->format('d');
        $items[7] = $monthName2; $items[8] = $day2; $items[9] = Carbon::now()->format('Y');

        $from = Carbon::now()->subDays(30)->format('Y-m-d');
        $to = Carbon::now()->format('Y-m-d');

        $this->creditHistory = CreditHistory::whereBetween('date', [$from, $to])->get();
        $items[10] = 0;
        $items[11] = $this->credit->useableCredit;
        foreach ($this->creditHistory as $credithistory)
        {
            $items[10]= $items[10]+$credithistory->usedCredit;
        }


        return view('userDashboard.settings.plans.managePlan', ['userPurchasePlan' => $items]);
    }

    public function billing()
    {
        $data = Card::where('userId', Auth::user()->id)->get();
        return view('userDashboard.settings.plans.billing', ['userCardInfo' => $data, 'amount'=>0]);
    }
    public function billingRequest(Request $request)
    {
        $data = Card::where('userId', Auth::user()->id)->get();
        return view('userDashboard.settings.plans.billingRequest', ['userCardInfo' => $data, 'purchasePlan'=>$request]);
    }
    public function exports()
    {
        $data = ExportHistori::where('userId',Auth::user()->id)->orderBy('createdOn', 'desc')->paginate(9);
        return view('userDashboard.settings.exports.exports', ['exportHistory' => $data]);
    }
    public function customCsvSettings(Request $request)
    {
        CSVExportSettings::customization($request);
        $data = CSVExportSettings::where('userId', Auth::user()->id)->first();
        return view('userDashboard.settings.exports.csv-export-settings', ['csvSettings'=> $data->collumn]);
    }
    public function reDownloadFile($file_name)
    {
        $data = ExportHistori::find($file_name);
        return response()->download('storage/app/'. $data->file,'phonelist.xlsx');
    }
    public function csvExportSettings()
    {
        $data = CSVExportSettings::where('userId', Auth::user()->id)->first();
        return view('userDashboard.settings.exports.csv-export-settings', ['csvSettings'=> $data->collumn]);
    }
    public function current()
    {
        $this->credit = Credit::where('userId', Auth::user()->id)->first();
        $monthName = Carbon::now()->subMonth()->format('M');
        if (Carbon::now()->format('M') == 'Jan')
        {
            $year = Carbon::now()->subYear()->format('Y');
        }
        else
        {
            $year = Carbon::now()->format('Y');
        }
        $day = Carbon::now()->subDays(30)->format('d');
        $items[1] = $monthName; $items[2] = $year; $items[3] = $day;
        $monthName2 = Carbon::now()->format('M');
        $day2 = Carbon::now()->format('d');
        $items[4] = $monthName2; $items[5] = $day2; $items[6] = Carbon::now()->format('Y');

        $from = Carbon::now()->subDays(30)->format('Y-m-d');
        $to = Carbon::now()->format('Y-m-d');

        $this->creditHistory = CreditHistory::whereBetween('date', [$from, $to])->get();
        $items[7] = 0;
        $items[8] = $this->credit->useableCredit;
        foreach ($this->creditHistory as $credithistory)
        {
            $items[7]= $items[7]+$credithistory->usedCredit;
        }

        return view('userDashboard.settings.credits.current', ['userPurchasePlan' => $items]);
    }
    public function history()
    {
        //$this->creditHistory = ExportHistori::where('userId', Auth::user()->id)->get();
        //dd($this->creditHistory);
        $this->credit = Credit::where('userId', Auth::user()->id)->first();
        $monthName = Carbon::now()->subMonth()->format('M');
        if (Carbon::now()->format('M') == 'Jan')
        {
            $year = Carbon::now()->subYear()->format('Y');
        }
        else
        {
            $year = Carbon::now()->format('Y');
        }
        $day = Carbon::now()->subDays(30)->format('d');
        $items[1] = $monthName; $items[2] = $year; $items[3] = $day;
        $monthName2 = Carbon::now()->format('M');
        $day2 = Carbon::now()->format('d');
        $items[4] = $monthName2; $items[5] = $day2; $items[6] = Carbon::now()->format('Y');

        $from = Carbon::now()->subDays(30)->format('Y-m-d');
        $to = Carbon::now()->format('Y-m-d');

        $this->creditHistory = CreditHistory::whereBetween('date', [$from, $to])->get();
        $items[7] = 0;
        $items[8] = $this->credit->useableCredit;
        foreach ($this->creditHistory as $credithistory)
        {
            $items[7]= $items[7]+$credithistory->usedCredit;
        }
        return view('userDashboard.settings.credits.history', ['userPurchasePlan' => $items]);
    }

    public function historyDate(Request $request)
    {
        if($request->ajax())
        {
            if($request->from_date != '' && $request->to_date != '')
            {
                $data = DB::table('credit_histories')
                    ->whereBetween('date', array($request->from_date, $request->to_date))
                    ->get();
            }
            else
            {
                $data = DB::table('credit_histories')->orderBy('date', 'desc')->get();
            }
            echo json_encode($data);
        }
    }

    public function upgradeUser()
    {
        return view('userDashboard.settings.upgrade');
    }
    public function upgradeUserPayment()
    {
        //dd($method);
        return view('userDashboard.settings.upgrade', ['paypal'=> "paypal"]);
    }
    public function upgradeUserNewPayment()
    {
        //dd($method);
        return view('userDashboard.settings.upgrade', ['bitcoin'=> "bitcoin"]);
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
