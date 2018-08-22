<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessLogic\VideosLogic;
use App\Http\Controllers\OrdersController;
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

        $status = null;

        return $this->showAddMoviePage($status);

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

        $videoLogic      = new VideosLogic;

        $returned_value  = $videoLogic->addMovie($request);

        $status          = "Movie Successfully Added";

       return $this->showAddMoviePage($status);


    }


    private function showAddMoviePage($status){

        $current_configs            = $this->currentConfig();

        $current_configurations     = $current_configs['current_config'];

        $all_movie_categories       = $current_configs['genre'];

        $orders_cont                = new OrdersController;

        $number_of_pending_orders   = $orders_cont->numberOfPendingOrders();

        return view('adminPages.addMovies', compact('current_configurations',
            'all_movie_categories','number_of_pending_orders', 'status')
             );

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

        $returned_value = Video::find($id);

        $returned_value2 = $this->currentConfig();

        $current_configurations = $returned_value2['current_config'];

        $all_movie_categories   = $returned_value2['genre'];

        $orders_cont                = new OrdersController;

        $number_of_pending_orders   = $orders_cont->numberOfPendingOrders();

        return view('adminPages.editMovies', compact('all_movie_categories',
            'current_configurations', 'returned_value', 'number_of_pending_orders')
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

        $status = "Movie Successfully Updated";

        return $this-> returnAllMovies($status);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $videoLogic = new VideosLogic;

        $video_id  = $request->movie;

        $videoLogic->deleteSelectedMovie($video_id);

        $status = "Movie Successfully Deleted";

        return $this-> returnAllMovies($status);


    }


    public function test(Request $request){
              dd($request->All());
    }

    public function form(){


        $video_logic = new VideosLogic;

        $returned_value = $video_logic->displayAllMovies();

        $all_movies = $returned_value['all_movies'];

        $orders_cont                = new OrdersController;

        $number_of_pending_orders   = $orders_cont->numberOfPendingOrders();

        return view('adminPages.test', compact('all_movies', 'number_of_pending_orders')
               );
    }


  public function form2(){


        $video_logic = new VideosLogic;

        $returned_value = $video_logic->displayAllMovies();

        $all_movies = $returned_value['all_movies'];

        $orders_cont                = new OrdersController;

        $number_of_pending_orders   = $orders_cont->numberOfPendingOrders();

        return view('adminPages.test2', compact('all_movies', 'number_of_pending_orders')
               );
    }



    public function guestHomeDisplay(){


       $video_logic    = new VideosLogic;

       $returned_value = $video_logic->clientHomePageDisplay();

       $current_movies = $returned_value['movies'];

       $current_cart   = $returned_value['cart'];

       //dd($current_movies);

       //$all_genre = $returned_value['all_genre'];

       return view('ClientPages.home',
              compact('current_movies','current_cart'));

    }

    public function AllMovies(){

        $status = null;

        return $this-> returnAllMovies($status);

    }



    private function returnAllMovies($status){

        $video_logic = new VideosLogic;

        $returned_value = $video_logic->displayAllMovies();

        $all_movies = $returned_value['all_movies'];

        $orders_cont                = new OrdersController;

        $number_of_pending_orders   = $orders_cont->numberOfPendingOrders();

        return view('adminPages.AllMovies',
               compact('all_movies', 'number_of_pending_orders','success','status')
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


    public function search(Request $request){

        $video_logic    = new VideosLogic;

        $search_string  =  $request->search_string;

        $returned_search_results = $video_logic->retriveSearchResults($search_string);

        $search_results  = $returned_search_results['results'];

        $returned_value2 = $video_logic->clientHomePageDisplay();

        $current_cart   = $returned_value2['cart'];

        $total_results_found = $returned_search_results['total_results_found'];

        return view('ClientPages.searchResults',
            compact('search_results', 'current_cart','total_results_found','search_string'));


    }


    public function getReports(){



      
    }


}
