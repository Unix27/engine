<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCartCurrencyColmn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart', function (Blueprint $table) {
            $table->string('currency_code', 3)->after('currency_id')->nullable()->index('currency_code');
        });
        Schema::table('cart_items', function (Blueprint $table) {
            $table->string('currency_code', 3)->after('currency_id')->nullable()->index('currency_code');
        });

        foreach (\App\Models\Cart::all() as $row) {
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

        Schema::table('cart', function($table) {
            $table->dropColumn('currency_id');
        });
        Schema::table('cart_items', function($table) {
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
        //
    }
}
