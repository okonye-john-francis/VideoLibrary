@extends('layouts.adminIndex')

@section('content')
 

  <div class="col-xl-12">
     <div class="card">
        <br>

              @if(count($errors)>0)
              
                <div class="alert alert-danger" id ="notification">
                    <ul>
                        @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
              @endif

              @if($message = Session::get('success'))
                <div class="alert alert-success" id ="notification">
                        {{$message}}
                </div>
              @endif

                <div class="card-body">
                  <form action="{{action('VideosController@update', $returned_value->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                      <input type="hidden" name="_method" value="PATCH">
                      <table style="width: 100%;">

                        <tr>
                            <td class="tdstyle">Movie Tile</td>
                            <td>
                              <div class="form-group"> 
                                <input type="text" name="video_title" class="form-control" value="{{$returned_value->video_title}}">
                              </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="tdstyle">Movie Genre</td>
                            <td>
                              <div class="form-group"> 
                                <select name="video_genre" class="form-control">
                                  <option value="#">Select Movie Category</option>
                                  <option value="Action">Action</option>
                                  <option value="Adventure">Adventure</option>
                                  <option value="Animation">Animation</option>
                                  <option value="Horror">Horror</option>
                                  <option value="Romance">Romance</option>
                                  <option value="Thriller">Thriller</option>
                                  <option value="Sport">Sport</option>
                                  <option value="Fantasy">Fantasy</option>
                                  <option value="History">History</option>
                                </select>
                              </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="tdstyle">Movie Actor</td>
                            <td>
                              <div class="form-group"> 
                                <input type="text" name="video_actor" class="form-control" value="{{$returned_value->video_actor}}">
                              </div>
                            </td>
                        </tr>
                         <tr>
                            <td class="tdstyle">Movie Director</td>
                            <td>
                              <div class="form-group"> 
                                <input type="text" name="video_director" class="form-control" value="{{$returned_value->video_director}}">
                              </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdstyle">Movie Poster</td>
                            <td>
                              <div class="form-group"> 
                                <input type="file" name="video_image" class="form-control">
                              </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdstyle">Movie Description</td>
                            <td>
                              <div class="form-group"> 
                                <textarea rows="6" cols="50" name="video_description" class="form-control" value="{{$returned_value->video_description}}">
                                </textarea>
                              </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdstyle">Movie Pricing</td>
                            <td>
                              <div class="form-group"> 
                                <select name="config_category" class="form-control">
                                  <option value="#">Select Pricing category</option>
                                  @foreach($current_configurations as $current_config)
                                      <option value="{{$current_config->id}}">{{$current_config->config_key}}
                                      </option>
                                  @endforeach
                        
                                </select>
                              </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" class="btn btn-primary" value="EDIT MOVIE" />
                            </td>
                        </tr>
                    </table>
                </form>
              </div>           

            </div>
       </div>

               
@endsection