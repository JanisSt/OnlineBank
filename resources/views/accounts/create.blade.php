@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('accounts.index') }}" class="btn btn-primary btn-sm">
            Back
        </a>
        <form method="post" action="{{ route('accounts.store') }}">
            @csrf

            <div class="form-group">
                <label for="title">Account Number</label>
                <input type="text" class="form-control" id="account_number" name="account_number" value="
<?php echo substr(str_shuffle(str_repeat('0123456789', 11)), 0, 11);
                ?> " readonly>
            </div>
            <div class="form-group">
                <label for="content">How much would you like to deposit, when opening an account?</label>
                <input onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="form-control" name="amount"
                       id="amount">
            </div>
            <div class="form-group">
                <label for="content">In what currency</label>
                <input class="form-control" name="currency" id="currency"
                       type="text" onkeyup="
  var start = this.selectionStart;
  var end = this.selectionEnd;
  this.value = this.value.toUpperCase();
  this.setSelectionRange(start, end);
">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
    <input type="hidden" value="3487">

@endsection
