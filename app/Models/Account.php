<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
/**
 * Class Account
 * @package App\Models
 *
 * @mixin Builder;
 */

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_number',
        'amount',
        'currency'
            ];

    public function user()
    {
       return $this->belongsTo(User::class, 'account_user', 'id');
    }

    public function getDecimals()
    {
        return number_format($this->amount, 2);
    }
}

