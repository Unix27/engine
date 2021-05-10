<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUrlFiledsToReviewPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('review_pictures', function (Blueprint $table) {
            $table->string('picture_url', 2083)->after('filename')->nullable();
            $table->string('picture_url_thumbnail', 2083)->after('picture_url')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('review_pictures', function (Blueprint $table) {
            //
        });
    }
}
