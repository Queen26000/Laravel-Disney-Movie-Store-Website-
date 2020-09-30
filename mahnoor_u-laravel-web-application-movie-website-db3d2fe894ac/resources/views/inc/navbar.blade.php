<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand"><img src="{{ url('/img/Movie_Logo.png') }}" width="60px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ">
        <li class="nav-item {{ (Request::is('/')) ? 'active' : '' }}">
           <a class="nav-link " href="{{ url('/') }}">Home</a>
          </a>
        </li>
        <li class="nav-item {{ (Request::is('about')) ? 'active' : '' }} ">
           <a class="nav-link " href="{{ url('/about') }}">About</a>
          </a>
        </li>
        <li class="nav-item {{ (Request::is('movies')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('movies') }}"> Movies</a>
        </li>
        <li class="nav-item {{ (Request::is('shop')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('movie-shop') }}">Online Store</a>
        </li>
        <li class="nav-item {{ (Request::is('home')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('messages-home') }}">Contact</a>
        </li>
        <li class="nav-item {{ (Request::is('admin-movies')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('movie-admin') }}">Admin</a>
        </li>

      </ul>
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('shopping-cart') }}">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
                <span class="badge badge-secondary">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
            </a>
        </li>
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
