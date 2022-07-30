<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Victorybiz\LaravelCryptoPaymentGateway\LaravelCryptoPaymentGateway;

class PaymentController extends Controller
{
    public function callback(Request $request)
    {
        return LaravelCryptoPaymentGateway::callback();
    }

}
