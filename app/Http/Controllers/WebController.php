<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;
use Feeds;

class WebController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function index() {

        return view('homepage')->with([
            'rates' => $this->getExchangeRates()
        ]);
    }

    /**
     * Get today's exchange rates
     */
    public function getExchangeRates() {
        $date = ExchangeRate::orderBy('date', 'DESC')->first()->date;

        $rates = ExchangeRate::where('date', $date);

        if(request()->search) {
            $currency = Currency::where('name', request()->search)->first();

            if($currency) {
                $rates = $rates->where('currency_id', $currency->id);
            } else {
                $rates = $rates->where('currency_id', null);
            }

        }

        $rates = $rates->paginate(20);

        return [
            'date' => $date,
            'rates' => $rates
        ];
    }
}
