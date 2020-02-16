<?php

namespace App\Console\Commands;

use App\Models\Currency;
use App\Models\ExchangeRate;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Feeds;

class update_currency_rates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rates:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update currency rates from RSS feed.';

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
     * @return mixed
     */
    public function handle()
    {
        $feed = Feeds::make('https://www.bank.lv/vk/ecb_rss.xml');
        $data = array(
            'items'     => $feed->get_items(),
        );

        foreach($data['items'] as $item) {
            $date = $item->get_date('j-m-Y');
            $rss_feed[$date] =  $item->get_description();

            $array = explode(' ', $rss_feed[$date]);

            for($i = 0; $i < count($array); $i++) {
                if($i % 2 == 0) {
                    $collection[$date][$array[$i]] = $array[$i+1];
                }
            }
        }

        foreach($collection as $date => $value) {
            foreach($value as $currencyName => $rate) {
                $currency = Currency::firstOrCreate([
                    'name' => $currencyName
                ]);

                ExchangeRate::where('date', $date)->updateOrCreate([
                    'date' => date('d-m-Y', strtotime($date)),
                    'currency_id' => $currency->id,
                ], [
                    'rate' => $rate,
                ]);
            }
        }
    }
}
