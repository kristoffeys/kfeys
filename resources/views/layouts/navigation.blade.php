<div class="container mx-auto">
	<header id="header" class="clearfix px-2 sm:px-0">
		<figure id="logo" class="h-16 py-2 float-left flex">
			<img src="{{ asset('fonts/devface.svg') }}" class="max-h-full flex-1" />
			<figcaption class="flex-1 py-2 px-4">
				Kristof<br>
				Feys
			</figcaption>
		</figure>
		<nav id="nav" class="md:float-right md:h-16 py-2">
			<div class="block md:hidden float-right py-2">
				<button v-on:click="onNavigationPillClick" class="flex items-center px-3 py-2 border text-teal-lighter border-teal-light">
					<svg class="h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
				</button>
			</div>
			<div class="clearfix"></div>
			<ul class="w-full list-reset md:flex md:w-auto text-center md:text-left md:block hidden" id="dropdown">
				@guest
					<li class="block md:flex-1 px-2 py-4"><a href="{{ route('login') }}">Login</a></li>
					<li class="block md:flex-1 px-2 py-4"><a href="{{ route('register') }}">Register</a></li>
				@else
					<li class="dropdown block md:flex-1 px-2 py-4">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<ul class="dropdown-menu">
							<li>
								<a href="{{ route('logout') }}"
								   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
									Logout
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
				@endguest
			</ul>
		</nav>
	</header>
</div>
