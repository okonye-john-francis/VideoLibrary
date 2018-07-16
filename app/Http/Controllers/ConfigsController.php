<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessLogic\ConfigurationsLogic;


class ConfigsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminPages.configurationSettings');
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
        
        $config = new ConfigurationsLogic;
        
        $returned_value = $config->addPriceConfiguration($request);

        return redirect()->route('priceConfig')
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
 
        $config = new ConfigurationsLogic;
        
        $returned_value = $config->addGenre($request);
         
        return redirect()->route('genreConfig')
               ->with('success', 'Genre Successfully Added');

    }



}
