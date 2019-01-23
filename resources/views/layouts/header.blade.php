<nav class="navbar navbar-expand-lg navbar-dark bg-info py-3 fixed-top shadow" style="flex-direction: column;">
	<div class="container">

		<a class="navbar-brand" href="{{ url('/') }}"><i>{{ env('APP_PREFIX') }}</i><b>{{ env('APP_NAME') }}</b></a>

		  <ul class="navbar-nav justify-content-end pt-3" id="nav-links">
		    <li class="nav-item">
		      <a class="nav-link text-white pr-3" href="{{ url('/') }}"><i class="fa fa-home"></i> <span class="d-none d-md-inline-block"><b>Beranda</b></span></a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link text-white pr-3" href="{{ route('organizations.page') }}"><i class="fa fa-user"></i> <span class="d-none d-md-inline-block"><b>Organisasi</b></span></a>
		    </li>
		    @if(!auth()->user())
		    <li class="nav-item">
		      <a class="nav-link text-white" href="{{ route('login') }}"><i class="fa fa-sign-in"></i> <b>Login<span class="d-none d-md-inline-block"> / Register</span></b></a>
		    </li>
		    @else
		    <li class="nav-item">
		    	<div class="dropdown">

		    		<button class="btn btn-sm btn-outline-info" data-toggle="dropdown">
		    			<img src="{{ Avatar::create(session('username'))->toBase64() }}" style="width: 40px; margin-top: -8px;">
		    		</button>

		    		<div class="dropdown-menu dropdown-menu-right shadow">
		    			<div class="dropdown-item text-center">
		    				<img src="{{ Avatar::create(session('username'))->toBase64() }}">
		    				<p class="mt-3 mb-1"><b>{{ session('username') }}</b></p>
		    				<p class="mt-0">{{ session('organization') }}</p>
		    				<hr>
		    			</div>
		    			<div class="dropdown-item d-flex justify-content-between">
		    				<a class="btn btn-info" href="">Profil</a>
					    	<form class="d-inline-block" action="{{ route('logout') }}" method="post">
					    		@csrf
					      	<button class="btn btn-info">Logout</button>
					    	</form>
		    			</div>
		    		</div>

		    	</div>
		    </li>
		    @endif
		  </ul>

	</div>

	<div class="container search-container">
	  <form action="{{ route('search') }}" method="get" class="w-100 mt-3">
	    <div class="input-group">

	      <div class="input-group-prepend">
	        <button type="button" class="btn btn-light border" data-toggle="dropdown">
            <i class="fa fa-filter"></i> <span class="d-none d-md-inline">Berdasarkan:</span> <span class="search-filter font-weight-bold">{{ isset($filter) ? title_case($filter) : 'Pengungsi' }}</span>
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
	      <input type="hidden" name="filter" value="{{ isset($filter) ? $filter : 'pengungsi' }}">
	    
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