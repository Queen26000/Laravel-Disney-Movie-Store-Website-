@extends('layouts.movie')

@section('content')
<h1 class="text-white text-center" >Add new movies</h1>
<br>
    <div class="row justify-content-center" col-md-6>
        <form method="post" action="{{ route('movie-store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">

                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">

              <input type="text" class="form-control" name="description" id="description" placeholder="Enter description">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="category" id="category" placeholder="Enter category">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="price" id="price" placeholder="Enter price">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="year" id="year" placeholder="Enter year">
            <div class="form-group">
              </div>
                <input type="file" class="form-control" name="cover-image" id="cover-image">
            </div>
            <br>
        <center><button class="btn btn-primary btn-lg float-right" type="submit">Add movie</button></center>
        </form>
    </div>
    <br>


@endsection
