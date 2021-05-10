<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToProductFieldOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_field_options', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();
            $table->bigInteger('option_id')->unsigned()->index('option_id');
            $table->string('sku_property_id', 150)->index('sku_property_id');
            $table->string('property_value_id', 150)->index('property_value_id');
            $table->text('value', 65535)->nullable();
            $table->string('provider', 50)->index('provider')->nullable();
            $table->timestamps();
            $table->unique(['option_id','sku_property_id','property_value_id','provider'], 'property_value_id_provider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_field_options', function (Blueprint $table) {

        });
    }
}
