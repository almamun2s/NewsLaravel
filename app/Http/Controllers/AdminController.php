<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
    public function admin_logout(Request $request)
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
        return redirect()->back()->with($notification);
    }


    /**
     * Change admin password
     *
     * @param Request $request
     */
    public function change_pwd(Request $request)
    {
        $request->validate([
            'password_old' =>  [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('The password you entered was incorrect');
                    }
                }
            ],
            'password' => 'required|min:8|confirmed',
        ],[
            'password_old.required' => 'Enter your current password here',
            'password.required' => 'Enter a new password here',
            'password.min' => 'Password must at least 8 charactors',
        ]);

        User::find(Auth::user()->id)->update([
            'password'  => $request->password // Password will be hash automically 
        ]);

        $notification = array(
            'message' => 'Password changed Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
