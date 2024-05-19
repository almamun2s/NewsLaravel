<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Showing Category page
     */
    public function index()
    {
        $categories = Category::latest()->get();

        return view('admin.category.index', compact('categories'));
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
        while (Category::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . $i;
            $i++;
        }

        return $slug;
    }

    /**
     * Inserting category to DB
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|min:3',
        ], [
            'category_name.min' => 'Category Name should be at least 3 charactors',
        ]);

        $slug = $this->make_slug($request->category_name);

        Category::insert([
            'name' => $request->category_name,
            'slug' => $slug,
        ]);


        $notification = array(
            'message' => 'Category added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Showing Category edit page
     *
     * @param integer $id
     */
    public function edit(int $id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Updating Category 
     *
     * @param integer $id
     * @param Request $request
     */
    public function update(int $id, Request $request)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'category_name' => 'required|min:3',
        ], [
            'category_name.min' => 'Category Name should be at least 3 charactors',
        ]);

        $category->name = $request->category_name;

        $category->save();

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.category')->with($notification);
    }

    /**
     * Deleting Categories
     *
     * @param integer $id
     */
    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        $notification = array(
            'message' => 'Category Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
