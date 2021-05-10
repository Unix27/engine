<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPackageItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('package_items')) {
            Schema::create('package_items', function (Blueprint $table) {
                $table->bigInteger('id', true)->unsigned();
                $table->string('translation_lang', 10)->nullable()->index('translation_lang');
                $table->integer('translation_of')->unsigned()->nullable()->index('translation_of');
                $table->bigInteger('package_id')->index('package_id')->unsigned();
                $table->bigInteger('post_id')->index('post_id')->unsigned();
                $table->bigInteger('product_id')->index('product_id')->unsigned();
                $table->decimal('product_price', 17, 2)->unsigned()->nullable();
                $table->string('product_price_currency_code', 3)->nullable();
                $table->decimal('delivery_price', 17, 2)->unsigned()->nullable();
                $table->string('delivery_price_currency_code', 3)->nullable();
                $table->string('status')->index('status')->nullable();
                $table->dateTime('status_at')->default(\Carbon\Carbon::now()->toDateTimeString());
                $table->string('title')->nullable()->index('title');
                $table->text('description')->nullable();
                $table->text('comment')->nullable();
                $table->boolean('active')->default(1)->nullable()->index('active');
                $table->timestamps();
            });
        }

        if(!Schema::hasColumn('packages', 'comment')) {
            Schema::table('packages', function (Blueprint $table) {
                $table->text('comment')->nullable();
            });
        }
        if(!Schema::hasColumn('packages', 'status')) {
            Schema::table('packages', function (Blueprint $table) {
                $table->text('status')->nullable()->after('price');
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
