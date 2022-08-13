<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\RoleRequest;
use App\Models\Acl\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::query()->paginate();

        return inertia('Acl/Roles/Index', compact('roles'));
    }

    public function create()
    {
        $props = $this->sharedProps([
            'name' => null,
            'description' => null,
            'is_admin' => false,
        ]);

        return inertia('Acl/Roles/Create', $props);
    }

    public function store(RoleRequest $request)
    {
        Role::create($request->validated());

        return redirect()->route('roles.index')->with('success', 'Perfil cadastrado!');
    }

    public function show()
    {
        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        $props = $this->sharedProps($role);

        return inertia('Acl/Roles/Edit', $props);
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->validated());

        return redirect()->route('roles.index')->with('success', 'Perfil atualizado!');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Perfil excluído!');
    }

    /**
     * @param \App\Models\Acl\Role|array $role
     */
    private function sharedProps($role)
    {
        return compact('role');
    }
}
