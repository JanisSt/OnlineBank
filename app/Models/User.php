<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'name',
        'email',
        'password'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    public function accounts()
//    {
//        return $this->hasMany(Account::class, 'account_user','id');
//    }
//
//    public function sentPayments()
//    {
//
//    }
//
//    public function receivedPayment()
//    {
//
//    }
    public function accounts(): hasMany
    {
        return $this->hasMany(Account::class, 'account_user');
    }
    public function transactions(): hasMany
    {
        return $this->hasMany(Transaction::class, 'users_id');
    }

    public function sentTransactions(): hasMany
    {
        return $this->hasMany(Transaction::class, 'account_id');
    }

    public function receivedTransactions(): hasMany
    {
        return $this->hasMany(Transaction::class, 'receiver_id');
    }
}
