<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'time',
        'title',
        'users',
        'storage',
        'support',
        'other1',
    ];

    function coupon()
    {

        return $this->hasOne("App\Models\Coupon");
    }

    function billing()
    {

        return $this->hasOne("App\Models\BillingInfo");
    }
}
