<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderIdToPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('packages', 'order_id')) {
            Schema::table('packages', function (Blueprint $table) {
                $table->integer('order_id')->unsigned()->index('order_id')->after('user_id');
            });
            Schema::table('package_items', function (Blueprint $table) {
                $table->integer('order_item_id')->unsigned()->index('order_item_id')->after('package_id');
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
        Schema::table('packages', function (Blueprint $table) {
            //
        });
    }
}
