<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
//            $table->string('first_name');
//            $table->string('last_name');
//            $table->string('address');
//            $table->string('house_no');
//            $table->string('zip');
//            $table->string('city');
//            $table->string('iban');
//            $table->integer('verified_payment_data');
//            $table->string('account_number');
//            $table->string('bank_code');
//            $table->integer('send_newsletter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
