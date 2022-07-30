<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PhoneListUserModel extends Authenticatable
{
    use HasFactory;

    protected static $credit;
    protected static $user;
    protected $fillable = [
        'email',
        'password',
        'firstName',
        'lastName',
        'phone',
        'country',
        'google_id',
        'title',
        'address',
        'purchasePlan',
        'useAbleCredit'
    ];

    protected $hidden = [
        'remember_token',
    ];

    public static function updatePlanAndCredit($request)
    {

        self::$user = PhoneListUserModel::find($request->userId);
        self::$credit = Credit::find($request->userId);
        $usableCredit = self::$credit->useableCredit;
        self::$user->update([
            'purchasePlan' => $request->plan,
            'useAbleCredit' => $usableCredit,
        ]);
    }
    public static function updateUseAbleCredit($request)
    {

        self::$user = PhoneListUserModel::where('id', Auth::user()->id)->first();
        self::$credit = Credit::where('userId', Auth::user()->id)->first();
        $usableCredit = self::$credit->useableCredit;
        self::$user->update([
            'useAbleCredit' => $usableCredit,
        ]);
    }
    public static function updateUseAbleCreditForOne($request, $id)
    {

        self::$user = PhoneListUserModel::find($id);
        self::$credit = Credit::where('userId', $id)->first();
        $usableCredit = self::$credit->useableCredit;
        self::$user->update([
            'useAbleCredit' => $usableCredit,
        ]);
    }

    public static function updatePlanAndCreditByAdmin($request, $id)
    {

        self::$user = PhoneListUserModel::find($id);
        self::$credit = Credit::where('userId', $id)->first();
        $usableCredit = self::$credit->useableCredit;
        self::$user->update([
            'purchasePlan' => $request->plan,
            'useAbleCredit' => $usableCredit,
        ]);
    }

}
