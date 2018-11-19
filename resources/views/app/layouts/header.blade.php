<nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3 fixed-top shadow">
	<div class="container">

		<a class="navbar-brand" href="{{ url('/disasters') }}"><i>{{ env('APP_PREFIX') }}</i><b>{{ env('APP_NAME') }}</b></a>

	  <!-- Toggler/collapsibe Button -->
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-links">
	    <span class="fa fa-bars"></span>
	  </button>

	  <div class="collapse navbar-collapse justify-content-end pt-3" id="nav-links">
		  <ul class="navbar-nav">
		    <li class="nav-item">
		      <a class="nav-link text-white pr-3" href="{{ url('/disasters') }}"><i class="fa fa-home"></i> <b>Beranda</b></a>
		    </li>
		    <hr>
		    <li class="nav-item dropdown">
		      <a class="nav-link text-white pr-3" data-toggle="dropdown" href=""><i class="fa fa-plus-circle"></i> <b>Tambah Data</b></a>
		      <div class="dropdown-menu shadow border-0">
		      	<a class="dropdown-item" href="{{ url('/test/create') }}">&rsaquo; Bencana</a>
		      	<a class="dropdown-item" href="{{ url('/test/create') }}">&rsaquo; Posko</a>
		      	<a class="dropdown-item" href="{{ url('/test/create') }}">&rsaquo; Pengungsi</a>
		      </div>
		    </li>
		   	<hr>
		    <li class="nav-item">
		      <a class="nav-link text-white pr-3" href="#"><i class="fa fa-folder-open"></i> <b>Arsip</b></a>
		    </li>
		   	<hr>
		    <li class="nav-item">
		      <a class="nav-link text-white pr-3" href="#"><i class="fa fa-sign-in"></i> <b>Login</b></a>
		    </li>
		   	<hr>
		    <li class="nav-item">
		      <a class="nav-link bg-light rounded text-primary" href="#"><i class="fa fa-user-plus"></i> <b>Register</b></a>
		    </li>
	    	<hr>
		  </ul>
	  </div>

	</div>
</nav>