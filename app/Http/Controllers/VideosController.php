<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessLogic\VideosLogic;
use App\Video;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {


        $current_configs        = $this->currentConfig();

        $current_configurations = $current_configs['current_config'];

        $all_movie_categories   = $current_configs['genre'];

        return view('adminPages.addMovies',
               compact('current_configurations','all_movie_categories')
             );

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
        
        $videoLogic             = new VideosLogic;

        $returned_value         = $videoLogic->addMovie($request);

        $current_configs        = $this->currentConfig();

        $current_configurations = $current_configs['current_config'];

        $all_movie_categories   = $current_configs['genre'];

        return view('adminPages.addMovies',
                compact('current_configurations','all_movie_categories'))
               ->with('success', 'Movie Successfully Added');



    }

    public function currentConfig(){

        $videoLogic = new VideosLogic;

        $returned_value = $videoLogic->fetchCurrentConfigurations();

        return $returned_value;

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
        $videoLogic = new VideosLogic;

        $returned_value = $videoLogic->findSelectedRecord(Video::find($id));

        $returned_value2 = $this->currentConfig();

        $current_configurations = $returned_value2['current_config'];

        $all_movie_categories   = $returned_value2['genre'];

        return view('adminPages.editMovies', 
               compact('all_movie_categories', 'current_configurations','returned_value')
            );
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
        $videoLogic = new VideosLogic;

        $videoLogic->updateSelectedMovie($request,$id);

        return $this->AllMovies();

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


    public function guestHomeDisplay(){

     
       $video_logic = new VideosLogic;

       $returned_value = $video_logic->clientHomePageDisplay();

       $current_movies = $returned_value['movies'];

       $current_cart   = $returned_value['cart'];

       //$all_genre = $returned_value['all_genre'];

       return view('ClientPages.home', 
              compact('current_movies','current_cart'));

    }

    public function AllMovies(){

        $video_logic = new VideosLogic;

        $returned_value = $video_logic->displayAllMovies();

        $all_movies = $returned_value['all_movies'];

        return view('adminPages.AllMovies',
               compact('all_movies')
               );

    }

    public function selectedMovieDetails(Request $request){

       $video_logic = new VideosLogic;

       $returned_value = $video_logic->fetchSelectedMovieDetails($request->movie);

       $returned_value2 = $video_logic->clientHomePageDisplay();

       $current_cart   = $returned_value2['cart'];

       return view('ClientPages.selectedMovieDetails',
              compact('returned_value', 'current_cart')
              );

    }

}
