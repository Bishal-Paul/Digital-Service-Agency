<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorWork extends Model
{
    use HasFactory;

    function account()
    {
        return $this->belongsTo('App\Models\VendorAccount');
    }
}
