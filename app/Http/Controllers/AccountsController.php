<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\LBCurrenciesRepository;


class AccountsController extends Controller
{
    public function index()
    {

        return view('accounts.index',[
            'user'=>auth()->user(),
            'accounts'=>auth()->user()->accounts,
            'transactions'=>auth()->user()->transactions,
            (new LBCurrenciesRepository)->getExchangeRates()
        ]);

    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store(Request $request)
    {
       $account = (new Account)->fill($request->all());
       $account->user()->associate(auth()->user());
       $account->save();
        return redirect()->route('accounts.index');
    }
    public function show(Account $account, Transaction $transaction)
    {
        return view('accounts.show',[
            'user'=>auth()->user(),
            'account'=>$account,
            'transactions'=>auth()->user()->transactions,
        ]);
    }

    public function edit(Account $account)
    {
        return view('accounts.edit',[

            'account'=>$account
        ]);

    }

    public function update(Request $request, Account $account)
    {
        $account->update($request->all());
        return redirect()->route('accounts.edit', $account);
    }

    public function destroy(Account $account)
    {
        $this->authorize('delete', $account);

        $account->delete();

        return redirect()->route('accounts.index');
    }
}



//use App\Events\ArticleWasCreated;


