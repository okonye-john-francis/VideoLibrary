@extends('index')

@section('content')

            @if(isset($success_message))
             
             <script type="text/javascript">
             	alert("{{$success_message}}");
             </script>

            @endif
        

			@foreach($current_movies as $movies)
			<div class="top-grids">
			<div class="recommended-info">
			
				<h3 style="margin-top: 15px;">{{(end($movies))->category. ' Movies'}}</h3>
				
			</div>
                 @foreach($movies as $category)
				<div class="col-md-2 resent-grid recommended-grid">
					<div class="resent-grid-img recommended-grid-img">
						<a href="{{action('VideosController@selectedMovieDetails','movie='.$category->id)}}">
							<img class="img_size popup-with-zoom-anim" src="{{URL::to($category->video_image)}}" alt="" /></a>
						<div class="time small-time">
							<p></p>
						</div>
						<div class="clck small-clck">
							<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
						</div>
					</div>
					<div class="resent-grid-info recommended-grid-info video-info-grid">
						<h5><a href="{{action('VideosController@selectedMovieDetails','movie='.$category->id)}}" class="title">{{$category->video_title}}</a></h5>
						
					</div>
				</div>
				@endforeach
				<div class="clearfix"> </div>
	        </div>
			@endforeach

		
			
@endsection