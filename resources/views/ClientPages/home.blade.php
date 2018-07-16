@extends('index')

@section('content')


	<div class="top-grids">
			<div class="recommended-info">
				<h3>Action Movies</h3>
			</div>
			@foreach($current_movies as $movies)
				<div class="col-md-2 resent-grid recommended-grid">
					<div class="resent-grid-img recommended-grid-img">
						<a href="{{action('VideosController@selectedMovieDetails','movie='.$movies['id'])}}">
							<img class="img_size popup-with-zoom-anim" src="{{URL::to($movies['video_image'])}}" alt="" /></a>
						<div class="time small-time">
							<p>7:30</p>
						</div>
						<div class="clck small-clck">
							<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
						</div>
					</div>
					<div class="resent-grid-info recommended-grid-info video-info-grid">
						<h5><a href="/movieDetails" class="title">{{$movies['video_title']}}</a></h5>
						
					</div>
				</div>
			@endforeach

		<div class="clearfix"> </div>
	</div>
		
			
	<div class="recommended">
		
	</div>


@endsection