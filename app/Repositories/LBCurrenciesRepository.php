<?php

namespace App\Repositories;

use App\Models\ExchangeRate;

class LBCurrenciesRepository implements CurrenciesRepository
{
    public function getExchangeRates()
    {
        $data = simplexml_load_file('https://www.bank.lv/vk/ecb.xml');

        ExchangeRate::query()->truncate();

        for ($i = 0; $i < 31; $i++) {
            $currency = $data->Currencies->Currency[$i];
            $bankId = $currency->ID;
            $bankRate = $currency->Rate;

            $save = (new ExchangeRate)->
            fill(['Exchange_rate_id' => $bankId, 'Exchange_rate' => $bankRate]);
            $save->save();
        }

    }
}
