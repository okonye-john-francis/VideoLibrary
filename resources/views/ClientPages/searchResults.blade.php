@extends('index')

@section('content')

        
			<div class="top-grids">
			<div class="recommended-info">
				@if($total_results_found == 0)

				<h3>No&nbsp&nbspResults found for &nbsp{{$search_string}} </h3>

				@else

				<h3>{{$total_results_found}}&nbsp&nbspResults found for &nbsp{{$search_string}} </h3>

				@endif

			</div>

              @foreach($search_results as $results) 

				<div class="col-md-2 resent-grid recommended-grid">
					<div class="resent-grid-img recommended-grid-img">
						<a href="{{action('VideosController@selectedMovieDetails','movie='.$results->id)}}">
							<img class="img_size popup-with-zoom-anim" src="{{URL::to($results->video_image)}}" alt="" /></a>
						<div class="time small-time">
							<p>7:30</p>
						</div>
						<div class="clck small-clck">
							<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
						</div>
					</div>
					<div class="resent-grid-info recommended-grid-info video-info-grid">
						<h5><a href="/movieDetails" class="title">{{$results->video_title}}</a></h5>
						
					</div>
				</div>
				
               @endforeach
				<div class="clearfix"> </div>
	        </div>
		

					
@endsection