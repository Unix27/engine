<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductPictureUrlToVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('videos', 'product_picture_url')) {
            Schema::table('videos', function (Blueprint $table) {
                $table->string('product_picture_url', 2083)->after('active')->nullable()->index('product_picture_url');
            });
        }
        if(!Schema::hasColumn('videos', 'product_picture_url_thumbnail')) {
            Schema::table('videos', function (Blueprint $table) {
                $table->string('product_picture_url_thumbnail', 2083)->after('product_picture_url')->nullable()->index('product_picture_url_thumbnail');
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

    }
}
