@extends('index')

@section('content')

             @if(count($errors)>0)
              
                <div class="alert alert-danger" id ="notification" style="width: 90%; margin: auto; font-size: 14px;">
                    <ul>
                        @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
			
			@foreach($returned_value as $movie)

				<div class="col-md-6" style="margin-top: 15px;">
					<a href="{{action('VideosController@selectedMovieDetails','movie='.$movie->id)}}"><img  src="{{URL::to($movie->video_image)}}" alt=""  style="height: 260px; width: 100%;" class="mgn" />
					</a>
			     <h5>Fill the form below to complete your Order</h5>

				<form method="POST" action="/completeOrder">
					@csrf
					<input type="text" class="form-control mgn" placeholder="Enter Your Telephone" name="contact" />
					<input type="text" class="form-control mgn" placeholder="Enter Your Address" name="address" />
					<input type="text" class="form-control mgn" placeholder="Enter Number of Copies" name="quantity" id="quantity" />
					<input type="hidden" name="unitPrice" value="{{$movie->config_value}}" id="unitPrice" />	
					<input type="hidden" name="video_ordered" value="{{$movie->id}}" />
					<input type="hidden" name="status" value="pending" />
					<input type="hidden" name="price" value="" id="price" />		
					<input type="submit"  value="Complete Order" id="order" />
				</form>

				</div>
			@endforeach

		
			
@endsection