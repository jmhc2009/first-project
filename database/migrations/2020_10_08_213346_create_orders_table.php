<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {            
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('phone');
            $table->string('address');
            $table->string('region');
            $table->string('city');
            $table->string('message')->nullable();
            $table->string('paymentMethod');
            $table->float('subTotal',200, 2);
            $table->float('impuesto',200, 2);
            $table->float('total', 200, 2);
            $table->string('status', 100, 2);
            $table->string('cod');   
            $table->timestamps();
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
        Schema::dropIfExists('orders');
    }
}
