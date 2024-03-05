<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/">At Chiang Mai</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarCollapse" aria-controls="navbarCollapse"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#hotel">Hotel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#restuarant">Restuarant</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#otop">Otop</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#station">Station</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#currency">currency</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    {{-- <a class="dropdown-item" href="">
                                        profile
                                    </a> --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </ul>
        </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>