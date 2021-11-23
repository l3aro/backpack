<?php

namespace App\Console\Commands\Raca;

use App\Enums\Raca\CategoryEnum;
use App\Http\Client\DiscordWebhook;
use App\Services\Contracts\MarkdownTableService;
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

    protected $discordWebhook = 'https://discord.com/api/webhooks/912721660799500308/hnoQ35EKb1GzbuobYoz30exVJnxHomEocG5SIzhAnK26gThyfcSsvhRgq4lsUPo9ZQqf';

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
    public function handle(MarkdownTableService $markdownTableService)
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

        foreach ($response as $response) {
            $list = $response->collect('list')->filter(fn ($item) => $item['status'] === 'active');
            if ($list->isEmpty()) {
                continue;
            }
            $message = $markdownTableService
                ->rows($list->take(5)->map(function ($item) {
                    return [
                        $item['name'],
                        number_format($item['fixed_price']),
                        " x" . $item['count'],
                        number_format($item['fixed_price'] * $item['count']),
                        "https://market.radiocaca.com/#/market-place/" . $item['id'],
                    ];
                })->toArray())
                ->render();

            $this->info($message);
            DiscordWebhook::make($this->discordWebhook, "$message\n")->send();
        }

        return Command::SUCCESS;
    }

    protected function buildQueryUrl($sortBy, $order, $category)
    {
        $url = 'https://market-api.radiocaca.com/nft-sales?pageNo=1&pageSize=20&sortBy=' . $sortBy . '&name=&order=' . $order . '&saleType&category=' . $category . '&tokenType';


        return $url;
    }
}
