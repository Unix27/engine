<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReviewVideoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('review_videos', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('review_id')->unsigned()->nullable()->index('post_id');
            $table->string('picture_url', 2083)->nullable();
            $table->string('picture_url_thumbnail', 2083)->nullable();
            $table->string('video_url', 2083)->nullable();
            $table->string('filename')->nullable();
			$table->integer('position')->unsigned()->default(0);
			$table->boolean('active')->nullable()->default(1)->index('active')->comment('Set at 0 on updating the ad');
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
		Schema::drop('review_pictures');
	}

}
