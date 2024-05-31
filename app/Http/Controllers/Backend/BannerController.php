<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use App\Models\LiveTV;
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


    /**
     * showing LiveTV edit page
     */
    public function livetv()
    {
        $video = LiveTV::findOrFail(1);

        return view('admin.gallery.video.edit_live_tv', compact('video'));
    }

    /**
     * Updating Live TV options
     *
     * @param Request $request
     */
    public function livetvUpdate(Request $request)
    {
        $video = LiveTV::findOrFail(1);

        $request->validate([
            'url' => 'required|url'
        ], [
            'url.required' => 'Please Provide Video URL',
            'url.url' => 'Please Provide a valid Video URL',
        ]);


        if ($request->file('image')) {
            if ($video->image != null) {
                unlink(public_path('uploads/banner/' . $video->image));
            }
            $image = $request->file('image');
            $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(784, 436)->save('uploads/banner/' . $img_name);

            $video->image = $img_name;
        }

        $video->url = $request->url;
        if ($request->live_status != null) {
            $video->isActive = 1;
        } else {
            $video->isActive = 0;
        }

        $video->save();

        $notification = array(
            'message' => 'Video updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
