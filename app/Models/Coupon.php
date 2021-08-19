<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'coupon_name',
        'coupon_code',
        'coupon_discount',
        'coupon_validity',
    ];

    function plan()
    {

        return $this->belongsTo("App\Models\Pricing");
    }
}
