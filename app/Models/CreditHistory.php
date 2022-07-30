<?php

namespace App\Models;

use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditHistory extends Model
{
    use HasFactory;
    protected static $creditHistory;
    protected static $credit;
    protected $fillable = [
        'userId',
        'usedCredit',
        'useAbleCredit',
        'prevCredit',
        'dataPurchase',
        'date',
    ];
    public static function create($request)
    {
        self::$creditHistory = new CreditHistory();
        self::$credit =Credit::where('userId', Auth::user()->id)->first();
        $usableCredit = self::$credit->useableCredit;
        self::$creditHistory->userId         = Auth::user()->id;
        self::$creditHistory->usedCredit  = count($request->chk);
        self::$creditHistory->useAbleCredit  = $usableCredit;
        self::$creditHistory->prevCredit  = $usableCredit+count($request->chk);
        self::$creditHistory->dataPurchase  = count($request->chk);
        self::$creditHistory->date  = Carbon::now();
        self::$creditHistory->save();
    }
    public static function createAll($request)
    {
        self::$creditHistory = new CreditHistory();
        self::$credit =Credit::where('userId', Auth::user()->id)->first();
        $usableCredit = self::$credit->useableCredit;
        self::$creditHistory->userId         = Auth::user()->id;
        self::$creditHistory->usedCredit  = $request;
        self::$creditHistory->useAbleCredit  = $usableCredit;
        self::$creditHistory->prevCredit  = $usableCredit+$request;
        self::$creditHistory->dataPurchase  = $request;
        self::$creditHistory->date  = Carbon::now();
        self::$creditHistory->save();
    }
    public static function createForOne($request)
    {
        self::$creditHistory = new CreditHistory();
        self::$credit = Credit::where('userId', Auth::user()->id)->first();
        $usableCredit = self::$credit->useableCredit;
        self::$creditHistory->userId         = Auth::user()->id;
        self::$creditHistory->usedCredit  = 1;
        self::$creditHistory->useAbleCredit  = $usableCredit;
        self::$creditHistory->prevCredit  = $usableCredit+1;
        self::$creditHistory->dataPurchase  = 1;
        self::$creditHistory->date  = Carbon::now();
        self::$creditHistory->save();
    }
    public static function createNew($request)
    {
        self::$creditHistory = new CreditHistory();
        self::$creditHistory->userId         = $request->id;
        self::$creditHistory->usedCredit  = 0;
        self::$creditHistory->useAbleCredit  = 20;
        self::$creditHistory->prevCredit  = 20;
        self::$creditHistory->dataPurchase  = 0;
        self::$creditHistory->date  = Carbon::now();
        self::$creditHistory->save();
    }
}
