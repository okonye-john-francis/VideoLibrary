<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessLogic\OrdersLogic;
use App\BusinessLogic\VideosLogic;

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

        $ordersLogic = new OrdersLogic;

        $video_logic = new VideosLogic;

        $returned_value = $ordersLogic->saveSelectedProductToCart($request);

        $returned_value = $video_logic->clientHomePageDisplay();

        $current_movies = $returned_value['movies'];

        $current_cart   = $returned_value['cart'];

        return view('ClientPages.home', compact('current_movies','current_cart'));

    }


    public function processOrder(Request $request){

        $video_logic = new VideosLogic;

        $returned_value = $video_logic->fetchSelectedMovieDetails($request->vId);

        $returned_value2 = $video_logic->clientHomePageDisplay();

        $current_cart   = $returned_value2['cart'];

        return view('ClientPages.placeOrder', compact('returned_value','current_cart')); 


    }


    public function completeOrder(Request $request){

        $ordersLogic = new OrdersLogic;

        $placedOrder =  $ordersLogic->saveOrder($request);

    }





}
