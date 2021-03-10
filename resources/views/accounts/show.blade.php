@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Your Bank account number is {{$account->account_number}}</h1>
        <p>
            Current balance {{ $account->getDecimals() }}
        </p>
    </div>

    <div class="container">
        <h3>Account transaction history</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">User IBAN</th>
                <th scope="col">Receiver IBAN</th>
                <th scope="col">Amount transferred</th>
                <th scope="col">Currency</th>
                <th scope="col">Time of transaction</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($transactions as $transaction)
                {{--                @can('viewAny', $transaction)--}}
@if($account->account_number  == $transaction->account_number)
                <tr>
                    <td>{{ $transaction->account_number }}</td>
                    <td>{{ $transaction->receiver_number }}</td>
                    <td>{{ $transaction->getDecimals() }}</td>
                    <td>{{ $transaction->currency}}</td>
                    <td>{{ $transaction->updated_at->format('Y-m-d h:i') }}</td>

                </tr>
                {{--                @endcan--}}
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
