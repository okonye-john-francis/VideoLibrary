@extends('index')

@section('content')


			
			@foreach($returned_value as $movie)
			<div class="recommended-info">
				<h3>Movie Title:&nbsp&nbsp{{$movie->video_title}}</h3>
			</div>
				<div class="col-md-5 resent-grid recommended-grid">
					<div class="resent-grid-img recommended-grid-img">
						<a href="{{action('VideosController@selectedMovieDetails','movie='.$movie->id)}}"><img  src="{{URL::to($movie->video_image)}}" alt=""  style="height: 260px;" /></a>
						<div class="time small-time">
							<p>7:30</p>
						</div>
						<div class="clck small-clck">
							<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
						</div>
					</div>
					<div>
						<table style="font-size: 14px;">
							<tr>
								<td>Actor</td>
								<td>:&nbsp&nbsp{{$movie->video_actor}}</td>
							</tr>
							<tr>
								<td>Category</td>
								<td>:&nbsp&nbsp{{$movie->category}}</td>
							</tr>
							<tr>
								<td>Price</td>
								<td>:&nbsp&nbspUGX&nbsp&nbsp{{$movie->config_value}}</td>
							</tr>
							@if(($movie->video_director))
							<tr>
								<td>Director</td>
								<td>:&nbsp&nbsp{{$movie->video_director}}</td>
							</tr>
							@endif
							@if(($movie->video_description))
							<tr>
								<td valign="top">Description</td>
								<td>:&nbsp&nbsp{{$movie->video_description}}</td>
							</tr>
							@endif
							<tr>
								<td valign="top" style="width: 40%;">
									
                                <div class="signin">
                                 
                                   <a href="/addToCart?vId={{$movie->id}}" class="play-icon popup-with-zoom-anim">Add to Cart</a>
                                 </div>
                                  </div>
                                
								</td>
								<td>
                                   <div class="signin"><a href="/order?vId={{$movie->id}}&cat=1" class="play-icon popup-with-zoom-anim">Order Direct</a></div>
								</td>
							</tr>
						</table>
						
					</div>
				</div>
			@endforeach

		
			
	<div class="recommended">
		
	</div>


@endsection