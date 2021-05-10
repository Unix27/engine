<?php

namespace App\Console\Commands;

use App\Builders\Product\AliExpressBuilder;
use App\Builders\Product\Builder;
use App\Builders\Product\ProductDirector;
use App\Models\AliExpressProduct;
use App\Models\Post;
use App\Models\PostValue;
use App\Models\Product;
use App\Models\ProductField;
use App\Models\ProductFieldOption;
use App\Models\Scopes\ActiveScope;
use App\Repositories\AliExpressProductRepository;
use App\Repositories\AliExpressRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class AliExpress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aliExpress:update 
                            {mode? : Update mode: default update all products} 
                            {--id=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically updates AliExpress product information (eg. name, description, price and quantity)';

    /**
     * AliExpressProductRepository object
     *
     * @var array
    */
    protected $productRepository;

    protected $file_csv;


    public function __construct()
    {
        parent::__construct();
    }


    public function handle($params = [])
    {
        $mode = $this->argument('mode');
        if (!empty($mode) && !in_array($mode, ['renew', 'comments', 'attributes', 'check', 'post', 'import'])) {
            dd('The mode: ' . $mode . ' is not supported.');
        }

        switch ($mode) {
            case 'import':
                $ids = $this->option('id');
                if (empty($ids)) {
                    dd('Option id not found.');
                }
                $bar = $this->output->createProgressBar(count($ids));
                $bar->start();

                foreach ($ids as $id) {
                    if(Product::whereSku($id)->count() > 0) continue;
                    $url = 'https://de.aliexpress.com/item/' . $id . '.html';
                    $builder = new AliExpressBuilder($url, 'de');
                    $director = new ProductDirector();
                    $data = $director->build($builder);

                    $url = 'https://aliexpress.com/item/' . $id . '.html';
                    $builder = new AliExpressBuilder($url, 'en');
                    $director = new ProductDirector();
                    $translatedData['en'] = $director->build($builder);

                    $repository = new AliExpressProductRepository();
                    $repository->process($data, $translatedData);
                    $bar->advance();
                }
                $bar->finish();
                break;
            case 'check':
                break;
            case 'renew':
                $bar = $this->output->createProgressBar(AliExpressProduct::trans()->count());
                $bar->start();
                foreach (Product::withoutGlobalScopes([ActiveScope::class])->aliexpress()->get() as $oldProduct) {
                    $oldProduct->delete();
                }
                foreach (PostValue::aliexpress()->get() as $oldValue) {
                    $oldValue->delete();
                }
                foreach (ProductField::aliexpress()->get() as $oldField) {
                    $oldField->delete();
                }
                foreach (ProductFieldOption::aliexpress()->get() as $oldFieldOption) {
                    $oldFieldOption->delete();
                }

                foreach (AliExpressProduct::trans()->get() as $aliExpressProduct) {
                    try {
                        $post = Post::find($aliExpressProduct->post_id);
                        if (!$post) continue;

                        $builder = new AliExpressBuilder($aliExpressProduct->url, 'de');
                        $director = new ProductDirector();
                        $data = $director->build($builder);

                        $builder = new AliExpressBuilder($aliExpressProduct->url, 'en');
                        $director = new ProductDirector();
                        $translatedData['en'] = $director->build($builder);


                        $repository = new AliExpressProductRepository();
                        $repository->process($data, $translatedData, $post->category_id, $post->id);

                    } catch (\Exception $e) {
                        echo PHP_EOL . 'Post id: ' . $post->id . '; ' . $aliExpressProduct->url . PHP_EOL .'Error Message: ' . $e->getMessage() . '. File: ' . $e->getFile() . '. Line: ' . $e->getLine() . PHP_EOL;
                        Log::error(PHP_EOL . 'Post id: ' . $post->id . '; ' . $aliExpressProduct->url . PHP_EOL .'Error Message: ' . $e->getMessage() . '. File: ' . $e->getFile() . '. Line: ' . $e->getLine() . PHP_EOL);
                        Log::error($e);
                    }
                    $bar->advance();
                }
                $bar->finish();
                break;
            default:
                $bar = $this->output->createProgressBar(Product::withoutGlobalScopes([ActiveScope::class])->aliexpress()->trans()->count());
                $bar->start();
                Product::withoutGlobalScopes([ActiveScope::class])->aliexpress()->trans()->chunk(50, function ($products) use ($bar) {
                    foreach ($products as $product) {
                        $post = Post::find($product->post_id);
                        if (!$post) continue;
                        try {
                            $builder = new AliExpressBuilder($product->url, 'de');
                            $director = new ProductDirector();
                            $data = $director->build($builder);

                            $builder = new AliExpressBuilder($product->url, 'en');
                            $director = new ProductDirector();
                            $translatedData['en'] = $director->build($builder);

                            $repository = new AliExpressProductRepository();
                            $repository->process($data, $translatedData, $post->category_id, $post->id);

                            $bar->advance();
                        } catch (\Exception $e) {
                            echo PHP_EOL . 'Post id: ' . $post->id . '; ' . $product->url . PHP_EOL .'Error Message: ' . $e->getMessage() . '. File: ' . $e->getFile() . '. Line: ' . $e->getLine() . PHP_EOL;
                            Log::error(PHP_EOL . 'Post id: ' . $post->id . '; ' . $product->url . PHP_EOL .'Error Message: ' . $e->getMessage() . '. File: ' . $e->getFile() . '. Line: ' . $e->getLine() . PHP_EOL);
                            Log::error($e);
                            Product::withoutGlobalScopes([ActiveScope::class])->aliexpress()->where('post_id', $post->id)->update(['active' => 0]);
                            if(Product::where('post_id', $post->id)->count() == 0) {
                                $post->update([
                                    'archived' => 1,
                                ]);
                            }
                        }
                    }
                });
                $bar->finish();
        }
    }
}
