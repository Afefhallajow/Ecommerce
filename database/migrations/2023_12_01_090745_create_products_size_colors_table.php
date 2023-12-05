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
        Schema::create('products_size_colors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Product_id')->unsigned();
            $table->foreign('Product_id')->references("id")->on('products')->onDelete('cascade');
            $table->bigInteger('Color_id')->unsigned()->nullable();
            $table->foreign('Color_id')->references("id")->on('products_colors')->onDelete('cascade');
            $table->bigInteger('Size_id')->unsigned();
            $table->foreign('Size_id')->references("id")->on('products_sizes')->onDelete('cascade');
 $table->string('Color_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_size_colors');
    }
};
