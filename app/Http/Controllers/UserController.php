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
        

        return view('dashboard', compact('status'));
    }

   /**
     * Display the specified resource.
     */
    public function show()
    {

        if (!$user = auth()->user()) return to_route('home');
        
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        if (!$user = auth()->user()) return to_route('home');

        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, )
    {
        if (!$user = auth()->user()) return to_route('home');
        
        $user->update($request->validated());
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
}
