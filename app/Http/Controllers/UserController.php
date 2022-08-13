<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Acl\Role;
use App\Models\User;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $currentUser = auth()->user();
        $query = User::query()->with('role');

        if (!$currentUser->role->is_admin) {
            $query->whereHas('role', function ($role) {
                return $role->where('is_admin', false);
            });
        }

        $users = $query->paginate();

        return inertia('Users/Index', compact('users'));
    }

    public function create()
    {
        $props = $this->sharedProps([
            'name' => null,
            'email' => null,
            'role_id' => null,
        ]);

        return inertia('Users/Create', $props);
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
        $props = $this->sharedProps($user);

        return inertia('Users/Edit', $props);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->route('users.show', $user)->with('success', 'Usuário atualizado!');
    }

    public function destroy(User $user)
    {
        if ($user->is(auth()->user())) {
            return redirect()->route('users.index')->with('error', 'Não é possível excluír seu próprio usuário!');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário excluido!');
    }

    /**
     * @param \App\Models\User|array $user
     * @return void
     */
    private function sharedProps($user)
    {
        $roles = Role::query()->pluck('name', 'id')->all();

        return compact('user', 'roles');
    }
}
