<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Request;
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

        return view('frontend.home', compact(['topSliders', 'sectionThree', 'sectionNine', 'latestNews', 'popularNews']));
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
}
