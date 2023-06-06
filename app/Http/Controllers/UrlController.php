<?php

namespace App\Http\Controllers;

use App\Models\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    /**
     * Display a listing of the URL resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urls = Auth::user()->urls;

        return view('urls.index', compact('urls'));
    }

    /**
     * Show the form for creating a new URL resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('urls.create');
    }

    /**
     * Store a newly created URL resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'short_url' => 'required|unique:urls',
            'target_url' => 'required|url',
        ]);

        $url = new URL($validatedData);
        Auth::user()->urls()->save($url);

        return redirect()->route('urls.index');
    }

    /**
     * Show the form for editing the specified URL resource.
     *
     * @param  URL  $url
     * @return \Illuminate\Http\Response
     */
    public function edit(URL $url)
    {
        return view('urls.edit', compact('url'));
    }

    /**
     * Update the specified URL resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  URL  $url
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, URL $url)
    {
        $validatedData = $request->validate([
            'short_url' => 'required|unique:urls,short_url,' . $url->id,
            'target_url' => 'required|url',
        ]);

        $url->update($validatedData);

        return redirect()->route('urls.index');
    }

    /**
     * Redirect to the target URL of the specified short URL.
     *
     * @param  string $short_url
     * @return \Illuminate\Http\Response
     */
    public function redirectURL($short_url) {
        $url = URL::where('short_url', $short_url)->first();
    
        if(!$url) {
            return redirect('/');
        }
        
        return redirect($url->target_url);
    }

    /**
     * Remove the specified URL resource from storage.
     *
     * @param  URL  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(URL $url)
    {
        $url->delete();

        return redirect()->route('urls.index');
    }
}
