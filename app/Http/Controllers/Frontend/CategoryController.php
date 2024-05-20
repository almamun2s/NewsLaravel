<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\SubCategory;
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
    private function make_slug(Category|SubCategory $category, string $baseSlug): string
    {
        // Making Slug
        $slug = preg_replace('/[^a-z0-9\-_]/i', '-', $baseSlug);
        $slug = strtolower($slug);
        $slug = trim($slug, '-');

        $i = 1;
        // Loop until a unique slug is found
        while ($category::where('slug', $slug)->exists()) {
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

        $slug = $this->make_slug( new Category() ,  $request->category_name);

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

    // ============================ Sub category methods =========================
    /**
     * Showing Category page
     */
    public function sub_index()
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();

        return view('admin.category.sub_index', compact(['categories', 'subcategories']));
    }

    /**
     * Inserting sub category to DB
     *
     * @param Request $request
     */
    public function sub_store(Request $request)
    {
        if (empty($request->category_id)) {
            return redirect()->back()->withErrors(['category' => 'Please Select a Category']);
        }

        $request->validate([
            'sub_category_name' => 'required|min:3',
        ], [
            'sub_category_name.min' => 'SubCategory Name should be at least 3 charactors',
        ]);

        $slug = $this->make_slug( new SubCategory() , $request->sub_category_name);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'name' => $request->sub_category_name,
            'slug' => $slug,
        ]);


        $notification = array(
            'message' => 'SubCategory added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Showing Sub Category edit page
     *
     * @param integer $id
     */
    public function sub_edit(int $id)
    {
        $categories = Category::latest()->get();
        $subcategory = SubCategory::findOrFail($id);

        return view('admin.category.sub_edit', compact(['categories', 'subcategory']));
    }

    /**
     * Updating Sub Category 
     *
     * @param integer $id
     * @param Request $request
     */
    public function sub_update(int $id, Request $request)
    {
        $subCategory = SubCategory::findOrFail($id);
        if (empty($request->category_id)) {
            return redirect()->back()->withErrors(['category' => 'Please Select a Category']);
        }

        $request->validate([
            'sub_category_name' => 'required|min:3',
        ], [
            'sub_category_name.min' => 'Sub Category Name should be at least 3 charactors',
        ]);

        $subCategory->name = $request->sub_category_name;
        $subCategory->category_id = $request->category_id;

        $subCategory->save();

        $notification = array(
            'message' => 'Sub Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.sub_category')->with($notification);
    }

    /**
     * Deleting Categories
     *
     * @param integer $id
     */
    public function sub_destroy(int $id)
    {
        $subCategory = SubCategory::findOrFail($id);

        $subCategory->delete();

        $notification = array(
            'message' => 'Sub Category Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
