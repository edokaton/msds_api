<div class="blue-line"></div>

	<div class="main-navbar">
		<div class="navbar-dropdown-wrap pull-right">
			<li class="dropdown navbar-dropdown">
				<a href="#" class="main-navbar-toggle dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello, {{ Auth::user()->username }} <span class="caret"></span></a>
				<ul class="dropdown-menu main-navbar-ul">
					<li class="main-navbar-li">
						<a href="{{ url('/auth/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout
						</a>

						<form id="logout-form" action="{{ url('/auth/logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
				</ul>
			</li>
		</div>
	</div>

	<div class="sidebar-container">
		<div class="sidebar-logo">
			<h3>MSDS</h3>
		</div>
		<div class="sidebar-title">
			<p>MENU ADMINISTRATOR</p>
		</div>
		<div class="sidebar-menu">
			<ul class="sidebar-ul">
				<a class="sidebar-anchor" href="{{ url('msds') }}">
					<li class="sidebar-li berita">
						<img src="{{ asset('img/pecahan/berita.png') }}" alt="dashboard icon" class="sidebar-icon" />
						<p>MSDS</p>
					</li>
				</a>
				<!-- <a class="sidebar-anchor" href="{{ url('pengguna') }}">
					<li class="sidebar-li datauser">
						<img src="{{ asset('img/pecahan/datauser.png') }}" alt="dashboard icon" class="sidebar-icon" />					
						<p>Data Pengguna</p>
					</li>
				</a>	 -->		
				<a class="sidebar-anchor" href="{{ url('feedback') }}">
					<li class="sidebar-li kegiatan">
						<img src="{{ asset('img/pecahan/kegiatan.png') }}" alt="dashboard icon" class="sidebar-icon" />
						<p>Feedback Pengguna</p>
					</li>
				</a>				
			</ul>
		</div>
	</div>
