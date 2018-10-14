<?php

namespace App\Http\Controllers;

use Auth;
use App\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    /** 
     * Make new short URL from long URL
     * If the user is signed in, it will be added to their account
    */
    public function create(Request $request){
        if(Url::where('longUrl', '=', $request->url)->count() > 0){
            // longUrl alerady exists, redirect back
            return redirect()->back()->with('error', 'URL already exists');
        }p

        
        
    }
}