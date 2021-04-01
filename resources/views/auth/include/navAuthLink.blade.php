
    @if (Route::has('login'))
        <div>
            @auth
                <a class="btn btn-link" href="{{ url('/home') }}">Home</a>
                <a class="btn btn-link" href="{{ url('logout') }}">Logout</a>
            @else
                <a class="btn btn-link" href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a class="btn btn-link" href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
