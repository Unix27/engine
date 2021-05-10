<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('logistics')) {
            Schema::create('logistics', function (Blueprint $table) {
                $table->bigInteger('id', true)->unsigned();
                $table->bigInteger('package_item_id')->index('package_item_id')->unsigned();
                $table->string('status')->index('status')->nullable();
                $table->dateTime('status_at')->nullable();
                $table->string('title')->nullable()->index('title');
                $table->text('description')->nullable();
                $table->text('comment')->nullable();
                $table->boolean('active')->default(1)->nullable()->index('active');
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
