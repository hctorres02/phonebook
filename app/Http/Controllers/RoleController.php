<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\RoleRequest;
use App\Models\Acl\Permission;
use App\Models\Acl\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class);
    }

    public function index()
    {
        $roles = Role::query()->when(!auth()->user()->is_admin, function ($query) {
            return $query->where('is_admin', false);
        })->paginate();

        return inertia('Acl/Roles/Index', compact('roles'));
    }

    public function create()
    {
        $props = $this->sharedProps([
            'name' => null,
            'description' => null,
            'is_admin' => false,
            'permissions_ids' => [],
        ]);

        return inertia('Acl/Roles/Create', $props);
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create($request->validated());
        $role->permissions()->attach($request->permissions_ids);

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
        $role->permissions()->sync($request->permissions_ids);

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
        $permissions = Permission::where('enabled', true)->get([
            'id', 'name', 'description'
        ])->all();

        if (!is_array($role)) {
            $role->permissions_ids = $role->permissions()->pluck('id')->all();
        }

        return compact('role', 'permissions');
    }
}
