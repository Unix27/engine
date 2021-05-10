<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCurrencyColumnInOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('currency_code', 3)->after('currency_id')->nullable()->index('currency_code');
        });
        Schema::table('order_items', function (Blueprint $table) {
            $table->string('currency_code', 3)->after('currency_id')->nullable()->index('currency_code');
        });

        foreach (\App\Models\Order::all() as $row) {
            $currency = \App\Models\Currency::whereId($row->currency_id)->first();
            if($currency) {
                $row->currency_code = $currency->code;
                $row->save();
                foreach ($row->items as $rowItem) {
                    $rowItem->currency_code = $currency->code;
                    $rowItem->save();
                }
            }
        }

        Schema::table('orders', function($table) {
            $table->dropColumn('currency_id');
        });
        Schema::table('order_items', function($table) {
            $table->dropColumn('currency_id');
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
