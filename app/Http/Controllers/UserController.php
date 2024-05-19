<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Showing User Dashboard
     */
    public function user_dashboard()
    {
        return view('frontend.dashboard');
    }


    /**
     * Update user data
     * Admin data update is in another file (find in AdminController)
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

        return back()->with("status", "Profile Updated Successfully");

    }
}
