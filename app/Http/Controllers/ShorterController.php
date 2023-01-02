<?php

namespace App\Http\Controllers;

use App\Models\Shorter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ShorterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('short-links.index')->with('short_links', Shorter::paginate());
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
        $valiadate = $request->validate([
            'long-url' => 'required|url'
        ]);

        $token = Str::random(5);

        $short = Shorter::create([
            'url' => $valiadate['long-url'],
        ]);
        $short->token =  $short->id . '-' . $token;
        $short->save();


        // dd($article);
        Session::flash('status', 'success');
        Session::flash('status-msg', url($short->token));
        Session::flash('success', 'Link shorted successfully');

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shorter  $shorter
     * @return \Illuminate\Http\Response
     */
    public function show($shorter)
    {
        $short_url = Shorter::where('token', $shorter)->first();
        if ($short_url) {

            $short_url->clicks++;
            $short_url->save();

            return redirect($short_url->url);
        } else {
            // Session::flash('status', 'error');
            Session::flash('error', 'Sorry...! This url doesn\'t exist');
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shorter  $shorter
     * @return \Illuminate\Http\Response
     */
    public function edit(Shorter $shorter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shorter  $shorter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shorter $shorter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shorter  $shorter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shorter $shorter)
    {
        //
    }
}
