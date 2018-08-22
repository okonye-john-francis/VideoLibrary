@extends('index')

@section('content')


	<div class="col-md-12 resent-grid recommended-grid" style="font-size: 14px;">
 
       <table class="table">
		  <thead class="thead-light">
		    <tr>
		      <th scope="col">Movie Title</th>
		      <th scope="col">Video Category</th>
		      <th scope="col">Video Actor</th>
		      <th scope="col">Video Poster</th>
		      <th scope="col">Price</th>
		      <th scope="col">Quantity</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<form method="POST" action="/orderAll?cat=cart">
		  		@csrf
		     @foreach($cart as $cartdetails)
           
		    <tr>
		      <td>
		      {{$cartdetails['video_title']}}
		      <input type="hidden" name="vId[]" value="{{$cartdetails['id']}}"/>
		      <input type="hidden" name="catId[]" value="{{$cartdetails['cartId']}}"/>
		      </td>
		      <td>{{$cartdetails['category']}}</td>
		      <td>
		      {{$cartdetails['video_actor']}}</td>
		      <td><img src="{{URL::to($cartdetails['video_image'])}}" style="height: 35px; width: 40px;" />
		      </td>
		      <td id="price">
		      	<div class="before_qty_change">
		      	{{$cartdetails['config_value']}}
		      	<input type="hidden" class="unitPrice" value="{{$cartdetails['config_value']}}" />
		        </div>
		      	<div class="after_qty_change" ></div>
		      	<input type="hidden" name="movie_price[]" value="{{$cartdetails['config_value']}}" />
		      
		      </td>
		      <td>

		      	<input type="text" name="quantity[]" value="1" class="qtty" style="width: 60px;" />
		      </td>
		      <td>
                <a onclick="return confirm('Are you sure you want to delete this Movie from Cart?')"  href="/deleteCart?vId={{$cartdetails['cartId']}}">
                     <button type="button" class="btn btn-outline-danger">Delete</button>
                </a>
		      </td>
		  
		    </tr>
    
		@endforeach
		    <tr>
		      <th scope="col"></th>
		      <th scope="col"></th>
		      <th scope="col"></th>
		      <th scope="col"></th>
		      <th scope="col">Grand Total:&nbspUGX&nbsp{{sprintf("%.2f", $total_price)}}</th>
		      <th scope="col">
		      	<a>
                     <input type="submit" class="btn btn-outline-danger" value="Order All" />
                </a>
		      </th>
		    </tr>
             </form>
		  </tbody>
      </table>
     
		
	</div>
							
@endsection