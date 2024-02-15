<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
   <title>Intan-NET | @yield('title')</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<style>
  .active {
	background: white;
	border-radius: 5px;
  }
  .nav-item {
	margin: 3px;
  }
  .nav-item a {
	text-decoration: none;
	padding: 7px 10px;
  }
  .dropdown-item {
	color: #0d6efd;
  }
  .position {
	position: sticky;
	top: 0;
	z-index: 1;
  }
  .card-data {
        border: solid 1px;
        padding: 15px 30px;
        color: #fff;
  }
  .card-data.infrastructure {
        background: #212529;
  }
  .card-data.bts {
        background: #212529;
  }
  .card-data.customers {
        background: #212529;
  }
  .card-data.provider {
        background: #212529;
  }
  .card-data i {
        font-size: 65px;
  }
  .card-desc {
  	font-size: 20px;
        text-decoration: none;
        color: #fff;
  }
  .card-count {
        font-size: 20px;
  }

</style>

<body> 
  <nav class="position navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <div class="col-md-1 offset-md-1">
	<a class="navbar-brand text-primary" href="{{route('dashboard')}}">Intan_NET</a>
      </div>
      @if(Auth::user())
      <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
              aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      	<span class="navbar-toggler-icon"</span>
      </button>
      <div class="navbar-collapse collapse" id="navbarTogglerDemo03">
	<div class="col-md-10 p-1">
	  <ul class="navbar-nav">
	    <li class="nav-item">
	      <a href="{{route('dashboard')}}" @if(request()->route()->uri == 'dashboard') class='active' @endif >Dashboard</a>
	    </li>
	    <li class="nav-item">
	      <a href="{{route('dashboard.customers')}}" @if(request()->route()->uri == 'dashboard/customers' ||
		 request()->route()->uri == 'dashboard/customers/create' ||
		 request()->route()->uri == 'dashboard/customers/details/{customer}' ||
		 request()->route()->uri == 'dashboard/customers/{customer}') class='active' @endif >Customer</a></li>
	    <li class="nav-item">
	      <a href="{{route('dashboard.infrastructures')}}" @if(request()->route()->uri == 
		 'dashboard/infrastructures' ||
		 request()->route()->uri == 'dashboard/infrastructures/create' ||
		 request()->route()->uri == 'dashboard/infrastructures/details/{infrastructure}') class='active' @endif >Infrastructure</a></li>
	    <li class="nav-item">
	      <a href="{{route('dashboard.bts')}}" @if(request()->route()->uri == 'dashboard/bts' ||
		 request()->route()->uri == 'dashboard/bts/create' ||
		 request()->route()->uri == 'dashboard/bts/details/{bts}') class='active' @endif >BTS/Tower</a></li>
	    <li class="nav-item">
	      <a href="{{route('dashboard.services')}}" @if(request()->route()->uri == 'dashboard/services' ||
		 request()->route()->uri == 'dashboard/services/create') class='active' @endif >Service</a>
	    </li>
	    <li class="nav-item">
	      <a href="{{route('dashboard.providers')}}" @if(request()->route()->uri == 'dashboard/providers' ||
		 request()->route()->uri == 'dashboard/providers/create') class='active' @endif >Provider</a></li>
	  </ul>
	</div>
	
	<div class="col-md-1">
          <div class="dropdown">
	    <a class="text-primary btn dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	      {{Auth::user()->username}}
	    </a>
	    <ul class="dropdown-menu bg-dark">
	      <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
	    </ul>
          </div>
        </div>
      </div>
      @endif
    </div>
 </nav>
  
<div>
  @yield('content')
  @yield('js')
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
 integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
 integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

</body>

<footer>
  <div class="navbar navbar-inverse navbar-fixed-bottom">
    <div class="container">
    </div>
  </div>
</footer>

</html>


