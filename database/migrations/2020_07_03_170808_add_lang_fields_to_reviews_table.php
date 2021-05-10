<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLangFieldsToReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('translation_lang', 10)->after('id')->nullable()->index('translation_lang');
            $table->string('user_name', 100)->after('user_id')->nullable();
        });

//        \App\Plugins\reviews\app\Models\Review::chunk(50, function ($reviews) {
//            foreach ($reviews as $review) {
//                $review->translation_of = $review->tid;
//                $review->save();
//                $review->createNonTranslatableFieldsInOtherLanguages();
//            }
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            //
        });
    }
}
