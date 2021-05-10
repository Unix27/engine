<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPostOptValPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('product_opt_val_prices')) {
            Schema::create('product_opt_val_prices', function(Blueprint $table) {
                $table->bigInteger('id', true)->unsigned();
                $table->bigInteger('product_id')->unsigned();
                $table->bigInteger('post_id')->unsigned();
                $table->string('translation_lang', 10)->nullable()->index('translation_lang');
                $table->integer('translation_of')->unsigned()->nullable()->index('translation_of');
                $table->string('sku_attr')->nullable()->index('sku_attr');
                $table->string('sku_prop_ids')->nullable();
                $table->decimal('act_sku_cal_price', 17, 2)->unsigned()->nullable();
                $table->decimal('act_sku_multi_currency_cal_price', 17, 2)->unsigned()->nullable();
                $table->decimal('act_sku_multi_currency_display_price', 17, 2)->unsigned()->nullable();
                $table->decimal('sku_activity_amount', 17,2 )->unsigned()->nullable();
                $table->string('formated_sku_activity_amount', 150)->nullable();
                $table->decimal('sku_amount', 17,2 )->unsigned()->nullable();
                $table->string('formated_sku_amount', 150)->nullable();
                $table->decimal('sku_cal_price', 17,2 )->unsigned()->nullable();
                $table->decimal('sku_multi_currency_cal_price', 17,2 )->unsigned()->nullable();
                $table->integer('discount')->nullable()->unsigned()->default(0);
                $table->boolean('is_activity')->nullable();
                $table->integer('avail_quantity')->unsigned()->nullable()->index('avail_quantity');
                $table->integer('inventory')->unsigned()->nullable()->index('inventory');
                $table->boolean('active')->nullable()->default(1)->index('active');

                $table->timestamps();
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
        //
    }
}
