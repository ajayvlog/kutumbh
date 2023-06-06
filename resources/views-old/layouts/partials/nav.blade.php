<!-- Header-->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}"> <img class="logo" src="{{ asset('images/logo.png') }}"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto mt-2">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.search') }}">{{ __('app.search_your_family') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('birthdays.index') }}">{{ __('birthday.birthday') }}</a>
                    </li>
                    @if (Auth::guest())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-register" href="{{ route('register') }}">Create Account</a>
                        </li>
                    @else
                        <!--dropdown-->
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}<i class="fas fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (is_system_admin(auth()->user()))
                                <a class="dropdown-item" href="{{ route('backups.index') }}">{{ __('backup.list') }}</a>@endif
                                <a class="dropdown-item" href="{{ route('profile') }}">{{ __('app.my_profile') }}</a>
                                <a class="dropdown-item" href="{{ route('password.change') }}">{{ __('auth.change_password') }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                            </div>
                        </li>
                        <!--dropdown ends-->
                    @endif
                </ul>
            </div>
        </div>
    </nav>
<!-- Header ends-->