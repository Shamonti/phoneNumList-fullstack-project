<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasePlan extends Model
{
    use HasFactory;
    protected static $purchagePlan;
    protected $fillable = [
        'userId',
        'plan',
        'price',
        'credit',
        'phoneNumber',
        'dataFilter',
        'csvExport',
        'start',
        'end',
    ];

    public static function create($request)
    {
        self::$purchagePlan = new PurchasePlan();
        self::$purchagePlan->userId       = $request->id;
        self::$purchagePlan->plan         = 'Free';
        self::$purchagePlan->price        = 0;
        self::$purchagePlan->credit       = 20;
        self::$purchagePlan->phoneNumber  = 20;
        self::$purchagePlan->dataFilter   = 'Basic Filters';
        self::$purchagePlan->csvExport    = 'CSV Export';
        self::$purchagePlan->start        = Carbon::now()->toDateString();
        self::$purchagePlan->end         = Carbon::now()->addDays(29)->format('Y-m-d');
        self::$purchagePlan->save();
    }
    public static function createNew($request)
    {
        self::$purchagePlan = new PurchasePlan();
        self::$purchagePlan->userId       = $request->userId;
        self::$purchagePlan->plan         = $request->plan;
        self::$purchagePlan->price        = $request->price;
        self::$purchagePlan->credit       = $request->credit;
        self::$purchagePlan->phoneNumber  = $request->phoneNumber;
        self::$purchagePlan->dataFilter   = $request->dataFilter;
        self::$purchagePlan->csvExport    = $request->csvExport;
        self::$purchagePlan->start        = Carbon::now()->toDateString();
        self::$purchagePlan->end         = Carbon::now()->addDays(29)->format('Y-m-d');
        self::$purchagePlan->save();

    }
    public static function createNewByAdmin($request, $id)
    {
        self::$purchagePlan = new PurchasePlan();
        self::$purchagePlan->userId       = $id;
        self::$purchagePlan->plan         = $request->plan;
        self::$purchagePlan->price        = $request->price;
        self::$purchagePlan->credit       = $request->credit;
        self::$purchagePlan->phoneNumber  = $request->phoneNumber;
        self::$purchagePlan->dataFilter   = $request->dataFilter;
        self::$purchagePlan->csvExport    = $request->csvExport;
        self::$purchagePlan->start        = Carbon::now()->toDateString();
        self::$purchagePlan->end         = Carbon::now()->addDays(29)->format('Y-m-d');
        self::$purchagePlan->save();

    }
}
