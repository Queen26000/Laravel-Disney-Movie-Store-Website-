<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class PagesController extends Controller
{
  
  public function home(){
    $movies = Movie::get()->where('year', '2019');
    return view('pages.dashboard')->with('movies', $movies);
  }

  public function about(){
     return view ('pages.about');
  }

  public function movies(){
      $movies = Movie::get();
    return view('pages.movies')->with('movies', $movies);
  }

  public function display($id){
    $movie = Movie::find($id);
    return view('pages.display')->with('movie', $movie);
  }

}
