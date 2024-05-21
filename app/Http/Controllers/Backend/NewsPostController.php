<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class NewsPostController extends Controller
{
    /**
     * Display a listing of the News Post.
     */
    public function index()
    {
        $allNews = NewsPost::latest()->get();

        return view('admin.news.index', compact('allNews'));
    }

    /**
     * Show the form for creating a new News Post.
     */
    public function create()
    {
        $categories = Category::get();

        return view('admin.news.create', compact('categories'));
    }

    /**
     * Store a newly created News Post in storage.
     */
    public function store(Request $request)
    {
        if (empty($request->category_id)) {
            return redirect()->back()->withErrors(['category' => 'Please Select a Category']);
        }
        $request->validate([
            'title' => 'required|min:10',
            'details' => 'required|min:20',
            'tags' => 'required',
        ], [
            'title.required' => 'Please provide your news title',
            'title.min' => 'News title should be minimum 10 charactors',
            'details.required' => 'Please provide your news details',
            'details.min' => 'News details should be minimum 20 charactor',
            'tags.required' => 'At least one tag should be provided',
        ]);

        $img_name = null;
        
        if ($request->file('image')) {
            $image = $request->file('image');
            $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(784, 436)->save('uploads/news/' . $img_name);
        }
        NewsPost::insert([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'title' => $request->title,
            'title_slug' => $this->make_slug($request->title),
            'image' => $img_name,
            'details' => $request->details,
            'tags' => $request->tags,
            'breaking_news' => $request->breaking_news,
            'top_slider' => $request->top_slider,
            'section_three' => $request->section_three,
            'section_nine' => $request->section_nine,
            'date' => date('d-m-Y'),
            'month' => date('F'),
            'status' => $request->news_status == 1 ? 'publish' : 'archive',
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'News Posed Successfully',
            'alert-type' => 'success'
        );
        return redirect('/admin/news_post')->with($notification);

    }

    /**
     * Display the specified News Post.
     */
    public function show(string $id)
    {
        abort(403);
    }

    /**
     * Show the form for editing the specified News Post.
     */
    public function edit(string $id)
    {
        $news = NewsPost::findOrFail($id);
        $categories = Category::get();
        $sub_categories = SubCategory::where('category_id', $news->category_id)->get();

        return view('admin.news.edit', compact(['news', 'categories', 'sub_categories']));
    }

    /**
     * Update the specified News Post in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = NewsPost::findOrFail($id);

        if (empty($request->category_id)) {
            return redirect()->back()->withErrors(['category' => 'Please Select a Category']);
        }
        $request->validate([
            'title' => 'required|min:10',
            'details' => 'required|min:20',
            'tags' => 'required',
        ], [
            'title.required' => 'Please provide your news title',
            'title.min' => 'News title should be minimum 10 charactors',
            'details.required' => 'Please provide your news details',
            'details.min' => 'News details should be minimum 20 charactor',
            'tags.required' => 'At least one tag should be provided',
        ]);

        if ($request->file('image')) {
            if ($news->image != null) {
                unlink(public_path('uploads/news/' . $news->image));
            }

            $image = $request->file('image');
            $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(784, 436)->save('uploads/news/' . $img_name);
            $news->image = $img_name;
        }

        $news->category_id = $request->category_id;
        $news->subcategory_id = $request->subcategory_id;
        $news->title = $request->title;
        $news->details = $request->details;
        $news->tags = $request->tags;
        $news->breaking_news = $request->breaking_news;
        $news->top_slider = $request->top_slider;
        $news->section_three = $request->section_three;
        $news->section_nine = $request->section_nine;
        $news->status = $request->news_status == 1 ? 'publish' : 'archive';

        $news->save();

        $notification = array(
            'message' => 'News Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/admin/news_post')->with($notification);
    }

    /**
     * Remove the specified News Post from storage.
     */
    public function destroy(string $id)
    {
        $news = NewsPost::findOrFail($id);

        if ($news->image != null) {
            unlink(public_path('uploads/news/' . $news->image));
        }

        $news->delete();

        $notification = array(
            'message' => 'News Deleted',
            'alert-type' => 'error'
        );
        return redirect('/admin/news_post')->with($notification);
    }

    /**
     * Making Slug from text
     *
     * @param string $baseSlug
     * @return string
     */
    private function make_slug(string $baseSlug): string
    {
        // Making Slug
        $slug = preg_replace('/[^a-z0-9\-_]/i', '-', $baseSlug);
        $slug = strtolower($slug);
        $slug = trim($slug, '-');

        $i = 1;
        // Loop until a unique slug is found
        while (NewsPost::where('title_slug', $slug)->exists()) {
            $slug = $slug . '-' . $i;
            $i++;
        }

        return $slug;
    }
}
