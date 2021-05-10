<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRateToCurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('currencies', 'symbol')) {
            Schema::table('currencies', function (Blueprint $table) {
                $table->string('symbol', 25)->after('thousand_separator');
                $table->string('format', 50)->after('symbol');
                $table->string('exchange_rate')->after('format');
                $table->boolean('active')->after('exchange_rate')->default(0);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('currencies', function (Blueprint $table) {
            //
        });
    }
}
