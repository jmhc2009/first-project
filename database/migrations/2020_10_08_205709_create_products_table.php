<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable()->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->integer('priceRetail');
            $table->integer('stock');
            $table->string('offer');
            $table->date('date');
            $table->string('image')->nullable()->default('default.png');
            $table->timestamps(); 
            $table->foreign('category_id')->references('id')->on('categories');           
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
