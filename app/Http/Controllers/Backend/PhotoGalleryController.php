<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the PhotoGallery.
     */
    public function index()
    {

        $photos = PhotoGallery::latest()->get();
        return view('admin.gallery.photo.index', compact('photos'));
    }

    /**
     * Show the form for creating a new PhotoGallery.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created PhotoGallery in storage.
     */
    public function store(Request $request)
    {
        $images = $request->file('image');

        foreach ($images as $image) {
            $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(700, 400)->save('uploads/gallery/photos/' . $img_name);

            PhotoGallery::insert([
                'image' => $img_name,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Photo uploaded Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified PhotoGallery.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified PhotoGallery.
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Update the specified PhotoGallery in storage.
     */
    public function update(Request $request, string $id)
    {
        abort(404);
    }

    /**
     * Remove the specified PhotoGallery from storage.
     */
    public function destroy(string $id)
    {
        $photo = PhotoGallery::findOrFail($id);

        if ($photo->image != null) {
            unlink(public_path('uploads/gallery/photos/' . $photo->image));
        }

        $photo->delete();

        $notification = array(
            'message' => 'Photo Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
