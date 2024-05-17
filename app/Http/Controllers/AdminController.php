<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     */
    public function admin_logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
