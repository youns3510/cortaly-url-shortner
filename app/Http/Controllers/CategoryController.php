<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index')->with([
            'categories' => Category::withcount('articles')->orderBy('name')->get(),
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
            'name' => 'required|max:100|csunique:categories,name', //csunique case sinstive unique
        ]);


        if ($validator->fails()) {
            return redirect()->route('category.index')->withErrors($validator);
        }
        Category::create($validator->validated());


        Session::flash('status', 'success');
        Session::flash('status-msg', 'Category Created Successfully');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        $category = Category::findOrFail($category);
        return view('article.index')->with([
            'articles' => $category->articles()->paginate(),
            'title' => $category->name . ' Articles'
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $category = Category::findOrFail($category);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100|csunique:categories,name', //csunique case sinstive unique
        ]);


        if ($validator->fails()) {
            return redirect()->route('category.index')->withErrors($validator);
        }

        $category->update($validator->validated());


        Session::flash('status', 'success');
        Session::flash('status-msg', 'Category Updated Successfully');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $category = Category::findOrFail($category);
        $category->delete();


        Session::flash('status', 'success');
        Session::flash('status-msg', 'Category Deleted Successfully');
        return redirect()->route('category.index');
    }
}
