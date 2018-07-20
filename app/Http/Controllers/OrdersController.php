<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessLogic\OrdersLogic;
use App\BusinessLogic\VideosLogic;
use App\Shopping_cart;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addToCart(Request $request){
        
        return $this->update_cart( $request);

    }


    public function update_cart($cart_data )
    {

        $ordersLogic = new OrdersLogic;

        $video_logic = new VideosLogic;

        $returned_value = $ordersLogic->saveSelectedProductToCart($cart_data);

        $returned_value2 = $video_logic->clientHomePageDisplay();

        $current_movies = $returned_value2['movies'];

        $current_cart   = $returned_value2['cart'];

        $success_message  = 'Movie Successfully Added to Cart';

        return view('ClientPages.home', compact('current_movies','current_cart','success_message'));

    }


    public function processOrder(Request $request){

        $video_logic = new VideosLogic;

         $order_category = $request->cat;

        if ($order_category == 'cart') {
            
            $cart = [

                'vId'         => $request->vId,
                'movie_price' => $request->movie_price,
                'quantity'    => $request->quantity,
                'catId'       => $request->catId

            ];  

            $cart_details = json_encode($cart);

        }

        $returned_value = $video_logic->fetchSelectedMovieDetails($request->vId);

        $returned_value2 = $video_logic->clientHomePageDisplay();

        $current_cart   = $returned_value2['cart'];

        return view('ClientPages.placeOrder', compact('returned_value','current_cart','order_category','cart_details')); 


    }


    public function completeOrder(Request $request){
        // dd($request->All());

        $ordersLogic = new OrdersLogic;

        $video_logic = new VideosLogic;

        $returned_value2 = $video_logic->clientHomePageDisplay();

        $current_cart   = $returned_value2['cart'];

        $placedOrder =  $ordersLogic->saveOrder($request);

        return redirect()->route('client',$current_cart)
                         ->with('success', 'Order Placed Successfully');

    }


    public function ShoppingCartDetails(){

        $ordersLogic      = new OrdersLogic;

        $video_logic      = new VideosLogic;

        $returned_value   = $ordersLogic->retrieveCartDetails();
 
        $cart             = $returned_value['cart'];

        $returned_value2  = $video_logic->clientHomePageDisplay();

        $current_cart     = $returned_value2['cart'];

        $total_price      = $returned_value['total_price'];

        return view('ClientPages.cart', compact('cart','current_cart','total_price'));

    }


    public function deleteFromCart(Request $request){

        $orders_logic     = new OrdersLogic;

        $video_logic      = new VideosLogic;

        $returned_value   = $orders_logic->deleteVideoFromCart($request->vId);

        $returned_value2  = $orders_logic->retrieveCartDetails();

        $returned_value3  = $video_logic->clientHomePageDisplay();

        $cart_details     = $orders_logic->retrieveCartDetails();

        $total_price      = $cart_details['total_price'];

        $current_cart     = $returned_value3['cart'];
 
        $cart             = $returned_value2['cart'];

        return view('ClientPages.cart', compact('cart','current_cart','total_price'));
       

    }


    public function newOrders(){

        $orders_logic               = new OrdersLogic;

        $returned_value             = $orders_logic->getNewOrders();

        $pending_orders             = $returned_value['new_orders'];

        $number_of_pending_orders   = $returned_value['orders_count'];

        return view('adminPages.orders', 
            compact('pending_orders','number_of_pending_orders')
           );


    }


    public function numberOfPendingOrders(){

        $orders_logic               = new OrdersLogic;

        $returned_value             = $orders_logic->getNewOrders();

        $number_of_pending_orders   = $returned_value['orders_count'];

        return $number_of_pending_orders;
    }

    
    public function oderApproval(Request $request){

        $orders_logic   = new OrdersLogic;
 
        $order_id       = $request->orderId;

        $returned_value = $orders_logic->markOrderAsCleared($order_id);

        return $this->newOrders();


    }

    public function processAllItemsInCart(Request $request){

        dd($request->All());

        return view('adminPages.jQ', compact('number_of_pending_orders'));

    }

}
