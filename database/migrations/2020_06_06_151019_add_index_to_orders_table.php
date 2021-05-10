<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->index('country_id');
            $table->index('currency_id');
            $table->string('payment_status')->nullable()->change();
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->bigInteger('post_id')->unsigned()->index('post_id')->change();
            $table->index('currency_id');
            $table->index('order_id');
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
