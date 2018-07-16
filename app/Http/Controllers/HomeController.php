<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessLogic\VideosLogic;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       if (Auth::User()->email == 'admin@admin.com') {
           return view('adminPages.home');
       }
       else {
     
           $video_logic    = new VideosLogic;

           $returned_value = $video_logic->clientHomePageDisplay();

           $current_movies = $returned_value['movies'];

           $current_cart   = $returned_value['cart'];

           return view('ClientPages.home', compact('current_movies','current_cart'));
       }
        
    }
}
