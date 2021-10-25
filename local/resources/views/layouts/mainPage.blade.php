<!DOCTYPE html>
<html lang="en">
  <head>


   	<script src="<?=asset('/local/resources/views/layouts/jquery.min.js' )?>/"></script>	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('siteresources/css/navbar.css') }}">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
	        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
	        crossorigin="anonymous"></script>

	<link rel="stylesheet" href="<?=asset( '/local/resources/views/layouts/css/style.css' )?>/">
	<script src="<?=asset('/local/resources/views/layouts/js/myScript.js' )?>/"></script>	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="<?=asset( '/siteresources/images/ui/favicon.png' );?>" type="image/x-icon">

  </head>
  <body class="body justify-content-center" >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a style="font-size:20px;color:white" class="nav-link" href="https://whendeals.com/">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a style="font-size:20px;color:white" class="nav-link" href="#">Github</a>
      </li>
   
    </ul>
    <span style="font-size:20px;color:white" class="navbar-text">
      rasoulmosavat@gmail.com
    </span>
  </div>
</nav>
<div class="container justify-content-center">
    @yield('body')
 </div>
   
    
  </body>
</html>