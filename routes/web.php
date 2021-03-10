<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
if(Auth::user() == true)
{
    Route::resource('/', 'AccountsController')
        ->middleware(['auth']);
}
else{


Route::get('/', function () {
    return view('auth.login');
});
}
Route::resource('accounts', 'AccountsController')
    ->middleware(['auth']);

Route::view('/home','home')->middleware(['auth', 'verified']);
Route::view('/profile/edit','profile.edit')->middleware('auth');
Route::view('/profile/password','profile.password')->middleware('auth');

Route::resource('transactions', 'TransactionsController')->middleware(['auth', 'password.confirm']);
