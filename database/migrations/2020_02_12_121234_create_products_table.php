<?php

use App\Repositories\AliExpressProductRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function(Blueprint $table) {
                $table->bigInteger('id', true)->unsigned();
                $table->bigInteger('post_id')->unsigned();
                $table->string('translation_lang', 10)->nullable()->index('translation_lang');
                $table->integer('translation_of')->unsigned()->nullable()->index('translation_of');
                $table->string('title')->nullable()->index('title');
                $table->text('description', 65535)->nullable();
                $table->string('sku')->nullable()->index();
                $table->integer('category_id')->unsigned()->nullable()->index('category_id');
                $table->integer('seller_id')->unsigned()->nullable()->index('seller_id');

                $table->string('formated_activity_price', 150)->nullable();
                $table->string('formated_price', 150)->nullable();

                $table->decimal('max_activity_amount', 17)->unsigned()->nullable();
                $table->decimal('max_amount', 17)->unsigned()->nullable();

                $table->decimal('min_activity_amount', 17)->unsigned()->nullable();
                $table->decimal('min_amount', 17)->unsigned()->nullable();

                $table->integer('discount')->nullable()->unsigned()->default(0);
                $table->boolean('discount_promotion')->nullable();

                $table->boolean('activity')->nullable();
                $table->boolean('big_preview')->nullable();
                $table->boolean('big_sell_product')->nullable();
                $table->boolean('hidden_big_sale_price')->nullable();
                $table->boolean('pre_sale')->nullable();

                $table->integer('total_avail_quantity')->unsigned()->nullable()->index('total_avail_quantity');
                $table->boolean('in_stock')->nullable()->default(1)->index('in_stock');
                $table->boolean('active')->default(1)->nullable()->index('active');

                $table->string('url', 2083)->nullable();
                $table->string('description_url', 2083)->nullable();
                $table->string('picture_url', 2083)->nullable()->index('picture_url');
                $table->string('picture_url_thumbnail', 2083)->nullable()->index('picture_url_thumbnail');

                $table->string('provider', 50)->index('provider')->nullable();

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
        Schema::dropIfExists('ali_express_products');
    }
}
