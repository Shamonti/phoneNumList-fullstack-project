<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CreditHistory;
use App\Models\PhoneListUserModel;
use App\Models\PurchasePlan;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Events\AddingTeam;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    protected $newUser;
    protected $exportHistory;
    protected $purchasePlan;
    CONST DRIVER_TYPE = 'google';
    public function handleGoogleRedirect()
    {
        return Socialite::driver(static::DRIVER_TYPE)->redirect();
    }

    public function handleGoogleCallback()
    {
        //echo 'hello';
        //return redirect()->route('/');
        try {

            $user = Socialite::driver(static::DRIVER_TYPE)->user();

            $userExisted = PhoneListUserModel::where('email', $user->email)->first();

            if( $userExisted ) {

                //return redirect()->route('loggedInUser');
                $saveUser = PhoneListUserModel::where('email', $user->email)->first();

            }else {
                //dd($user);
                $splitName = explode(' ', $user->getName(), 2);
                $firstname = $splitName[0];
                $lastname = !empty($splitName[1]) ? $splitName[1] : '';
                return view('user.userGoogleRegister', ['newUserData'=>$user, 'lastname' => $lastname, 'firstname' => $firstname]);
            }
            Auth::loginUsingId($saveUser->id);
            $this->creditHistory = CreditHistory::where('userId',Auth::user()->id)->get();
            $this->purchasePlan = PurchasePlan::where('userId',Auth::user()->id)->get();
            $i=0;
            $dataPurchase = [];
            foreach ($this->creditHistory as $history)
            {
                $dataPurchase [$i] = $history->dataPurchase;
                $i++;
            }
            $j=0;
            $creditPurchase = [];
            foreach ($this->purchasePlan as $plan)
            {
                $creditPurchase [$j] = $plan->credit;
                $j++;
            }
            return redirect('loggedInUser');
            //return view('userDashboard.userDashboard',['userHistory'=> $this->creditHistory])->with('data',json_encode($dataPurchase,JSON_NUMERIC_CHECK))->with('credit',json_encode($creditPurchase,JSON_NUMERIC_CHECK));


        } catch (Exception $e) {
            //dd($e);
            return redirect('/phonelistUserLogin')->with('message',$e);
        }

    }
    public function handleGoogleCallbackRegister()
    {
        return view('user.userGoogleRegister');
    }
}
