<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAliExpressSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sellers', function(Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();
            $table->string('store_num', 150)->nullable();
            $table->string('name', 150)->nullable();
            $table->string('positive_num', 150)->nullable()->index('positive_num');
            $table->string('positive_rate', 150)->nullable()->index('positive_rate');
            $table->dateTime('open_at')->nullable();
            $table->string('location')->nullable();
            $table->string('seller_admin_seq')->nullable();
            $table->string('store_url')->nullable();
            $table->boolean('top_rated_seller')->nullable()->index('top_rated_seller');
            $table->string('provider', 50)->nullable();
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

    }
}
