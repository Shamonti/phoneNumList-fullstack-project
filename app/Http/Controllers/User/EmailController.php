<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PhoneListUserModel;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function handleEmailCallback(Request $request)
    {
        $isUser = PhoneListUserModel::where('email', $request->email)->first();

        if($isUser){
            return redirect()->route('loggedInUser');
        }else{
            return view('user.userEmailRegister', ['newUserData'=>$request->email]);
        }

    }
}
