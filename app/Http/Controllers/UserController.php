<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->paginate();

        return inertia('Users/Index', compact('users'));
    }

    public function create()
    {
        return inertia('Users/Create');
    }

    public function store(UserRequest $request)
    {
        $password = Str::random(8);

        $data = array_merge($request->validated(), [
            'password' => bcrypt($password),
        ]);

        $user = User::create($data);

        // event(new NewUserRegistered($user, $password));

        return redirect()->route('users.show', $user)->with('success', 'Usuário cadastrado!');
    }

    public function show(User $user)
    {
        return inertia('Users/Show', compact('user'));
    }

    public function edit(User $user)
    {
        return inertia('Users/Edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->route('users.show', $user)->with('success', 'Usuário atualizado!');
    }
}
