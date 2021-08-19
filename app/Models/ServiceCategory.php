<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'cat_image',
    ];

    function service(){

        return $this->hasOne("App\Models\ServiceInner");
    }
}
