<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('packages', 'user_id')) {
            Schema::table('packages', function (Blueprint $table) {
                $table->integer('user_id')->unsigned()->index('user_id')->after('translation_of');
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
        Schema::table('package', function (Blueprint $table) {
            //
        });
    }
}
