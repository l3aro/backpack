<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CheckMinPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:min-price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle()
    {
        $response = Http::get('https://market-api.radiocaca.com/nft-sales?pageNo=1&pageSize=20&sortBy=fixed_price&name=&order=asc&saleType&category=15&tokenType');
        $response = $response->json();
        $list = collect($response['list']);

        $minPrice = number_format($list->min('fixed_price')) . ' RACA';
        $top5 = $list->sortBy('fixed_price')->take(5)->map(function ($item) {
            return [
                'link' => 'https://market.radiocaca.com/#/market-place/' . $item['id'],
                'price' => number_format($item['fixed_price']) . ' RACA',
            ];
        });

        return Command::SUCCESS;
    }
}
