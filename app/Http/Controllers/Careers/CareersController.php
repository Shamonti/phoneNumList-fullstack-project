<?php

namespace App\Http\Controllers\Careers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CareersController extends Controller
{
    public function careers()
    {
        return view('careers.careers');
    }
}
