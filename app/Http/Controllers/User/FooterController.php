<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function termsAndServices()
    {
        return view('termsAndServices.termsAndServices');
    }
    public function privacyPolicy()
    {
        return view('privacyPolicy.privacyPolicy');
    }
    public function refund()
    {
        return view('refund.refund');
    }
}
