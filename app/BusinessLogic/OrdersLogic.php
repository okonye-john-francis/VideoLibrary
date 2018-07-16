<?php

namespace App\BusinessLogic;

use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Video;
use App\Config;
use App\Order;
use App\Genre;
Use App\Shopping_cart;
use Illuminate\Support\Facades\Storage;
use DB;
use Auth;


class OrdersLogic
{

    use ValidatesRequests;
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
   public function saveSelectedProductToCart($request){

         $cart = Shopping_cart::create([

              'video_id'  => $request->vId,
              'booked_by' => $request->activeUser

         ]);

         return [
              'cart'    => $cart,
              'success' => true,
              'err_msg' => null
         ];

   }


   public function saveOrder($request){
 
        $this->validate($request,[

           'contact'       => 'required',
           'address'       => 'required',
           'quantity'      => 'required'

        ]);

        $order = Order::create([

           'video_ordered'     => $request->video_ordered,
           'ordered_by'        => Auth::user()->id,
           'contact'           => $request->contact,
           'address'           => $request->address,
           'quantity'          => $request->quantity,
           'price'             => $request->price,
           'status'            => $request->status,

        ]);

        return [
           'order'   => $order,
           'success' => true,
           'err_msg' => null
        ];


    }

    
}
