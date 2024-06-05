<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Showing Dashboard for Admin users
     */
    public function show_dashboard()
    {
        return view('admin.admin_dashboard');
    }

    /**
     * Logging out an Admin
     *
     * @param Request $request
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Showing Admin Profile
     */
    public function admin_profile()
    {
        return view('admin.admin_profile');
    }

    /**
     * Updating admin profile information
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $request->validate([
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
        ], [
            'fname.required' => 'First name can not be empty',
            'fname.min' => 'First name should be at least 3 charactors',

            'lname.required' => 'Last name can not be empty',
            'lname.min' => 'Last name should be at least 3 charactors',

            'email.required' => 'Please provide an email',
            'email.email' => 'Email is invalid',

            'phone.required' => 'Phone number can not be empty',
        ]);

        $data->fname = $request->fname;
        $data->lname = $request->lname;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            if ($data->photo != null) {
                unlink(public_path('uploads/admin_images/' . $data->photo));
            }

            $file = $request->file('photo');

            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/admin_images'), $fileName);

            $data->photo = $fileName;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Data updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification)->with("status", "Profile Updated Successfully");
    }


    /**
     * Change admin password
     *
     * @param Request $request
     */
    public function change_pwd(Request $request)
    {
        $request->validate([
            'password_old' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('The password you entered was incorrect');
                    }
                }
            ],
            'password' => 'required|min:8|confirmed',
        ], [
            'password_old.required' => 'Enter your current password here',
            'password.required' => 'Enter a new password here',
            'password.min' => 'Password must at least 8 charactors',
        ]);

        User::find(Auth::user()->id)->update([
            'password' => $request->password // Password will be hash automically 
        ]);

        $notification = array(
            'message' => 'Password changed Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification)->with("status", "Password changed Successfully");
    }

    /**
     * Showing admin manage page
     */
    public function manage()
    {
        $admins = User::where('role', 'admin')->latest()->get();
        return view('admin.manage.admins', compact('admins'));
    }

    /**
     * Check Admin status
     *
     * @param integer $id // Other user id to match with current user. If match redirect to 404.
     */
    private function check_admin(int $id)
    {
        if (Auth::user()->id == $id) {
            abort(401);
        }
    }

    /**
     * Making Admin Active
     * @param int $id 
     */
    public function active(int $id)
    {
        $admin = User::findOrFail($id);
        $this->check_admin($id);

        $admin->update(['status' => 'active']);

        $notification = array(
            'message' => $admin->fname . ' activated',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.manage')->with($notification);
    }

    /**
     * Making Admin Inctive
     * @param int $id 
     */
    public function inactive(int $id)
    {
        $admin = User::findOrFail($id);
        $this->check_admin($id);

        $admin->update(['status' => 'inactive']);

        $notification = array(
            'message' => $admin->fname . ' Deactivated',
            'alert-type' => 'error'
        );
        return redirect()->route('admin.manage')->with($notification);
    }

    /**
     * Showing User manage page
     */
    public function user_manage()
    {
        $users = User::where('role', 'user')->latest()->get();
        return view('admin.manage.users', compact('users'));
    }

    /**
     * Making the user Admin
     *
     * @param integer $id
     */
    public function make_admin(int $id)
    {
        $user = User::findOrFail($id);

        $user->update(['role' => 'admin']);

        $notification = array(
            'message' => $user->fname . ' Added as an Admin User',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.manage')->with($notification);
    }

    /**
     * Making the admin -> Admin
     *
     * @param integer $id
     */
    public function make_user(int $id)
    {
        $user = User::findOrFail($id);
        $this->check_admin($id);

        $user->update(['role' => 'user']);
        $user->roles()->detach();

        $notification = array(
            'message' => $user->fname . ' removed from Admin User',
            'alert-type' => 'error'
        );
        return redirect()->route('admin.manage')->with($notification);
    }


    public function admin_user_manage(int $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.manage.admin_user_manage', compact(['user', 'roles']));
    }

    public function admin_user_manage_update(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        $this->check_admin($id);

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => $user->fname . ' assigned as ' . $request->roles,
            'alert-type' => 'success'
        );
        return redirect()->route('admin.manage')->with($notification);
    }
}
