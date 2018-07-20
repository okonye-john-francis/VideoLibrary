
<!DOCTYPE HTML>
<html>
<head>
<title>My Play a Entertainment Category Flat Bootstrap Responsive Website Template | Shows :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="My Play Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript">
 addEventListener("load", function() { 
 setTimeout(hideURLbar, 0); }, false); 
function hideURLbar(){ 
window.scrollTo(0,1); 
} 
 </script>
<!-- bootstrap -->
<link href="{{URL::asset('style/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' media="all" />
<!-- //bootstrap -->
<link href="{{URL::asset('style/css/dashboard.css')}}" rel="stylesheet">
<!-- Custom Theme files -->
<link href="{{URL::asset('style/css/style.css')}}" rel='stylesheet' type='text/css' media="all" />
<script src="{{URL::asset('style/js/jquery-1.11.1.min.js')}}"></script>
<!--start-smoth-scrolling-->

<style type="text/css">
	#inner {
	  width: 90%;
	  margin: 0 auto;
    }
    .img_size{
    	height: 150px;
    }

    .left {
		box-shadow: 3px 0 5px -5px #333;
	}
	.mgn{
		margin-bottom: 10px;
	}
	.center{
        width: 150px;
        margin: 40px auto;
      
    }
box left
</style>

</head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><h1><img src="images/logo.png" alt="" /></h1></a>

        </div>
       
        <div id="navbar" class="navbar-collapse collapse">
		
			<div class="top-search">
				<form class="navbar-form navbar-right" method="POST" action="/search">
					@csrf
					<input type="text" class="form-control" placeholder="Search using movie title or actor" name="search_string" />
					<input type="submit" value=" ">
				</form>
			</div>  
			<div class="header-top-right">


				<div class="file">
					<a href="/cart">					
					<img src="{{URL::asset('images/ct.jpg')}}" style="height: 25px;" />&nbsp&nbsp
                    @guest
                    (0)
                    @else
					({{$current_cart}})
					@endguest
					</a>		
				</div>
				
				<div class="signin">
					@guest
                        
                                <a class="play-icon popup-with-zoom-anim" href="{{ route('login') }}">{{ __('Login') }}</a>
                       
                            
                                <a class="play-icon popup-with-zoom-anim" href="{{ route('register') }}">{{ __('Register') }}</a>

                    @else


		                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="background: #FFFF; color: black;">
		                    {{ 'Your logged in as '. Auth::user()->name }}&nbsp<i class="fa fa-user fa-fw"></i>
		                </a>

		                <div class="dropdown-menu dropdown-menu-right dropdown-user">
		                    <a class="dropdown-item" href="{{ route('logout') }}"
		                        onclick="event.preventDefault();
		                        document.getElementById('logout-form').submit();"
		                         style="background: #FFFF; color: black;">
		                        {{ __('Logout') }}
		                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                        @csrf
		                        </form>
		                    </a>
		                </div>
          
                            
					@endguest	
				</div>
				
				<div class="clearfix"> </div>
			</div>
        </div>
		<div class="clearfix"> </div>
      </div>
    </nav>


             <div class="col-sm-3 col-md-2 sidebar left">
			
				<div class="drop-navigation drop-navigation">
				  <ul class="nav nav-sidebar">
					<li class="active"><a href="/" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
					<li><a href="#" class="user-icon"><span class="glyphicon glyphicon-film" aria-hidden="true"></span>Latest Videos</a></li>
					
					<div class="side-bottom">
						
						<div class="copyright">
							
						</div>
					</div>
				</div>
        </div>

            @if($message = Session::get('success'))
            
            <script type="text/javascript">alert("{{$message}}")</script>

            @endif



           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">

			    @yield('content')

			</div>		

		<div class="clearfix"> </div>
	<div class="drop-menu">
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu4">
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Regular link</a></li>
		  <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">Disabled link</a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another link</a></li>
		</ul>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{URL::asset('style/js/bootstrap.min.js')}}"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->


    <script>

		$(document).ready(function() {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
    </script>

    @guest

    @else

    <script type="text/javascript">
    	$('#cart').on('click', function(){
    		var video = document.getElementById('video').value;
             $.ajax({ 
                type: "POST",
                url: "http:/localhost:8000/addToCart?activeUser={{Auth::user()->id}}&vId="+video, 
                success: function(response){ 
                        alert("added"); 
                } 
            });
    	});

    	
    </script>

    <script type="text/javascript">

    	$('#order').on('mouseenter', function(){
    		
    		var unitPrice = document.getElementById('unitPrice').value;
    		var quantity = document.getElementById('quantity').value;

    		document.getElementById('price').value = (quantity*unitPrice);
            
    	});

    	
    </script>

    <script type="text/javascript">

    	$('#qty').on('mouseout', function(){
    		
    		var unitPrice = document.getElementById('unit_price').value;
    		var quantity = document.getElementById('qty').value;

    		document.getElementById('before_qty_change').style.display = "none";

    		document.getElementById('after_qty_change').innerHTML = (quantity*unitPrice);
            
    	});
    	
    </script>

    @endguest	


  </body>
</html>