<?php

namespace App\BusinessLogic;

use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Video;
use App\Config;
use App\Genre;
use App\Shopping_cart;
use Illuminate\Support\Facades\Storage;
use DB;
use Auth;


class VideosLogic
{

    use ValidatesRequests;
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchCurrentConfigurations()
    {

        $current_configurations = Config::distinct('config_key')
                                         ->orderBy('id')
                                         ->take(2)
                                         ->get();

        $all_genres             = Genre::all();


        return [
            'current_config' => $current_configurations,
            'genre'          => $all_genres,
            'success'        => true,
            'err_msg'        => null
        ];

    }


    public function addMovie($request){
 
        $this->validate($request,[

           'video_title'       => 'required',
           'video_genre'       => 'required',
           'video_actor'       => 'required',
           'video_image'       => 'required | file',
           'video_description' => 'required',
           'config_category'   => 'required',

        ]);

        $movie_added = Video::create([

           'video_title'       => $request->video_title,
           'video_genre'       => $request->video_genre,
           'video_actor'       => $request->video_actor,
           'video_director'    => $request->video_director,
           'video_image'       => Storage::url($request->video_image->store('public')),
           'video_description' => $request->video_description,
           'config_category'   => $request->config_category,

        ]);

        return [
           'movie'   => $movie_added,
           'success' => true,
           'err_msg' => null
        ];


    }


    public function clientHomePageDisplay(){

          //$all_movies2 = Video::all();
          $all_movies = DB::table('videos')
                          ->join('genres', 'genres.id', '=', 'videos.video_genre')
                          ->select('videos.*','genres.category')
                          ->get();

          $category = $all_movies->groupBy('video_genre')->toArray();


        if (!empty(Auth::user()->id)) {

          $cart  = Shopping_cart::all()
                                 ->where('booked_by','=', Auth::user()->id)
                                 ->count();
        }else{
          $cart  = 0;
        }
        

        return [ 
            'movies'           => $category,  
            'cart'             => $cart           
        ];

    }


    public function displayAllMovies(){


         $all_movies = DB::table('configs')
                          ->join('videos', 'configs.id', '=', 'videos.config_category')
                          ->join('genres', 'genres.id', '=', 'videos.video_genre')
                          ->select('configs.config_value', 'videos.*','genres.category')
                          ->get();

        return [ 
            'all_movies' => $all_movies                    
        ];

    }

    public function findSelectedRecord($selected_record){

         return $selected_record; 

    }

    public function updateSelectedMovie($request,$id){

         $this->validate($request,[

           'video_title'       => 'required',
           'video_genre'       => 'required',
           'video_actor'       => 'required',
           'video_director'    => 'required',
           'video_description' => 'required',
           'config_category'   => 'required',

        ]);

           $selected_movie     =  Video::find($id);

           $selected_movie->video_title       =  $request->video_title;
           $selected_movie->video_genre       =  $request->video_genre;
           $selected_movie->video_actor       =  $request->video_actor;
           $selected_movie->video_director    =  $request->video_director;
           $selected_movie->video_description =  $request->video_description;
           $selected_movie->config_category   =  $request->config_category;

           if ($request->video_image != null) {

              $selected_movie->video_image    =  Storage::url($request->video_image->store('public')                                   );
           }

           $edited_movie = $selected_movie->save();

           return [
              'edited_movie' => $edited_movie,
              'success'      => true,
              'err_msg'      => null
           ];

    }

    public function fetchSelectedMovieDetails($id){

      $movie_details =  DB::table('videos')
                          ->join('configs', 'configs.id', '=', 'videos.config_category')
                          ->join('genres', 'genres.id', '=', 'videos.video_genre')
                          ->select('configs.config_key','configs.config_value', 'videos.*',
                            'genres.category')
                          ->where('videos.id', '=', $id)
                          ->get();

         return $movie_details;

    }
  

   public function deleteMovie($id){

      $selected_movie = Video::find($id);

      $selected_movie->delete();

      return [

        'deleted_movie' => $selected_movie,
        'success'       => true,
        'err_msg'       => null

      ];

   }

   public function retriveSearchResults($search_string){

         $results  =  DB::table('videos')
                          ->where('video_title', 'like', '%' . $search_string . '%')
                          ->orwhere('video_actor', 'like', '%' . $search_string . '%')
                          ->join('configs', 'configs.id', '=', 'videos.config_category')
                          ->join('genres', 'genres.id', '=', 'videos.video_genre')
                          ->select('configs.config_value', 'videos.*','genres.category')
                          ->get(); 

         $total_results_found = $results->count();

        return [

          'results'             => $results,
          'total_results_found' => $total_results_found,
          'success'             => true,
          'err_msg'             => null
 
        ];

   }


   public function deleteSelectedMovie($id){

        $selected_movie_record = Video::find($id);

        $result = $selected_movie_record->delete();

        return [

          'result'    =>  $result,
          'success'   =>  true,
          'err_msg'   =>  null

        ];

   }

    
}
