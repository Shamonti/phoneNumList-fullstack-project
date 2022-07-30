<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\PhoneList;
use Illuminate\Http\Request;
use App\CustomClasses\ColectionPaginate;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PublicController extends Controller
{
    protected $data;
    protected $userData;
    protected $countries;
    public function index()
    {
        return view('front.dashboard');
    }
    public function home()
    {
        $phoneCount = DB::table('phone_lists')->count();
        $phoneLocation = DB::table('phone_lists')
            ->whereNull('location')
            ->count();
        return view('front.home',['rowcount'=> $phoneCount, 'rowcount2'=> $phoneLocation]);
    }
    public function category($id)
    {
        $this->countries = Country::all();
        $x=$id;
        $this->data = DB::table('phone_lists')
            ->where('first_name', 'like', $x.'%')
            ->paginate(200);
        return view('front.category', ['data'=>$this->data, 'country' => $this->countries])->with('dataId', $x);
    }
    public function user($id)
    {
        $this->countries = Country::all();
        $this->data = Phonelist::find($id);
        $result = substr($this->data->first_name, 0, 3);
        $this->userData = PhoneList::where('full_name', 'LIKE', $result. '%'  )->get();

        return view('front.user.user', ['data'=>$this->data, 'country' => $this->countries])->with('userData', $this->userData);
    }
    public function userSearch(Request $request)
    {
        if($request->searchPeople == null)
        {
            return redirect()->back();
        }
        $this->countries = Country::all();
        $this->data = PhoneList::where('full_name', $request->searchPeople)->first();
        $result = substr($this->data->full_name, 0, 3);
        $this->userData = PhoneList::where('full_name', 'LIKE', $result. '%'  )->get();

        return view('front.user.user', ['data'=>$this->data, 'country' => $this->countries])->with('userData', $this->userData);
    }

    public function country($id)
    {
        $this->countries = Country::all();
        $x=$id;
        $this->data = DB::table('phone_lists')
            ->where('country', 'like', $x.'%')
            ->paginate(200);
        return view('front.country.country', ['data'=>$this->data,  'country' => $this->countries])->with('dataId', $x);
    }
}
