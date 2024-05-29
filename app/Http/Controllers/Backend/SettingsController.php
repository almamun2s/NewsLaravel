<?php

namespace App\Http\Controllers\Backend;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
     * Website Translation Controle
     *
     * @param Request $request
     */
    public function web_settings_trnslt(Request $request)
    {
        $settings = Settings::findOrFail(1);

        $settings->translation = (bool) $request->translation;
        $settings->save();

        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
