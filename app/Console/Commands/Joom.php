<?php

namespace App\Console\Commands;


use App\Builders\Product\Builder;
use App\Builders\Product\JoomBuilder;
use App\Builders\Product\ProductDirector;
use App\Models\AliExpressProduct;
use App\Models\JoomProduct;
use App\Models\Post;
use App\Models\PostValue;
use App\Models\Product;
use App\Models\ProductField;
use App\Models\ProductFieldOption;
use App\Models\Scopes\ActiveScope;
use App\Repositories\JoomProductRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Joom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'joom:update
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


    public function handle()
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
                    $url = 'https://www.joom.com/de/products/' . $id;
                    $builder = new JoomBuilder($url, 'de');
                    $director = new ProductDirector();
                    $data = $director->build($builder);

                    $url = 'https://www.joom.com/en/products/' . $id;
                    $builder = new JoomBuilder($url, 'en');
                    $director = new ProductDirector();
                    $translatedData['en'] = $director->build($builder);

                    $repository = new JoomProductRepository();
                    $repository->process($data, $translatedData);
                    $bar->advance();
                }
                $bar->finish();
                break;
            case 'check':
                break;
            case 'renew':
                $bar = $this->output->createProgressBar(JoomProduct::trans()->count());
                $bar->start();
                foreach (Product::withoutGlobalScopes([ActiveScope::class])->joom()->get() as $oldProduct) {
                    $oldProduct->delete();
                }
                foreach (PostValue::joom()->get() as $oldValue) {
                    $oldValue->delete();
                }
                foreach (ProductField::joom()->get() as $oldField) {
                    $oldField->delete();
                }
                foreach (ProductFieldOption::joom()->get() as $oldFieldOption) {
                    $oldFieldOption->delete();
                }

                foreach (JoomProduct::trans()->orderBy('id', 'desc')->get() as $product) {
                    try {
                        $post = Post::find($product->post_id);
                        if (!$post) continue;

                        $builder = new JoomBuilder($product->url, 'de');
                        $director = new ProductDirector();
                        $data = $director->build($builder);

                        $translated = [];
                        $builder = new JoomBuilder($product->url, 'en');
                        $director = new ProductDirector();
                        $translatedData['en'] = $director->build($builder);


                        $repository = new JoomProductRepository();
                        $repository->process($data, $translatedData, $post->category_id, $post->id);


                    } catch (\Exception $e) {
                        echo PHP_EOL . 'Post id: ' . $post->id . '; ' . $product->url . PHP_EOL .'Error Message: ' . $e->getMessage() . '. File: ' . $e->getFile() . '. Line: ' . $e->getLine() . PHP_EOL;
                    }
                    $bar->advance();
                }
                $bar->finish();
                break;
            default:
                $bar = $this->output->createProgressBar(Product::withoutGlobalScopes([ActiveScope::class])->joom()->trans()->count());
                $bar->start();
                Product::withoutGlobalScopes([ActiveScope::class])->orderBy('id', 'ASC')->joom()->trans()->chunk(50, function ($products) use ($bar) {
                    foreach ($products as $product) {
                        $post = Post::find($product->post_id);
                        if (!$post) continue;

                        try {
                            $builder = new JoomBuilder('https://joom.com/de/products/'.$product->sku, 'de');
                            $director = new ProductDirector();
                            $data = $director->build($builder);

                            $builder = new JoomBuilder('https://joom.com/en/products/'.$product->sku, 'en');
                            $director = new ProductDirector();
                            $translatedData['en'] = $director->build($builder);

                            $repository = new JoomProductRepository();
                            $repository->process($data, $translatedData, $post->category_id, $post->id);

                            $bar->advance();
                        } catch (\Exception $e) {
                            echo PHP_EOL . 'Post id: ' . $post->id . '; ' . $product->url . PHP_EOL .'Error Message: ' . $e->getMessage() . '. File: ' . $e->getFile() . '. Line: ' . $e->getLine() . PHP_EOL;
                            Log::error(PHP_EOL . 'Post id: ' . $post->id . '; ' . $product->url . PHP_EOL .'Error Message: ' . $e->getMessage() . '. File: ' . $e->getFile() . '. Line: ' . $e->getLine() . PHP_EOL);
                            Log::error($e);
                            Product::withoutGlobalScopes([ActiveScope::class])->joom()->where('post_id', $post->id )->update(['active' => 0]);
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
