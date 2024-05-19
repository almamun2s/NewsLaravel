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
        $action = 'updateInfo';
        return view('frontend.dashboard', compact('action'));
    }
    /**
     * Showing Change password form to users
     */
    public function change_password()
    {
        $action = 'change_password';
        return view('frontend.dashboard', compact('action'));
    }
}
