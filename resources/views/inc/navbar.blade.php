
<a href="/">{{config('app.name','LSApp')}}</a>

<div>
    <ul>
        <li><a href="http://localhost/lsapp/public/">Home</a></li>
        <li><a href="http://localhost/lsapp/public/about">About</a></li>
        <li><a href="http://localhost/lsapp/public/services">Services</a></li>
        <li><a href="http://localhost/lsapp/public/posts">Blog</a></li>
    </ul>
    {{--<ul>--}}
        {{--<li><a href="http://localhost/lsapp/public/posts/create">Create Post</a></li>--}}
    {{--</ul>--}}
</div>



<!-- The part for the log in that I took from the custom: -->
{{--Right Side of the Navbar--}}
<ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else

        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a href="http://localhost/lsapp/public/home" >dashboard!</a>
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
