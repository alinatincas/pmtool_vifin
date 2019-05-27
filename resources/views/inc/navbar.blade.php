<header class="header-vifin">
    <nav class="navbar navbar-expand-md navbar-light bg-white nav-vifin">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/img/vifin_logo.png" alt="" class="logo-img">
            </a>
            <!-- Right Side Of Navbar -->
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
                <div class="">{{ Auth::user()->name }}                      
                    <button type="button" class="btn btn-vifin">
                        <a class="btn-vifin-a" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('LOG OUT') }}
                        </a>
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>   
                </div>  
            @endguest           
        </div>
    </nav>
</header>


