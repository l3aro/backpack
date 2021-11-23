<?php

namespace App\Console\Commands\Raca;

use App\Enums\Raca\CategoryEnum;
use Illuminate\Console\Command;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class CheckPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'raca:check-price {--S|sort=fixed_price} {--O|order=asc} {--C|category=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check raca item\'s price.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(CategoryEnum $categoryEnum)
    {
        $urls = collect($this->option('category'))->mapWithKeys(function ($category) {
            return [$category => $this->buildQueryUrl($this->option('sort'), $this->option('order'), $category)];
        });

        $poolCallback = function (Pool $pool) use ($urls) {
            $request = collect();
            foreach ($urls as $category => $url) {
                $request->push($pool->as($category)->get($url));
            }

            return $request->toArray();
        };

        $response = Http::pool($poolCallback);

        foreach ($response as $category => $response) {
            $this->info("Category: " . $categoryEnum->label($category));
            $list = collect($response->json('list'));
            $minPrice = number_format($list->min('fixed_price')) . ' RACA';
            $this->info("Min price: " . $minPrice);
            $this->info("");
        }

        return Command::SUCCESS;
    }

    protected function buildQueryUrl($sortBy, $order, $category)
    {
        $url = 'https://market-api.radiocaca.com/nft-sales?pageNo=1&pageSize=20&sortBy=' . $sortBy . '&name=&order=' . $order . '&saleType&category=' . $category . '&tokenType';


        return $url;
    }
}
