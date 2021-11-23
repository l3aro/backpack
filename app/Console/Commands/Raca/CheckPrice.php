<?php

namespace App\Console\Commands\Raca;

use App\Enums\Raca\CategoryEnum;
use App\Http\Client\DiscordWebhook;
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

    protected $discordWebhook = 'https://discord.com/api/webhooks/912698740857516073/f9mj_Rw4nlxOrl_W0a42ioF4JRc7flZsbjbMBmlcfzGuAooqSt80l7hKtTZLLGUtcUV5';

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

        $message = "Trending:\n\n";

        foreach ($response as $category => $response) {
            $list = collect($response->json('list'));
            $minPrice = number_format($list->min('fixed_price')) . ' RACA';

            $message .= "Category: " . $categoryEnum->label($category) . "\n";
            $message .= "Min price: " . $minPrice . "\n";
            $message .= "\n";
        }

        DiscordWebhook::make($this->discordWebhook, "```$message```")->send();

        return Command::SUCCESS;
    }

    protected function buildQueryUrl($sortBy, $order, $category)
    {
        $url = 'https://market-api.radiocaca.com/nft-sales?pageNo=1&pageSize=20&sortBy=' . $sortBy . '&name=&order=' . $order . '&saleType&category=' . $category . '&tokenType';


        return $url;
    }
}
