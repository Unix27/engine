<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('payments', 'user_id')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->integer('user_id')->unsigned()->index('user_id')->after('post_id');
            });
        }
        if(!Schema::hasColumn('payments', 'plan')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->string('plan', 100)->nullable();
            });
        }
        if(!Schema::hasColumn('payments', 'paypal_agreement_id')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->string('paypal_agreement_id', 100)->nullable();
            });
        }
        if(!Schema::hasColumn('payments', 'price')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->double('price', 2);
            });
        }
        if(!Schema::hasColumn('payments', 'payment_status')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->string('payment_status')->nullable();
            });
        }
        if(!Schema::hasColumn('payments', 'recurring_id')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->string('recurring_id')->nullable();
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
        Schema::table('payments', function (Blueprint $table) {

        });
    }
}
