<?php

namespace App\Repositories;

class SwedbankCurrenciesRepository implements CurrenciesRepository
{

    public function getBySymbol(string $symbol): array
    {
        return  [
            'bank'=>'Swedbank',
            'currency'=>$symbol,
            'rate'=>0.86
        ];
    }
}
