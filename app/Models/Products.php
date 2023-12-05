<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

Public function category(){
    return $this->belongsTo(Categories::class,"Category_id");
}
    Public function sizes(){
        return $this->hasMany(Products_size::class,'Product_id');
    }


public function images()
{return $this->hasMany(Product_image::class,'Product_id');}

}

