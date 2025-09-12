<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequests\UpdateUserRequest;
use stdClass;

class UserController extends Controller
{
    public function index() {
        if (!$user = auth()->user()) return to_route('home');

        $status = new stdClass;

        $status->pendente = $user->tasks()->where('status', 'Pendente')->count();
        $status->concluida = $user->tasks()->where('status', 'Concluída')->count();
        $status->atrasada = $user->tasks()->where('status', 'Atrasada')->count();
        

        return view('users.dashboard', compact('status'));
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
    public function update(UpdateUserRequest $request, )
    {
        if (!$user = auth()->user()) return to_route('home');
        $data = array_filter($request->validated());
        $user->update($data);
        return response()->json('Seus dados foram actualizados.', 200);
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
    
}
