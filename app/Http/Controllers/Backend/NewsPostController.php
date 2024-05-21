<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\NewsPost;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        //
    }

    /**
     * Display the specified News Post.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified News Post.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified News Post in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified News Post from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
