<?php

namespace App\Http\Controllers\Packages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function packages()
    {
        return view('packages.packages');
    }
}
