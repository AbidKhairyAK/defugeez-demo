<nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3 fixed-top shadow">
	<div class="container">

	<a class="navbar-brand" style="font-size: 30px;" href="{{ url('/') }}"><i>{{ env('APP_PREFIX') }}</i><b>{{ env('APP_NAME') }}</b></a>

	  <!-- Toggler/collapsibe Button -->
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-links">
	    <span class="fa fa-bars"></span>
	  </button>

	  <div class="collapse navbar-collapse justify-content-end pt-3" id="nav-links">
		  <ul class="navbar-nav">
		    <li class="nav-item">
		      <a class="nav-link text-white pr-3" href="{{ url('/') }}"><i class="fa fa-home"></i> <b>Beranda</b></a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link text-white pr-3" href="#"><i class="fa fa-dashboard"></i> <b>Dashboard</b></a>
		    </li>
		    @if(!auth()->user())
		    <li class="nav-item">
		      <a class="nav-link text-white pr-3" href="{{ route('login') }}"><i class="fa fa-sign-in"></i> <b>Login</b></a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link bg-light rounded text-primary" href="{{ route('login') }}"><i class="fa fa-user-plus"></i> <b>Register</b></a>
		    </li>
		    @else
		    <li class="nav-item">
		    	<form class="d-inline-block" action="{{ route('logout') }}" method="post">
		    		@csrf
		      	<button class="nav-link text-white btn btn-primary pr-3"><i class="fa fa-sign-in"></i> <b>Logout</b></button>
		    	</form>
		    </li>
		    @endif
		  </ul>
	  </div>

	</div>
</nav>
