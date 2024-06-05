<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the Permission.
     */
    public function index()
    {
        if (!Auth::user()->can('roles.permission')) {
            abort(401);
        }
        $permissions = Permission::all();

        return view('admin.manage.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new Permission.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created Permission in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('roles.permission')) {
            abort(401);
        }
        $request->validate([
            'name' => 'required|min:3',
        ], [
            'name.required' => 'Name is requuired',
            'name.min' => 'Name should be at least 3 charactor',
        ]);

        Permission::create([
            'name' => $request->group_name . '.' . $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified Permission.
     */
    public function show(string $id)
    {
        abort(403);
    }

    /**
     * Show the form for editing the specified Permission.
     */
    public function edit(string $id)
    {
        if (!Auth::user()->can('roles.permission')) {
            abort(401);
        }
        $permission = Permission::findOrFail($id);

        return view('admin.manage.permission.edit', compact('permission'));
    }

    /**
     * Update the specified Permission in storage.
     */
    public function update(Request $request, int $id)
    {
        if (!Auth::user()->can('roles.permission')) {
            abort(401);
        }
        $permission = Permission::findOrFail($id);

        $request->validate([
            'name' => 'required|min:3',
        ], [
            'name.required' => 'Name is requuired',
            'name.min' => 'Name should be at least 3 charactor',
        ]);

        $permission->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified Permission from storage.
     */
    public function destroy(int $id)
    {
        if (!Auth::user()->can('roles.permission')) {
            abort(401);
        }
        $permission = Permission::findOrFail($id);

        $permission->delete();

        $notification = array(
            'message' => 'Permission Deleted',
            'alert-type' => 'error'
        );
        return redirect('/admin/permissions')->with($notification);
    }
}
