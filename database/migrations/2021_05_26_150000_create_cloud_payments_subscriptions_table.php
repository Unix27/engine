<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCloudPaymentsSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cloudPaymentsSubscriptions', function (Blueprint $table) {
            $table->id();

            $table->string('cloudpayments_id')->nullable();
            $table->string('invoiceId', 10)->nullable();
            $table->integer('user_id')->unsigned();
            $table->float('amount', 10, 2);
            $table->string('currency', 3);
            $table->string('accountId', 250)->nullable()->comment('user identifier');
            $table->string('status', 15);
            $table->string('description', 250)->nullable();
            $table->integer('failedTransactionsNumber')->default(0);
            $table->timestamp('start_at')->useCurrent();
            $table->timestamp('nextTransactionDate')->nullable();

            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('set null');

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
        Schema::dropIfExists('cloudPaymentsSubscriptions');
    }
}
