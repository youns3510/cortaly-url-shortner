<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Tag::orderBy('name')->get());
        return view('tag.index')->with([
            'tags' => Tag::withcount('articles')
            ->orderBy('name')
            ->get(),
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100|csunique:tags,name', //csunique case sinstive unique
        ]);


        if ($validator->fails()) {
            return redirect()->route('tag.index')->withErrors($validator);
        }
        Tag::create($validator->validated());


        Session::flash('status', 'success');
        Session::flash('status-msg', 'Tag Created Successfully');
        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($tag)
    {
        $tag = Tag::findOrFail($tag);

        return view('article.index')->with([
            'articles' => $tag->articles()->paginate(),
            'title' => $tag->name . ' Articles',


        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tag)
    {
        $tag = Tag::findOrFail($tag);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100|csunique:tags,name', //csunique case sinstive unique
        ]);


        if ($validator->fails()) {
            return redirect()->route('tag.index')->withErrors($validator);
        }

        $tag->update($validator->validated());


        Session::flash('status', 'success');
        Session::flash('status-msg', 'Tag Updated Successfully');
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($tag)
    {
        $tag = Tag::findOrFail($tag);
        $tag->delete();


        Session::flash('status', 'success');
        Session::flash('status-msg', 'Tag Deleted Successfully');
        return redirect()->route('tag.index');
    }
}
