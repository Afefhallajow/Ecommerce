<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    Public function products(){
        return $this->hasMany(Order_Products::class,'Product_id');
    }


}
