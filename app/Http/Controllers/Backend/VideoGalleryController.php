<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the VideoGallery.
     */
    public function index()
    {
        if (!Auth::user()->can('gallery.video.show')) {
            abort(401);
        }

        $videos = VideoGallery::latest()->get();

        return view('admin.gallery.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new VideoGallery.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created VideoGallery in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('gallery.video.add')) {
            abort(401);
        }


        $request->validate([
            'title' => 'required|min:10',
            'url' => 'required|url',
        ], [
            'title.required' => 'Please provide your Video title',
            'title.min' => 'Video title should be minimum 10 charactors',
            'url.required' => 'Please Provide Video URL',
            'url.url' => 'Please Provide a valid Video URL',
        ]);

        $img_name = null;

        if ($request->file('image')) {
            $image = $request->file('image');
            $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(784, 436)->save('uploads/gallery/videos/' . $img_name);
        }
        VideoGallery::insert([
            'title' => $request->title,
            'url' => $request->url,
            'image' => $img_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Video added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified VideoGallery.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified VideoGallery.
     */
    public function edit(string $id)
    {
        if (!Auth::user()->can('gallery.video.edit')) {
            abort(401);
        }
        $video = VideoGallery::findOrFail($id);

        return view('admin.gallery.video.edit', compact('video'));
    }

    /**
     * Update the specified VideoGallery in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::user()->can('gallery.video.edit')) {
            abort(401);
        }
        $video = VideoGallery::findOrFail($id);

        $request->validate([
            'title' => 'required|min:10',
            'url' => 'required|url',
        ], [
            'title.required' => 'Please provide your Video title',
            'title.min' => 'Video title should be minimum 10 charactors',
            'utl.required' => 'Please Provide Video URL',
            'utl.url' => 'Please Provide a valid Video URL',
        ]);


        if ($request->file('image')) {
            if ($video->image != null) {
                unlink(public_path('uploads/gallery/videos/' . $video->image));
            }

            $image = $request->file('image');
            $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(784, 436)->save('uploads/gallery/videos/' . $img_name);

            $video->image = $img_name;
        }

        $video->title = $request->title;
        $video->url = $request->url;

        $video->save();

        $notification = array(
            'message' => 'Video Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('admin/video_gallery')->with($notification);
    }

    /**
     * Remove the specified VideoGallery from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::user()->can('gallery.video.delete')) {
            abort(401);
        }

        $video = VideoGallery::findOrFail($id);

        if ($video->image != null) {
            unlink(public_path('uploads/gallery/videos/' . $video->image));
        }

        $video->delete();

        $notification = array(
            'message' => 'Video Deleted',
            'alert-type' => 'error'
        );
        return redirect('/admin/video_gallery')->with($notification);
    }
}
