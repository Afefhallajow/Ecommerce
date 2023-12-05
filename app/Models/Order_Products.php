<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Products extends Model
{
    use HasFactory;
    public function product()
    {

        return $this->belongsTo(Products::class,'Product_id');

    }

    public function order()
    {

        return $this->belongsTo(Order::class,'Order_id');

    }

}
