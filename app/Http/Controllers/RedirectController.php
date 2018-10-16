<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    /**
     * Redirect short URL to saved long URL
     * If not found redirect to homepage with message
     *
     * @param $short short url
     * @return View
     */
    public function redirect($short){
        if(!Url::where('shortUrl', '=', $short)->first()){
            return redirect('/')->with('error', "URL doesn't exist");
        }
        $url = Url::where('shortUrl', '=', $short)->first();
        $url->clicks = $url->clicks +1;
        $url->save();

        return redirect($url->longUrl);
    }
}
