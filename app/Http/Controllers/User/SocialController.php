<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CreditHistory;
use App\Models\PhoneListUserModel;
use App\Models\PurchasePlan;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Socialite;
use Exception;
use Auth;

class SocialController extends Controller
{
    protected $exportHistory;
    protected $purchasePlan;
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $isUser = PhoneListUserModel::where('email', $user->email)->first();

            if($isUser){
                $saveUser = PhoneListUserModel::where('email', $user->email)->first();
            }else{
                //dd($user);
                $splitName = explode(' ', $user->name, 2);
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

        } catch (Exception $exception) {
            //dd($exception->getMessage());
            return redirect('/phonelistUserLogin')->with('message',$exception);
        }
    }


}
