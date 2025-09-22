<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService
{
    protected $user;

    public function __construct(User $user)
    {
        Gate::authorize('anyAction', $user);
        $this->user = $user->where('id', Auth::id())->firstOrFail();
    }
    public function getTaskPriorities()
    {
        return [
            'baixa' => $this->user->tasks()->where('priority', 'Baixa')->count(),
            'media' => $this->user->tasks()->where('priority', 'Média')->count(),
            'alta' => $this->user->tasks()->where('priority', 'Alta')->count()
        ];
    }

    public function find()
    {
        $user = $this->user;

        return $user;
    }

    public function update(array $request): bool
    {
        $user = $this->find();

        return $user->update($request);
    }

    public function delete(): bool
    {
        $user = $this->user;
        if (Storage::fileExists($user->avatar ?? '')):
            Storage::delete($user->avatar);
        endif;
        return $user->delete();
    }
    public function passwordUpdate($newPassword): bool
    {
        $user = $this->user;
        
        return $user->where('id', $user->id)->update(['password' => Hash::make($newPassword)]);
    }
    public function addAvatar($avatar): bool
    {
        $user = $this->user;
        
        $avatar = $avatar->store('avatars');
        if (Storage::fileExists($user->avatar ?? '')):
            Storage::delete($user->avatar);
        endif;
        
        return $user->where('id', $user->id)->update(['avatar' => $avatar]);
    }
}
