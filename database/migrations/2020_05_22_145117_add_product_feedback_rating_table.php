<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductFeedbackRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('product_feedback_ratings')) {
            Schema::create('product_feedback_ratings', function(Blueprint $table) {
                $table->bigInteger('id', true)->unsigned();
                $table->bigInteger('product_id')->unsigned();

                $table->float('average_star')->unsigned()->default(0);
                $table->float('average_star_rage')->unsigned()->default(0);

                $table->float('evarage_star')->unsigned()->default(0);
                $table->float('evarage_star_rage')->unsigned()->default(0);

                $table->integer('one_star_num')->unsigned()->default(0);
                $table->float('one_star_rate')->unsigned()->default(0);

                $table->integer('two_star_num')->unsigned()->default(0);
                $table->float('two_star_rate')->unsigned()->default(0);

                $table->integer('three_star_num')->unsigned()->default(0);
                $table->float('three_star_rate')->unsigned()->default(0);

                $table->integer('four_star_num')->unsigned()->default(0);
                $table->float('four_star_rate')->unsigned()->default(0);

                $table->integer('five_star_num')->unsigned()->default(0);
                $table->float('five_star_rate')->unsigned()->default(0);

                $table->float('positive_rate')->unsigned()->default(0);
                $table->integer('total_valid_num')->unsigned()->default(0);

                $table->integer('format_trade_count')->unsigned()->default(0);
                $table->timestamps();
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
