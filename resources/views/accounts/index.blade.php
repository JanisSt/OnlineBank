@extends('layouts.app')
@section('content')
    <div class="container">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Account number</th>
                <th scope="col">Account Balance</th>
                <th scope="col">Account Currency</th>
                <th scope="col">Account Created</th>
                <th scope="col">Last changes</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($accounts as $account)
                @can('viewAny', $account)
                <tr>
                    <td>
                        <a href="{{route('accounts.show', $account) }}">
                            {{ $account->account_number }}
                        </a>
                    </td>
                    <td>{{ $account->getDecimals() }}</td>
                    <td>{{ $account->currency }}</td>
                    <td>{{ $account->created_at->format('Y-m-d h:i')  }}</td>
                    <td>{{ $account->updated_at->format('Y-m-d h:i') }}</td>
                    <td>
{{--                        <a href="{{ route('account.edit', $account) }}" class="btn btn-sm btn-warning">--}}
{{--                            Make a transfer--}}
{{--                        </a>--}}
                        <form method="post" action="{{ route('accounts.destroy', $account) }}"
                              style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">
                                Remove account
                            </button>
                        </form>
                    </td>
                </tr>
                @endcan
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('accounts.create') }}" class="btn btn-success btn-sm">
            Create new Bank Account
        </a>
    </div>





    <br>
    <br><br>
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

                    <tr>
                        <td>{{ $transaction->account_number }}</td>
                        <td>{{ $transaction->receiver_number }}</td>
                        <td>{{ $transaction->getDecimals() }}</td>
                        <td>{{ $transaction->currency}}</td>
                        <td>{{ $transaction->updated_at->format('Y-m-d h:i') }}</td>
{{--                        <td>--}}
                            {{--                        <a href="{{ route('account.edit', $account) }}" class="btn btn-sm btn-warning">--}}
                            {{--                            Make a transfer--}}
                            {{--                        </a>--}}

{{--                        </td>--}}
                    </tr>
{{--                @endcan--}}
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
