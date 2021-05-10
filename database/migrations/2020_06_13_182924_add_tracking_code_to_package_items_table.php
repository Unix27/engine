<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrackingCodeToPackageItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('package_items', 'tracking_code')) {
            Schema::table('package_items', function (Blueprint $table) {
                $table->string('tracking_code')->index('tracking_code')->after('comment')->nullable();
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
        Schema::table('package_items', function (Blueprint $table) {
            //
        });
    }
}
