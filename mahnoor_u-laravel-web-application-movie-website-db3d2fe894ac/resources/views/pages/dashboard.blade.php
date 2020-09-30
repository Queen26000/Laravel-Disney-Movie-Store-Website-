@extends('layouts.movie')
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Disney Movie Website</title>

</head>

<body>

  @section('content')

  <!-- Header -->
  <header class="bg-primary py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2">DISNEY MOVIE STORE</h1>
          <p class="lead mb-5 text-white-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non possimus ab labore provident mollitia. Id assumenda voluptate earum corporis facere quibusdam quisquam iste ipsa cumque unde nisi, totam quas ipsam.</p>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-md-8 mb-5 text-white">
        <h2>Wide range of your favourite latest disney movies!</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('movie-shop') }}">Buy now</a>
      </div>
      <div class="col-md-4 mb-5 text-white">
        <h2>Contact Us</h2>
        <hr>
        <address>
          <strong>Disney movie store</strong>
          <br>3481 Melrose Place
          <br>Beverly Hills, CA 90210
          <br>
        </address>
        <address>
          <abbr title="Phone">P:</abbr>
          (123) 456-7890
          <br>
          <abbr title="Email">E:</abbr>
          <a href="mailto:#">disney-store@gmail.com</a>
        </address>
      </div>
    </div>
    <!-- /.row -->

    <div class="container">
    @if (count($movies) > 0)
        <div class="row">
          @foreach ($movies as $movie)
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img src=" {{ URL::to('storage/movie_covers/' . $movie->cover_image) }}" alt="{{ $movie->cover_image}}"
              height="200px">
              <div class="card-body">
                  <h1 class="card-text">{{ $movie->name }}</h1>
                  <p class="text-muted">{{ $movie->description }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <a class="btn btn-primary" href="{{ route('movie-shop') }}">Buy</a>
                      <div class="btn-group">
                      </div>
                      <small class="text-muted">{{ $movie->year }}</small>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
        @else
          <h3> Movies out of stock!</h3>
        @endif
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


  @endsection


</body>

</html>
