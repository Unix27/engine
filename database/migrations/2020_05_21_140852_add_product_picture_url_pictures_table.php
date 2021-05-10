<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductPictureUrlPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pictures', function (Blueprint $table) {
            $table->string('product_picture_url', 2083)->after('active')->nullable()->index('product_picture_url');
            $table->string('product_picture_url_thumbnail', 2083)->after('product_picture_url')->nullable()->index('product_picture_url_thumbnail');

        });
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
