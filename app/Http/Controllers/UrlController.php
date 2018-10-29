<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Url;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UrlController extends Controller
{
    /** 
     * Make new short URL from long URL
     * If the user is signed in, it will be added to their account
     *
     * @param Request $request
     * @return View
    */
    public function create(Request $request){
        if(Url::where('longUrl', '=', $request->url)->count() > 0){
            //URL alerady exists, redirect back with existing short
            $url = Url::where('longUrl', '=', $request->url)->first();
            return redirect()->back()->with('success', 'Short url: ' . $request->getHttpHost() . '/u/' . $url->shortUrl);
        };

        $short = Url::generate();

        $new = Url::create([
            'user' => (Auth::user()) ? Auth::user()->id : null,
            'longUrl' => $request->url,
            'shortUrl' =>  $short
        ]);

        return redirect()->back()->with('success', 'Short url: ' . $request->getHttpHost() . '/u/' . $new->shortUrl);
    }

    public function edit($id){
        $url = Url::find($id);
        // Url is not found, redirect home
        if(!$url){
            return redirect('/');
        }
        return view('pages.edit')->with(compact('url'));
    }

    public function update(Request $request){
        $url = Url::find($request->id);
        //Url not found, redirect home
        if(!$url){
            return redirect('/');
        }
        $url->longUrl = $request->longUrl;
        if($url->save()){
            return redirect('/urls')->with('success', 'URL Updated');
        }
    }

    /**
     * Remove URL
     *
     * @param Request $request
     * @return View
     */
    public function remove(Request $request){
        $url = Url::find($request->id);
        if(!$url){
            // id not found, redirect home
            return redirect('/');
        }
        if($url->delete()){
            //error deleting url
            return redirect('/urls')->with('success', 'Url deleted');
        } else {
            //url deleted, redirect home
            return redirect('/')->with('error', 'Error deleting Url, please try again');
        }
    }

    /**
     * View all urls made by user
     *
     * @param Request $request
     * @return View
     */
    public function view(Request $request)
    {
        Url::generate();
        $urls = URL::select('id', 'longUrl', DB::raw('CONCAT("'.env("APP_URL").'/u/", shortUrl) as shortUrl'), 'clicks')->where('user', '=', Auth::user()->id)->get()->toArray();
        return view('pages.urls')->with(compact('urls'));
    }


}