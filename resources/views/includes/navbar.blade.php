<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand navbar-logo" href="{{ route('home') }}">
            <strong>RawatCovid</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto pt-2">
                <a class="nav-item nav-link btn btn-gejala mx-2" href="{{ route('home.diagnosis') }}">Cek Gejala</a>
                <a class="nav-item nav-link" href="{{ route('home.daftardampak') }}">Informasi</a> 
                           
                @if (Auth::user())

                <a class="nav-item nav-link mx-md-2" href="{{ route('dashboard') }}">Dashboard</a> 
                @endif
 
                @guest
                
                {{-- <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none ml-5">
                    <button class="nav-item nav-link btn btn-login btn-success px-3 py-2 my-auto" type="button" 
                    onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                    Login
                    </button>
                </form>

                <!-- Desktop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block ml-5">
                    <button class="nav-item nav-link btn btn-login px-3 py-2 my-auto" type="button" 
                    onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                    Login
                    </button>
                </form> --}}
                @endguest

                @auth
                    <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none ml-5" action="{{ url('logout') }}" method="POST">
                    <button class="nav-item nav-link btn btn-login px-3 py-2 my-auto" type="submit">
                        @csrf
                    Logout
                    </button>
                </form>

                <!-- Desktop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block ml-5" action="{{ url('logout') }}" method="POST">
                    <button class="nav-item nav-link btn btn-login px-3 py-2 my-auto"type="submit">
                        @csrf
                    Logout
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </div>
</nav>

