<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PhoneList extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'phone',
        'email',
        'uid',
        'first_name',
        'last_name',
        'full_name',
        'gender',
        'country',
        'location',
        'location_city',
        'location_state',
        'location_region',
        'hometown',
        'hometown_city',
        'hometown_state',
        'hometown_region',
        'relationship_status',
        'education_last_year',
        'work',

    ];
    protected static $phoneList;
    protected $table = "phone_lists";
    protected static $facebookDirectory;
    protected static $userId;
    protected static $facebookUserId;
    protected static $facebookId;
    protected static $nameList;




    public static function newPhoneList($request)
    {
        $location_info = explode(',', $request->location);
        if(count($location_info) == 1)
        {
            $location_info[1] = null;

        }
        elseif ($location_info == null)
        {
            $location_info[0] = null;
            $location_info[1] = null;
        }

        $hometown_info = explode(',', $request->hometown);
        if(count($hometown_info) == 1)
        {
            $hometown_info[1] = null;

        }
        elseif ($hometown_info == null)
        {
            $hometown_info[0] = null;
            $hometown_info[1] = null;
        }
        self::$phoneList = new PhoneList();
        self::$phoneList->phone                     = $request->phone;
        self::$phoneList->uid                       = $request->uid;
        self::$phoneList->email                     = $request->email;
        self::$phoneList->first_name                = $request->first_name;
        self::$phoneList->last_name                 = $request->last_name;
        self::$phoneList->full_name                      = $request->first_name.' '.$request->last_name;
        self::$phoneList->gender                    = $request->gender;
        self::$phoneList->country                   = $request->country;
        self::$phoneList->location                  = $request->location;
        self::$phoneList->location_city             = $location_info[0];
        self::$phoneList->location_state            = $location_info[1];
        self::$phoneList->hometown                  = $request->hometown;
        self::$phoneList->hometown_city             = $hometown_info[0];
        self::$phoneList->hometown_state            = $hometown_info[1];
        self::$phoneList->relationship_status       = $request->relationship_status;
        self::$phoneList->education_last_year       = $request->education_last_year;
        self::$phoneList->work                      = $request->work;
        self::$phoneList->save();
    }

    public static function updatePhoneList($request)
    {
        $location_info = explode(',', $request->location);
        if(count($location_info) == 1)
        {
            $location_info[1] = null;
            $location_info[2] = null;
            $location_info[3] = null;

        }
        elseif (count($location_info) == 2)
        {
            $location_info[2] = null;
            $location_info[3] = null;
        }
        elseif (count($location_info) == 3)
        {
            $location_info[3] = null;
        }

        $hometown_info = explode(',', $request->hometown);
        if(count($hometown_info) == 1)
        {
            $hometown_info[1] = null;
            $hometown_info[2] = null;
            $hometown_info[3] = null;

        }
        elseif (count($hometown_info) == 2)
        {
            $hometown_info[2] = null;
            $hometown_info[3] = null;
        }
        elseif (count($hometown_info) == 3)
        {
            $hometown_info[3] = null;
        }
        self::$phoneList = PhoneList::find($request->phoneListUserid);
        $newPhoneList = PhoneList::find($request->phoneListUserid);
        self::$phoneList->phone                     = $request->phone;
        self::$phoneList->uid                       = $newPhoneList->uid;
        self::$phoneList->email                     = $request->email;
        self::$phoneList->first_name                = $request->first_name;
        self::$phoneList->last_name                 = $request->last_name;
        self::$phoneList->full_name                 = $request->first_name.' '.$request->last_name;;
        self::$phoneList->gender                    = $request->gender;
        self::$phoneList->country                   = $request->country;
        self::$phoneList->location                  = $request->location;
        self::$phoneList->location_city             = $location_info[0];
        self::$phoneList->location_state            = $location_info[1];
        self::$phoneList->location_region           = $location_info[2];
        self::$phoneList->location_country          = $location_info[3];
        self::$phoneList->hometown                  = $request->hometown;
        self::$phoneList->hometown_city             = $hometown_info[0];
        self::$phoneList->hometown_state            = $hometown_info[1];
        self::$phoneList->hometown_region           = $hometown_info[2];
        self::$phoneList->hometown_country          = $hometown_info[3];
        self::$phoneList->relationship_status       = $request->relationship_status;
        self::$phoneList->education_last_year       = $request->education_last_year;
        self::$phoneList->work                      = $request->work;
        self::$phoneList->save();
    }


    public static function createNew(array $row)
    {
        $location_info = explode(',', $row['location']);
        if(count($location_info) == 1)
        {
            $location_info[1] = null;
            $location_info[2] = null;

        }
        elseif (count($location_info) == 2)
        {
            $location_info[2] = null;
        }
        elseif ($location_info == null)
        {
            $location_info[0] = null;
            $location_info[1] = null;
            $location_info[2] = null;
        }


        $hometown_info = explode(',', $row['hometown']);
        if(count($hometown_info) == 1)
        {
            $hometown_info[1] = null;
            $hometown_info[2] = null;

        }
        elseif (count($hometown_info) == 2)
        {
            $hometown_info[2] = null;
        }
        elseif ($hometown_info == null)
        {
            $hometown_info[0] = null;
            $hometown_info[1] = null;
            $hometown_info[2] = null;
        }


        self::$phoneList = new PhoneList();
        self::$phoneList->phone                     = $row['phone'];
        self::$phoneList->uid                       = $row['uid'];
        self::$phoneList->email                     = $row['email'];
        self::$phoneList->first_name                = $row['first_name'];
        self::$phoneList->last_name                 = $row['last_name'];
        self::$phoneList->full_name                 = $row['first_name'] . ' ' . $row['last_name'];
        self::$phoneList->gender                    = $row['gender'];
        self::$phoneList->country                   = $row['country'];
        self::$phoneList->location                  = $row['location'];
        self::$phoneList->location_city             = $location_info[0];
        self::$phoneList->location_state            = $location_info[1];
        self::$phoneList->location_region           = $location_info[2];
        self::$phoneList->hometown                  = $row['hometown'];
        self::$phoneList->hometown_city             = $hometown_info[0];
        self::$phoneList->hometown_state            = $hometown_info[1];
        self::$phoneList->hometown_region           = $hometown_info[2];
        self::$phoneList->relationship_status       = $row['relationship_status'];
        self::$phoneList->education_last_year       = $row['education_last_year'];
        self::$phoneList->work                      = $row['work'];
        self::$phoneList->save();

    }



}
