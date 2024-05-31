<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * Showing Setting controller page
     */
    public function index()
    {
        return view('admin.settings.index');
    }


    /**
     * Website Translation Control
     *
     * @param Request $request
     */
    public function web_settings_trnslt(Request $request)
    {
        $settings = Settings::findOrFail(1); // id 1 means it's name is translation. Settings::where('name', 'translation')->get(); will also work.

        $settings->is_active = (bool) $request->translation;
        $settings->save();

        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Website setting update
     *
     * @param Request $request
     */
    public function web_settings_backend(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        if ($request->dark_mode != null) {
            $user->dark_mode = 1;
        } else {
            $user->dark_mode = 0;
        }

        if ($request->top_bar_dark != null) {
            $user->top_bar_dark = 1;
        } else {
            $user->top_bar_dark = 0;
        }

        if ($request->boxed_layout != null) {
            $user->boxed_layout = 1;
        } else {
            $user->boxed_layout = 0;
        }

        if ($request->sidebar_user_info != null) {
            $user->sidebar_user_info = 1;
        } else {
            $user->sidebar_user_info = 0;
        }

        $user->left_sidebar_color = $request->left_sidebar_color;
        $user->left_sidebar_size = $request->left_sidebar_size;

        $user->save();
        $notification = array(
            'message' => 'Website Backend Settings Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
