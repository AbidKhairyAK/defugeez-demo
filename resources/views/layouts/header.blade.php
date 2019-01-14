<nav class="navbar navbar-expand-lg navbar-dark bg-info py-3 fixed-top shadow" style="flex-direction: column;">
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
		      <a class="nav-link text-white pr-3" href="{{ route('organizations.page') }}"><i class="fa fa-dashboard"></i> <b>Organisasi</b></a>
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

	<div class="container search-container">
	  <form action="{{ route('search') }}" method="get" class="w-100 mt-3">
	    <div class="input-group">

	      <div class="input-group-prepend">
	        <button type="button" class="btn btn-light border" data-toggle="dropdown">
            <i class="fa fa-filter"></i> <span class="d-none d-md-inline">Berdasarkan:</span> <span class="search-filter font-weight-bold">Bencana</span>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" style="cursor: pointer;">Nama Bencana</a>
            <a class="dropdown-item" style="cursor: pointer;">Nama Posko</a>
            <a class="dropdown-item" style="cursor: pointer;">Nama Pengungsi</a>
            <a class="dropdown-item" style="cursor: pointer;">Nama Relawan</a>
            <a class="dropdown-item" style="cursor: pointer;">Nama Organisasi</a>
          </div>
	      </div>

	      <input type="text" name="keyword" class="form-control search-input">
	      <input type="hidden" name="filter">
	    
	      <div class="input-group-append">
	        <button class="btn btn-light border" type="submit"><i class="fa fa-search"></i> <span class="d-none d-md-inline">Cari</span></button> 
	      </div>

	    </div> 
	  </form>
	</div>

	<div class="container justify-content-end">
		<button class="btn btn-lg btn-info shadow search-trigger" style="position: absolute; bottom: 0; transform: translateY(100%); border-top-right-radius: 0 ;border-top-left-radius: 0"><i class="fa fa-search"></i></button>
	</div>
</nav>