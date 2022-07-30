<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSVExportSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'collumn',
    ];
    protected static $csvExportCollumn;
    protected static $credit;

    public static function create($request)
    {
        self::$csvExportCollumn = new CSVExportSettings();
        self::$csvExportCollumn->userId   = $request->id;
        self::$csvExportCollumn->collumn  = 'first_name,last_name,uid,phone,email,gender,relationship_status,work,education_last_year,location,hometown,country';
        self::$csvExportCollumn->save();
    }

    public static function customization($request)
    {
        $request = $request->toArray();
        unset($request["_token"]);
        $request = array_filter($request, function($request) {return $request !== "";});
        self::$csvExportCollumn = CSVExportSettings::where('userId',Auth::user()->id)->first();
        self::$csvExportCollumn->userId   = Auth::user()->id;
        self::$csvExportCollumn->collumn  = implode(',',$request);
        self::$csvExportCollumn->save();
    }
}
