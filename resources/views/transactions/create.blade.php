@extends('layouts.app')

@section('content')
    <div class="container">

        <form method="POST" action="/transactions">
            @csrf
            <h1 class="heading is-1">Make a new transaction</h1>

            <div class="control" style="display: none">
                <input type="text" class="input" name="users_id" value="{{Auth::user()->id }}">
            </div>

            <div class="form-group row">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Your Account</label>
                <div class="col-sm-10">
                    <input type="text" name="account_number" class="form-control form-control-lg" id="colFormLabelLg" placeholder="account number...">
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Receiver account</label>
                <div class="col-sm-10">
                    <input type="text" name="receiver_number" class="form-control form-control-lg" id="colFormLabelLg" placeholder="account number...">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Amount</label>
                    <input type="text" class="form-control" name="amount" placeholder="amount...">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Currency</label>
                    <input type="text" class="form-control" name="currency" value="EUR">
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Description</label>
                <div class="col-sm-10">
                    <input type="text" name="description" class="form-control form-control-lg" id="colFormLabelLg" placeholder="description">
                </div>
            </div>

<button class="btn btn-success">Submit payment</button>

        </form>
    </div>
@endsection
