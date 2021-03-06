@extends('layouts.movie')

@section('content')
    <header class="section-header text-center text-white">
      <h1>The Movie Shop</h1>
      <br>
    </header>
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
                      <div class="btn-group">
                        <a href="{{ route('movie-cart', $movie->id)}}" type="button" class="btn btn-md btn-success">Add to cart</a>
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
@endsection
