<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles =  Article::with('category:id,name')->paginate();
        return view('article.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create')
            ->with([
                'categories' => Category::all(),
                'tags' => Tag::all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|numeric',
            'tags' => 'required|array',
            'tags.*' => 'required|numeric',

            'body' => 'required|string',
            'thumbnail' => 'required|file|image|max:5120',
        ]);


        if ($request->file('thumbnail')->isValid()) {
            $thumbnail = time() . '_' . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('public/blog/', $thumbnail);
        } else {
            Session::flash('status', 'error');
            Session::flash('status-msg', 'Something Wrong happend while upload thumbnail');
            return redirect()->route('article.create');
        }



        $article =   Article::create([
            'title' => $validated['title'],
            'category_id' => $validated['category'],
            'body' => $validated['body'],
            'thumbnail' => 'storage/blog/' . $thumbnail,
        ]);

        $article->tags()->attach($validated['tags']);
        // $article->save();


        // dd($article);
        Session::flash('status', 'success');
        Session::flash('status-msg', 'Article Created Successfully');
        return redirect()->route('article.create');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Article  $article
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($article)
    // {
    //     $article = Article::findOrFail($article);
    //     return view('blog-single')->with('article', $article);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($article)
    {
        $article = Article::findOrFail($article);

        return view('article.edit')
            ->with([
                'article' => $article,
                'categories' => Category::all(),
                'tags' => Tag::all(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $article)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|numeric',
            'tags' => 'required|array',
            'tags.*' => 'required|numeric',

            'body' => 'required|string',
            'thumbnail' => 'file|image|max:5120',
        ]);


        $article = Article::findOrFail($article);


        $article->title = $validated['title'];
        $article->category_id = $validated['category'];
        $article->body = $validated['body'];




        if ($request->hasFile('thumbnail')) {
            if ($request->file('thumbnail')->isValid()) {
                $thumbnail = time() . '_' . $request->file('thumbnail')->getClientOriginalName();
                $request->file('thumbnail')->storeAs('public/blog/', $thumbnail);
                $article->thumbnail = 'storage/blog/' . $thumbnail;
            } else {
                Session::flash('status', 'error');
                Session::flash('status-msg', 'Something Wrong happend while upload thumbnail');
                return redirect()->route('article.edit', $article);
            }
        }


        $article->update();

        $article->tags()->sync($validated['tags']);



        // dd($article);
        Session::flash('status', 'success');
        Session::flash('status-msg', 'Article Updated Successfully');
        return redirect()->route('article.index');
    }


    public function editor_upload()
    {
        # code...
        $article = new Article();
        $article->id = 0;
        $article->exists = true;
        $image = $article->addMediaFromRequest('upload')->toMediaCollection('images');

        $url = str_replace($_SERVER['HTTP_HOST'], '', $image->getUrl());
        $url = str_replace(['http', 'https', ':', '//'], '', $url);


        // str_replace(env('APP_URL'), '', image->getUrl());

        return response()->json([
            'url' => asset($url)
        ]);
    }


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($article)
    {
        $article = Article::findOrFail($article);
        $article->delete();


        Session::flash('status', 'success');
        Session::flash('status-msg', 'Article Deleted Successfully');
        return redirect()->route('article.index');
    }



    public function all_trashed()
    {
        $articles =  Article::onlyTrashed()->with('category:id,name')->paginate();
        return view('article.trashed')->with('articles', $articles);
    }

    public function restore($article)
    {
        $article = Article::onlyTrashed()->findOrFail($article);
        $article->restore();


        Session::flash('status', 'success');
        Session::flash('status-msg', 'Article Restored Successfully');
        return redirect()->route('article.index');
    }

    public function force_delete($article)
    {
        $article = Article::onlyTrashed()->findOrFail($article);
        $article->forceDelete();


        Session::flash('status', 'success');
        Session::flash('status-msg', 'Article Deleted Successfully');
        return redirect()->route('article.trashed');
    }
}
