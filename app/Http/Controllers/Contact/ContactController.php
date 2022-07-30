<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact.contact');
    }

    public function aboutUS()
    {
        return view('contact.aboutUS');
    }
}
