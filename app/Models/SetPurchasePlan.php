<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetPurchasePlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan',
        'credit',
        'phoneNumber',
        'dataFilter',
        'csvExport',
        'price',
    ];
}
