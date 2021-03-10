<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;


class TransactionsController extends Controller
{

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request, Account $account)
    {
//TODO add colors and +/-
//TODO add DB::transaction
//TODO add incoming transactions
        $paymentAccount = Account::where('account_number', $request['account_number'])->first();

        if ($paymentAccount->account_user != ($request['users_id'])) {
                       return back()->withErrors('Please choose a correct account');

        } else {
            $receiverAccount = Account::where('account_number', $request['receiver_number'])->first();
            $cash = $request['amount'];
            $this->update($paymentAccount, $receiverAccount, $cash);

            $transaction = (new Transaction)->fill($request->all());

            $transaction->save();

            return redirect()->route('accounts.index');
        }
    }

    public function update(Account $paymentAccount, Account $receiverAccount, $cash)
    {
        $paymentAccount->decrement('amount', $cash);
        $receiverAccount->increment('amount', $cash);
    }

}
