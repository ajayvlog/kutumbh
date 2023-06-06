<!-- Header-->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}"> <img class="logo" src="{{ asset('images/kutumbh-logo.png') }}"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto mt-2">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.search') }}">{{ __('app.search_your_family') }}</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('birthdays.index') }}">{{ __('birthday.birthday') }}</a>
                    </li> --}}
                    <!-- Authentication Links -->
                    @if (Auth::guard('web')->check())
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('web')->user()->name }}<i class="fas fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                {{-- <a class="dropdown-item" href="{{ route('backups.index') }}">{{ __('backup.list') }}</a> --}}
                                <a class="dropdown-item" href="{{ route('profile') }}">{{ __('app.my_profile') }}</a>
                                <a class="dropdown-item" href="{{ route('password.change') }}">{{ __('auth.change_password') }}</a>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-register" href="{{ route('register') }}">Create Account</a>
                        </li>
                    @endif
                    
                    {{-- @if(Auth::guard('admin')->check())
                        <li class="nav-item dropdown">
                            <a id="adminDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('admin')->user()->name }} (ADMIN) <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminDropdown">
                                <a href="{{route('admin.home')}}" class="dropdown-item">Dashboard</a>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#admin-logout-form').submit();">
                                    Logout
                                </a>
                                <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endif --}}

                </ul>
            </div>
        </div>
    </nav>
<!-- Header ends-->
