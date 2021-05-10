<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->boolean('is_guest')->default(false);
            $table->integer('user_id');
            $table->string('customer_email');
            $table->string('customer_first_name');
            $table->string('customer_last_name');
            $table->string('address');
            $table->integer('country_id');
            $table->string('city');
            $table->string('mobile_phone');
            $table->string('shipping_method');
            $table->string('payment_method');
            $table->integer('items_count');
            $table->float('total_price',8,2);
            $table->integer('currency_id');
            $table->integer('payment_status')->default(0);
            $table->timestamps();
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
