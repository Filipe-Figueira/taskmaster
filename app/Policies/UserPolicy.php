<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{

    public function anyAction(User $user): bool
    {
        return $user->id === Auth::id();
    }
}
