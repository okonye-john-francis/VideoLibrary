<?php

namespace App\BusinessLogic;

use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Config;
use App\Genre;


class ConfigurationsLogic
{

    use ValidatesRequests;
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPriceConfiguration($request)
    {

        $this->validate($request, [
          'config_key'    => 'required',
          'config_value'  => 'required',
        ]);

        $config=Config::create([
          'config_key'    => $request->config_key,
          'config_value'  => $request->config_value,
        ]);

        return [
            'config' => $config,
            'success' => true,
            'err_msg' => null
        ];

    }


    public function addGenre($request)
    {

        $this->validate($request, [
          'category'    => 'required'
        ]);

        $config=Genre::create([
          'category'    => $request->category,
        ]);

        return [
            'config' => $config,
            'success' => true,
            'err_msg' => null
        ];

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
}
