<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use App\Models\Shorter;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{

    public function __construct()
    {
        Paginator::useBootstrap();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $short_urls = Shorter::all();
        return view('welcome')->with([
            'total_urls' => number_format($short_urls->count('url')),
            'total_clicks' => number_format($short_urls->sum('clicks'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }
    // Blog



    public function showBlog()
    {
        $articles = Article::paginate();
        return view('blog')->with('articles', $articles);
    }




    public function showArticle($article)
    {
        $article = Article::findOrFail($article);
        return view('blog-single')->with('article', $article);
    }


    public function showTag($tag)
    {
        $tag = Tag::findOrFail($tag);

        return view('blog')->with([
            'articles' => $tag->articles()->paginate(),
            'title' => $tag->name . ' Articles',


        ]);
    }

    public function showCategory($category)
    {
        $category = Category::findOrFail($category);

        return view('blog')->with([
            'articles' => $category->articles()->paginate(),
            'title' => $category->name . ' Articles',


        ]);
    }

    public function search(Request $request)
    {
        return 'search ' . $request->input('query');
    }
}
