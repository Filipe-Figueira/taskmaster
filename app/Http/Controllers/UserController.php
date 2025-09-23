<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequests\PasswordUpdateRequest;
use App\Http\Requests\UserRequests\UpdateUserRequest;
use App\Http\Requests\UserRequests\UserAddAvatarRequest;
use App\Services\UserService;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    public function index()
    {
        $priority = collect($this->service->getTaskPriorities());
        return view('users.dashboard', compact('priority'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = $this->service->find();
        return view('users.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request,)
    {
        $this->service->update($request->validated());
        
        return back()->with('message', 'Seus dados foram actualizados. com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $this->service->delete();
        return response()->json([
            'message' => 'A sua conta foi deletada!',
            'redirectRoute' =>  route('home')
    ]);
    }

    public function passwordUpdate(PasswordUpdateRequest $request)
    {
        $this->service->passwordUpdate($request->password);

        return response()->json("A sua senha foi alterada com sucesso!", 200);;
    }

    public function addAvatar(UserAddAvatarRequest $request)
    {
        $this->service->addAvatar($request->file('avatar'));

        return back()->with('message', 'Foto adicionada com sucesso!');
    }
}
