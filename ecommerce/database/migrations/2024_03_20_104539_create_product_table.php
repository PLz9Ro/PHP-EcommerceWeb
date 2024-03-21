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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('sku')->nullable();
            $table->integer('status')->default(1)->comment('1: Active | 0: Blocked');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->float('price', 10, 2);
            $table->float('old_price', 10, 2)->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('shippingreturns')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_category')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brand')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
