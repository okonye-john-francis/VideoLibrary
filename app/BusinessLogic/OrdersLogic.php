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

   public function saveSelectedProductToCart(/*object*/ $cart_details){

         $logged_in_user = Auth::user()->id;

         $cart = Shopping_cart::create([

              'video_id'  => $cart_details->vId,
              'booked_by' => $logged_in_user

         ]);

         return [
              'cart'    => $cart,
              'success' => true,
              'err_msg' => null
         ];

   }


   public function saveOrder($request){

        $order_type  =   $request->order_cat;

        $this->validateInputs($order_type, $request);

        $order = $this->saveInputs($order_type, $request);

        return [
           'order'   => $order,
           'success' => true,
           'err_msg' => null
        ];


    }

    private function validateInputs($order_type, $request){

       if ($order_type == 'single') {

            $validation_results = $this->validate($request,[

           'contact'       => 'required',
           'address'       => 'required',
           'quantity'      => 'required'

        ]);

        }

        if ($order_type == 'multiple') {

            $validation_results = $this->validate($request,[

           'contact'       => 'required',
           'address'       => 'required'

        ]);

        }

        return $validation_results;

    }

    private function saveInputs($order_type, $request){

        if ($order_type == 'single') {

            $order = Order::create([

           'video_ordered'     => $request->video_ordered,
           'ordered_by'        => Auth::user()->id,
           'contact'           => $request->contact,
           'address'           => $request->address,
           'quantity'          => $request->quantity,
           'price'             => $request->price,
           'status'            => $request->status,

        ]);


        }

        if ($order_type == 'multiple') {

            $cart               = $request->cart;
            $cart_details       = json_decode($cart); //dd($cart_details);
            $videosInCart       = $cart_details->vId;
            $unitPricesInCart       = $cart_details->movie_price;
            $quantitiesInCart   = $cart_details->quantity;
            $recordId           = $cart_details->catId;

            //loop through all movies in cart and save one at a time in the orders table

            for ($i=0; $i < sizeof($videosInCart) ; $i++) {

                 $order = Order::create([

                 'video_ordered'     => $videosInCart[$i],
                 'ordered_by'        => Auth::user()->id,
                 'contact'           => $request->contact,
                 'address'           => $request->address,
                 'quantity'          => $quantitiesInCart[$i],
                 'price'             => ($unitPricesInCart[$i])*($quantitiesInCart[$i]),
                 'status'            => $request->status,

              ]);

            }
        //delete all records that have been ordered from shopping_cart table

         for ($i=0; $i < sizeof($recordId) ; $i++) {

          $recordInCart  = Shopping_cart::find($recordId[$i]);

          $recordInCart->delete();

        }


    }

  }

    public function retrieveCartDetails(){

      $current_user = Auth::user()->id;

      $cart_details = Shopping_cart::where('booked_by', '=', $current_user)
                                    ->join('videos', 'videos.id', '=', 'shopping_carts.video_id')
                                    ->join('genres', 'genres.id', '=', 'videos.video_genre')
                                    ->join('configs', 'configs.id', '=', 'videos.config_category')
                                    ->select('shopping_carts.id as cartId','videos.*', 'genres.category as category','configs.config_value as config_value')
                                    ->get();
      $total_price  = $cart_details->sum('config_value');

      return [

       'cart'         => $cart_details,
       'total_price'  => $total_price

      ];


    }


    public function deleteVideoFromCart($id){

      $this_movie = Shopping_cart::find($id);

      $deleted_movie = $this_movie->delete();

      return [
         'movie'   =>   $deleted_movie,
         'success' =>  true,
         'err_msg' =>  null
      ];

    }

    public function getNewOrders(){

      $new_orders   = Order::where('status', '=', 'pending')
                            ->join('videos', 'videos.id', '=', 'orders.video_ordered')
                            ->join('users', 'users.id', '=', 'orders.ordered_by')
                            ->select('orders.*', 'users.name as name', 'videos.video_title as video_title')
                            ->get();

      $orders_count = $new_orders->count();

      return [

       'new_orders'   => $new_orders,
       'orders_count' => $orders_count

      ];

    }


    public function markOrderAsCleared($id){

      $current_order   =  Order::find($id);

      $current_order->status = 'Approved';

      $approved_order  =  $current_order->save();

      return [
        'approved' => $approved_order,
        'success'  => true,
        'err_msg'  => null
      ];

    }

      public function processAllApprovedOrders(){

            $approved_orders   = Order::where('status', '=', 'Approved')
                                  ->join('videos', 'videos.id', '=', 'orders.video_ordered')
                                  ->join('users', 'users.id', '=', 'orders.ordered_by')
                                  ->select('orders.*', 'users.name as name', 'videos.video_title as video_title')
                                  ->get();

        $approved_orders_count = $approved_orders->count();

        return [

         'approved_orders'   => $approved_orders,
         'approved_orders_count' => $approved_orders_count

        ];

      }


}
