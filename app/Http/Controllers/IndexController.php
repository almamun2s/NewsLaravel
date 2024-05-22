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
        return view('frontend.home');
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
        $newsKey = 'news' . $news->id;
        if (!Session::has($newsKey)) {
            $news->increment('views');
            Session::put($newsKey, 1);
        }
        return view('frontend.news.news_details', compact('news'));
    }
}
