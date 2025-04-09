<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Bill;
use Illuminate\Auth\Access\HandlesAuthorization;

class BillPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role === 'user';
    }

    public function view(User $user, Bill $bill)
    {
        return $user->id === $bill->user_id && $user->hasRole('user');
    }


    public function create(User $user)
    {
    }


    public function update(User $user, Bill $bill)
    {

        return $user->id === $bill->user_id && $user->hasRole('user');
    }

    public function delete(User $user, Bill $bill)
    {
        return $user->id === $bill->user_id && $user->hasRole('user');
    }
}
