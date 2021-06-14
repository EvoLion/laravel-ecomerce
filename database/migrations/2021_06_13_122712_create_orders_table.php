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
            $table->timestamps();

            $table->string('firstname', 40);
            $table->string('lastname', 40);
            $table->string('company')->nullable();
            $table->unsignedBigInteger('zipcode');
            $table->string('phone');
            $table->string('email');

            $table->string('ship_country');
            $table->string('ship_region');
            $table->string('ship_city');
            $table->string('ship_adrress');
            $table->string('ship_method');
            
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
