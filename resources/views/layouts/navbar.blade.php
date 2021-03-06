<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
	<div class="container">
	    <a class="navbar-brand" href="{{ url('/') }}">
	        {{ config('app.name', 'Laravel') }}
	    </a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
	        <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	        <!-- Left Side Of Navbar -->
	        <ul class="navbar-nav">
            </ul>
            <form class="form-inline" action="{{ route('posts.index') }}" method="get">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request()->get('search') }}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

	        <!-- Right Side Of Navbar -->
	        <ul class="navbar-nav ml-auto">
	            <!-- Authentication Links -->
	            	<li class="nav-item">
	            		@if (app()->getLocale() === 'hy')
	            			<a class="nav-link" href="{{ route('change-language', 'en') }}">Eng</a>
	            		@else
	            			<a class="nav-link" href="{{ route('change-language', 'hy') }}">Arm</a>
	            		@endif
	            	</li>
	            @guest
	                <li class="nav-item">
	                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
	                </li>
	                <li class="nav-item">
	                    @if (Route::has('register'))
	                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
	                    @endif
	                </li>
	            @else
	            	<li class="nav-item">
	                    <a class="nav-link" href="{{ route('posts.create') }}">Create Post</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="{{ route('posts.index', 'mine') }}">Posts
	                    	<div class="badge badge-info">{{ Auth::user()->posts->count() }}</div>
	                    </a>
	                </li>
	                <li class="nav-item dropdown">
	                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	                        {{ Auth::user()->name }} <span class="caret"></span>
	                    </a>

	                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	                    	<a href="{{ route('user.profile') }}" class="dropdown-item">
	                    		Profile
	                    	</a>
	                        <a class="dropdown-item" href="{{ route('logout') }}"
	                           onclick="event.preventDefault();
	                                         document.getElementById('logout-form').submit();">
	                            {{ __('Logout') }}
	                        </a>

	                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                            @csrf
	                        </form>
	                    </div>
	                </li>
	            @endguest
	        </ul>
	    </div>
	</div>
</nav>