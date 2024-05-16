<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Showing Dashboard for Admin users
     */
    public function show_dashboard()
    {
        return view('admin.admin_dashboard');
    }
}
