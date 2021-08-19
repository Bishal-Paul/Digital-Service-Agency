<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingInfo extends Model
{
    use HasFactory;

    function shipping(){
        return $this->belongsTo('App\Models\CheckoutInfo');
    }

    function pricing()
    {

        return $this->belongsTo("App\Models\Pricing");
    }
}
