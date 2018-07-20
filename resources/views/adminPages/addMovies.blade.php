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

              @if($status)
                <div class="alert alert-success" id ="notification">
                        {{$status}}
                </div>
                <br>
              @endif

                <div class="card-body">
                  <form action="{{url('movies')}}" method="post" enctype="multipart/form-data">
                    @csrf
                      <table style="width: 100%;">

                        <tr>
                            <td class="tdstyle">Movie Tile</td>
                            <td>
                              <div class="form-group"> 
                                <input type="text" name="video_title" class="form-control" placeholder="e.g The expandables">
                              </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="tdstyle">Movie Genre</td>
                            <td>
                              <div class="form-group"> 
                                <select name="video_genre" class="form-control">
                                  <option value="#">Select Movie Category</option>
                                  @foreach($all_movie_categories as $categories)
                                    <option value="{{$categories->id}}">{{$categories->category}}
                                    </option>
                                  @endforeach
                                  
                                </select>
                              </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="tdstyle">Movie Actor</td>
                            <td>
                              <div class="form-group"> 
                                <input type="text" name="video_actor" class="form-control" placeholder="e.g John Rambo">
                              </div>
                            </td>
                        </tr>
                         <tr>
                            <td class="tdstyle">Movie Director</td>
                            <td>
                              <div class="form-group"> 
                                <input type="text" name="video_director" class="form-control" placeholder="e.g Christopher Nolan">
                              </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdstyle">Movie Poster</td>
                            <td>
                              <div class="form-group"> 
                                <input type="file" name="video_image" class="form-control" placeholder="e.g Christopher Nolan">
                              </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdstyle">Movie Description</td>
                            <td>
                              <div class="form-group"> 
                                <textarea rows="6" cols="50" name="video_description" class="form-control">
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
                                      <option value="{{$current_config['id']}}">{{$current_config['config_key']}}
                                      </option>
                                  @endforeach
                        
                                </select>
                              </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" class="btn btn-primary" value="ADD MOVIE" />
                            </td>
                        </tr>
                    </table>
                </form>
              </div>           

            </div>
       </div>

               
@endsection