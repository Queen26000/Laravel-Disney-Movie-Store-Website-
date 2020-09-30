<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ url('/img/Movie_Logo.png') }}" width="60px"></a>
            <ul class="nav navbar-nav">
              <li ><a href="{{ route('home') }}">Home</a></li>
              <li><a href="{{ route('about') }}">About</a></li>
              <li><a href="{{ route('movies') }}">Movies</a></li>
              <li><a href="{{ route('movie-shop') }}">Online Store</a></li>
              <li><a href="{{ route('messages-home') }}">Contact</a></li>
              <li><a href="{{ route('movie-admin') }}">Admin</a></li>

            </ul>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="{{ route('shopping-cart') }}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
                        <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                    </a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>