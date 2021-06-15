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
            $table->string('ship_address');

            $table->unsignedBigInteger('ship_method_id')->index();
            $table->foreign('ship_method_id')->references('id')->on('ship_methods')->onDelete('cascade');
            
            $table->unsignedBigInteger('coupon_id')->index()->nullable();
            $table->foreign('coupon_id')->references('id')->on('coupons');
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
