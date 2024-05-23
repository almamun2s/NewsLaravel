<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    /**
     * showing banner edit form for admin
     */
    public function show_banners()
    {
        $home_one = Banner::where('name', 'home_one')->get()[0];
        $home_two = Banner::where('name', 'home_two')->get()[0];
        $home_three = Banner::where('name', 'home_three')->get()[0];
        $home_four = Banner::where('name', 'home_four')->get()[0];
        $news_category = Banner::where('name', 'news_category')->get()[0];
        $news_details = Banner::where('name', 'news_details')->get()[0];
        return view('admin.banner.index', compact(['home_one', 'home_two', 'home_three', 'home_four', 'news_category', 'news_details']));
    }

    /**
     * Updating banner
     *
     * @param integer $id
     * @param Request $request
     */
    public function update_banners(int $id, Request $request)
    {
        $banner = Banner::findOrFail($id);
        if ($request->file($banner->name)) {
            $image = $request->file($banner->name);
            $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(720, 100)->save('uploads/banner/' . $img_name);

            $banner->image = $img_name;
            $banner->save();
            
            $notification = array(
                'message' => $banner->name . 'updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Failed to upload the image',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }
}
