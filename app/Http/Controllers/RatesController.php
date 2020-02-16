<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRate;
use Illuminate\Http\Request;

class RatesController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($currency_id) {
        return view('rate')->with([
            'rates' => $this->getCurrency($currency_id),
        ]);
    }

    /**
     * Get currency
     * @param $currency_id
     * @return mixed
     */
    public function getCurrency($currency_id) {
        return ExchangeRate::where('currency_id', $currency_id)->orderBy('date', 'DESC')->paginate(20);
    }
}
