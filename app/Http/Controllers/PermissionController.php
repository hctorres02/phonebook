<?php

namespace App\Http\Controllers;

use App\Http\Requests\Acl\PermissionRequest;
use App\Models\Acl\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::query()->paginate();

        return inertia('Acl/Permissions/Index', compact('permissions'));
    }

    public function create()
    {
        $permission = [
            'name' => null,
            'description' => null,
            'enabled' => true,
        ];

        return inertia('Acl/Permissions/Create', compact('permission'));
    }

    public function store(PermissionRequest $request)
    {
        $permission = Permission::create($request->validated());

        return redirect()->route('permissions.index')
            ->with('success', "Permissão '{$permission->name}' cadastrada!");
    }

    public function show()
    {
        return redirect()->route('permissions.index');
    }

    public function edit(Permission $permission)
    {
        return inertia('Acl/Permissions/Edit', compact('permission'));
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());

        return redirect()->route('permissions.index')
            ->with('success', "Permissão '{$permission->name}' atualizada!");
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permissions.index')
            ->with('success', "Permissão '{$permission->name}' excluída!");
    }
}
