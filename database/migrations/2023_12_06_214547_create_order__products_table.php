<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order__products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Order_id')->unsigned();
            $table->foreign('Order_id')->references("id")->on('orders')->onDelete('cascade');
            $table->bigInteger('Product_id')->unsigned();
            $table->foreign('Product_id')->references("id")->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order__products');
    }
};
