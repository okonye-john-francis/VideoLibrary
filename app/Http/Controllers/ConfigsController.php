<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessLogic\ConfigurationsLogic;
use App\Http\Controllers\OrdersController;


class ConfigsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders_cont                = new OrdersController;

        $number_of_pending_orders   = $orders_cont->numberOfPendingOrders();

        return view('adminPages.configurationSettings', 
            compact('number_of_pending_orders')
        );

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *v
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $config                     = new ConfigurationsLogic;
        
        $returned_value             = $config->addPriceConfiguration($request);

        $orders_cont                = new OrdersController;

        $number_of_pending_orders   = $orders_cont->numberOfPendingOrders();

        return redirect()->route('priceConfig',$number_of_pending_orders)
               ->with('success', 'Price Configuration saved Successfully');

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

    public function addGenre(Request $request){
 
        $config                     = new ConfigurationsLogic;
        
        $returned_value             = $config->addGenre($request);

        $orders_cont                = new OrdersController;

        $number_of_pending_orders   = $orders_cont->numberOfPendingOrders();
         
        return redirect()->route('genreConfig', $number_of_pending_orders)
               ->with('success', 'Genre Successfully Added');

    }

    public function priceConfig(){

           $orders_cont                = new OrdersController;

           $number_of_pending_orders   = $orders_cont->numberOfPendingOrders();

           return view('adminPages.priceConfigurations', compact('number_of_pending_orders'));

    }


     public function genreConfig(){

           $orders_cont                = new OrdersController;

           $number_of_pending_orders   = $orders_cont->numberOfPendingOrders();

           return view('adminPages.genreConfigurations', compact('number_of_pending_orders'));

    }



}
