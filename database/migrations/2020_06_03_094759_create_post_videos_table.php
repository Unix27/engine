<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function(Blueprint $table)
        {
            $table->bigInteger('id', true)->unsigned();
            $table->bigInteger('post_id')->unsigned()->nullable()->index('post_id');
            $table->string('filename')->nullable();
            $table->integer('position')->unsigned()->default(0);
            $table->boolean('active')->nullable()->default(1)->index('active')->comment('Set at 0 on updating the ad');
            $table->string('product_video_url', 2083)->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ly_pictures');
    }
}
