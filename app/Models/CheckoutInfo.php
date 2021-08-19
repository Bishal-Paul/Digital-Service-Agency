<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutInfo extends Model
{
    use HasFactory;

    function billing()
    {
        return $this->hasOne('App\Models\BillingInfo');
    }
}
