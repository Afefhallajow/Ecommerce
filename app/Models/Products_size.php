<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products_size extends Model
{
    use HasFactory;

    public function colors()
    {

        return $this->hasMany(Products_size_color::class,'Size_id');

    }
}
