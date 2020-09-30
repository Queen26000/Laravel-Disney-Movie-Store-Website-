@extends('layouts.movie')
<br>
@section('content')
  <center><div class="container text-white center">
    <h1>{{ $movie->name }}</h1>
    <strong><p>{{ $movie->description }}</p></strong>
    <strong><p>{{ $movie->category }}</p></strong>
    <strong><p>£{{ $movie->price }}</p></strong>
    <strong><p>{{ $movie->year }}</p></strong>
    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <form action="{{ route('movie-destroy', $movie->id) }}" method="post">
        @csrf
        @method('DELETE')
      <hr>
      <img src=" {{ URL::to('storage/movie_covers/' . $movie->cover_image) }}" alt="{{ $movie->cover_image}}" width="500px">
      <hr>
      <button type="submit" name="button" class="btn btn-danger">DELETE</button>

  </div></center>

@endsection
