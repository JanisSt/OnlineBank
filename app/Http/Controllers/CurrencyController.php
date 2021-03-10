<?php

namespace App\Http\Controllers;

use app\Models\ExchangeRate;
use App\Repositories\CurrenciesRepository;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    private $currenciesRepository;

    public function __construct(CurrenciesRepository $currenciesRepository)
    {
        $this->middleware('auth');
        $this->currenciesRepository = $currenciesRepository;
    }

    public function index()
    {

    }

}
