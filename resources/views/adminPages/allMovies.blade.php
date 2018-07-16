@extends('layouts.adminIndex')

@section('content')
 

  <div class="col-xl-12">
     <div class="card">
        <br><br>
        
          <table width="100%" class="table table-striped table-bordered able-hover" id="dataTables-example">
              <thead>
                  <tr>
                        <th>Video Title</th>
                        <th>Video Actor</th>
                        <th>Video Genre</th>
                        <th>Video Price</th>
                        <th>Action</th>
                  </tr>
              </thead>
                  <tbody>
                      @foreach($all_movies as $row)
                    <tr>

                        <td>{{$row->video_title}}</td>
                        <td>{{$row->video_actor}}</td>
                        <td>{{$row->category}}</td>
                        <td>{{$row->config_value}}</td>
                        <td>
                          <a href="{{action('VideosController@edit',$row->id)}}">
                            <button type="button" class="btn btn-outline-success">
                              Edit
                            </button>
                          </a>
                          <button type="button" class="btn btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                      @endforeach
                            
                  </tbody>
          </table>      

    </div>
  </div>

               
@endsection