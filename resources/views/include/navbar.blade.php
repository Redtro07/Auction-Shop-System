<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a style="color:#F3CE11;" class="dash-brand navbar-brand" href="{{ url('/home') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
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
                        <img src="/storage/user_profile/{{Auth::user()->profile}}" style="border-radius: 50%" height="15px" width="16px" alt="" srcset="">&nbsp;{{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{url('/account')}}" class="dropdown-item">Manage Account</a>
                        <a href="{{ url('/change-password') }}" class="dropdown-item">Change Password</a>
                            <hr>
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
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-bell"></i><span class="badge badge-danger badge-bell">2</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Wishlist</a>
                    </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link" href="/">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
