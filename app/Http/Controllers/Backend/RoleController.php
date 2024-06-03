<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

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

        return view('admin.manage.role.edit', compact('role'));
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
}
