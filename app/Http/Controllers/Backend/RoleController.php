<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the role.
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin.manage.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created role in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
        ], [
            'name.required' => 'Name is requuired',
            'name.min' => 'Name should be at least 3 charactor',
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified role.
     */
    public function show(string $id)
    {
        abort(403);
    }

    /**
     * Show the form for editing the specified role.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permission_groups = User::getPermissionGroup();

        return view('admin.manage.role.edit', compact(['role', 'permission_groups']));
    }

    /**
     * Update the specified role in storage.
     */
    public function update(Request $request, int $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'name' => 'required|min:3',
        ], [
            'name.required' => 'Name is requuired',
            'name.min' => 'Name should be at least 3 charactor',
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('admin/roles')->with($notification);
    }

    /**
     * Remove the specified role from storage.
     */
    public function destroy(int $id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        $notification = array(
            'message' => 'Role Deleted',
            'alert-type' => 'error'
        );
        return redirect('/admin/roles')->with($notification);
    }

    public function update_permissions(Request $request, int $id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
