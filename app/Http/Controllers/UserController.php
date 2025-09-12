<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequests\UpdateUserRequest;
use App\Http\Requests\UserRequests\UserAddAvatarRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use stdClass;

class UserController extends Controller
{
    public function index()
    {
        if (!$user = auth()->user()) return to_route('home');


        $priority = array(
            'baixa' => $user->tasks()->where('priority', 'Baixa')->count(),
            'media' => $user->tasks()->where('priority', 'Média')->count(),
            'alta' => $user->tasks()->where('priority', 'Alta')->count()
        );

        $priority = collect($priority);
        return view('users.dashboard', compact('priority'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        if (!$user = auth()->user()) return to_route('home');

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request,)
    {
        if (!$user = auth()->user()) return to_route('home');
        $data = array_filter($request->validated());
        $user->update($data);
        return back()->with('message', 'Seus dados foram actualizados. com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        if (!$user = auth()->user()) return to_route('home');

        $user->destroy();

        return response()->json("A sua conta foi deletada!", 200);;
    }
    public function passwordUpdate()
    {
        if (!$user = auth()->user()) return to_route('home');

        //$user->destroy();

        return response()->json("A sua senha foi alterada com sucesso!", 200);;
    }
    public function addAvatar(UserAddAvatarRequest $request)
    {
        if (!$user = auth()->user()) return to_route('home');

        if ($request->hasFile('avatar')):
            $file = $request->file('avatar');
            $extension = "." . $file->extension();
            $name = Carbon::now() . '-' . $user->name;
            $filename = Str::slug($name) . $extension;

            $avatar = $request->file('avatar')->storeAs('avatars', $filename);
            if (Storage::fileExists($user->avatar ?? '')):
                Storage::delete($user->avatar);
            endif;
            $user->where('id', $user->id)->update(['avatar' => $avatar]);
        endif;


        return back()->with('message', 'Foto adicionada com sucesso!');
    }
}
