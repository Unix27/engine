<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPictureIdToPostValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_values', function (Blueprint $table) {
            $table->string('product_picture_url', 2083)->nullable()->index('product_picture_url');
            $table->string('product_picture_url_thumbnail', 2083)->nullable()->index('product_picture_url_thumbnail');
            $table->string('provider', 50)->index('provider')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_values', function (Blueprint $table) {
            //
        });
    }
}
