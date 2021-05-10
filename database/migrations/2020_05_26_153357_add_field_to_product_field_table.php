<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToProductFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_fields', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();
            $table->bigInteger('field_id')->unsigned()->index('field_id');
            $table->string('sku_property_id', 150)->index('sku_property_id');
            $table->string('name', 100)->nullable();
            $table->string('provider', 50)->index('provider')->nullable();
            $table->timestamps();
            $table->unique(['field_id','sku_property_id','provider'], 'sku_property_id_provider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_fields', function (Blueprint $table) {

        });
    }
}
