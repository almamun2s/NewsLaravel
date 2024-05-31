<?php

namespace App\Http\Controllers;

use App\Models\LiveTV;
use DateTime;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    /**
     * Showing home page of the website
     */
    public function home()
    {
        $topSliders = NewsPost::where('status', 'publish')->where('top_slider', 1)->latest()->limit(5)->get();
        $sectionThree = NewsPost::where('status', 'publish')->where('section_three', 1)->latest()->limit(3)->get();
        $sectionNine = NewsPost::where('status', 'publish')->where('section_nine', 1)->latest()->limit(9)->get();
        $latestNews = NewsPost::where('status', 'publish')->latest()->limit(10)->get();
        $popularNews = NewsPost::where('status', 'publish')->orderBy('views', 'DESC')->limit(10)->get();
        $live = LiveTV::find(1);

        return view('frontend.home', compact(['topSliders', 'sectionThree', 'sectionNine', 'latestNews', 'popularNews', 'live']));
    }

    /**
     * Showing all news in one page
     */
    public function all_news()
    {
        $allNews = NewsPost::where('status', 'publish')->latest()->get();
        $category_name = 'All News';
        $latestNews = NewsPost::where('status', 'publish')->latest()->limit(10)->get();
        $popularNews = NewsPost::where('status', 'publish')->orderBy('views', 'DESC')->limit(10)->get();
        return view('frontend.news.index', compact(['allNews', 'category_name', 'latestNews', 'popularNews']));
    }

    /**
     * Showing category wise news
     *
     * @param integer $id // Category Id 
     * @param string $slug // Category Slug
     */
    public function category_news(int $id, string $slug)
    {
        $category = Category::findOrFail($id);
        $allNews = NewsPost::where('category_id', $category->id)->where('status', 'publish')->latest()->get();
        $category_name = $category->name;
        $latestNews = NewsPost::where('status', 'publish')->latest()->limit(10)->get();
        $popularNews = NewsPost::where('status', 'publish')->orderBy('views', 'DESC')->limit(10)->get();
        return view('frontend.news.index', compact(['allNews', 'category_name', 'latestNews', 'popularNews']));
    }

    /**
     * Showing sub category wise news
     *
     * @param integer $id // SubCategory Id 
     * @param string $slug // SubCategory Slug
     */
    public function sub_category_news(int $id, string $slug)
    {
        $sub_category = SubCategory::findOrFail($id);
        $allNews = NewsPost::where('subcategory_id', $sub_category->id)->where('status', 'publish')->latest()->get();

        $category_name = $sub_category->category->name . ' >> ' . $sub_category->name;
        $latestNews = NewsPost::where('status', 'publish')->latest()->limit(10)->get();
        $popularNews = NewsPost::where('status', 'publish')->orderBy('views', 'DESC')->limit(10)->get();
        return view('frontend.news.index', compact(['allNews', 'category_name', 'latestNews', 'popularNews']));
    }
    /**
     * Showing News Details page
     *
     * @param integer $id
     * @param string $slug
     */
    public function news_details(int $id, string $slug)
    {
        $news = NewsPost::findOrFail($id);
        $relatedNews = NewsPost::where('status', 'publish')->where('category_id', $news->category_id)->where('id', '!=', $news->id)->limit(6)->get();
        $latestNews = NewsPost::where('status', 'publish')->latest()->limit(10)->get();
        $popularNews = NewsPost::where('status', 'publish')->orderBy('views', 'DESC')->limit(10)->get();

        $newsKey = 'news' . $news->id;
        if (!Session::has($newsKey)) {
            $news->increment('views');
            Session::put($newsKey, 1);
        }
        return view('frontend.news.news_details', compact(['news', 'relatedNews', 'latestNews', 'popularNews']));
    }

    /**
     * For changing languages
     * @param Request $request
     */
    public function changlang(Request $request)
    {
        App::setLocale($request->lang);
        Session::put('locale', $request->lang);
        return redirect()->back();
    }


    /**
     * Search by Date
     *
     * @param Request $request
     */
    public function search_by_date(Request $request)
    {
        $date = new DateTime($request->date);
        $formatDate = $date->format('d-m-Y');
        $latestNews = NewsPost::where('status', 'publish')->latest()->limit(10)->get();
        $popularNews = NewsPost::where('status', 'publish')->orderBy('views', 'DESC')->limit(10)->get();

        $allNews = NewsPost::where('date', $formatDate)->latest()->get();

        return view('frontend.news.search_by_date', compact(['allNews', 'formatDate', 'latestNews', 'popularNews']));
    }
}
