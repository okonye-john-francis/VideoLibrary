<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessLogic\VideosLogic;
use App\Http\Controllers\OrdersController;
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
     
        // if( user_has_saved_cart() ){
        //   $arr = load_cart_data();
        //   return $OrdersController->update_cart( $arr )
        // }

          $logged_in_user = Auth::User();


       if ($logged_in_user->email == 'admin@admin.com') {

           $orders_cont                = new OrdersController;

           $number_of_pending_orders   = $orders_cont->numberOfPendingOrders();

           return view('adminPages.home', compact('number_of_pending_orders'));


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
