<?php

namespace App\Policies;

use App\Models\Account;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Account $account): bool
    {
        return $user->id === $account->account_user;
    }
    public function viewAny(User $user, Account $account): bool
    {
        return $user->id === $account->account_user;
    }
    public function view(User $user, Account $account): bool
    {
        return $user->id === $account->account_user;
    }
    public function create(User $user, Account $account): bool
    {
        return $user->id === $account->account_user;
    }
    public function delete(User $user, Account $account): bool
    {
        return $user->id === $account->account_user;
    }
}
