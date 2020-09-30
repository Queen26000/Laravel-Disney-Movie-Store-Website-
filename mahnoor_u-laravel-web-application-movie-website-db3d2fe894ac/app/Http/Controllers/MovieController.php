<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Movie;
use App\Models\Order;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Auth;


class MovieController extends Controller
{

  public function __construct()
   {
       $this->middleware('auth', ['except' => ['getIndex', 'getAddToCart', 'getReduceByOne', 'getRemoveItem', 'getCart' ]]);
   }

    public function index()
    {
      $movies = Movie::get();
      return view('movies.index')->with('movies', $movies);
    }

    public function getIndex()
    {
      $movies = Movie::get();
      return view('movies.shop')->with('movies', $movies);
    }


      public function show($id)
      {
        $movie = Movie::find($id);
        return view('movies.show')->with('movie', $movie);
      }



    public function getAddToCart(Request $request, $id)
    {
      $movie = Movie::find($id);
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->add($movie, $movie->id);

      $request->session()->put('cart', $cart);
      return redirect()->route('movie-shop');
    }

    public function getReduceByOne($id)
    {
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->reduceByOne($id);

      if (count($cart->items) > 0) {
          Session::put('cart', $cart);
      } else {
          Session::forget('cart');
      }
      return redirect()->route('shopping-cart');
    }

    public function getRemoveItem($id)
    {
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->removeItem($id);

      if (count($cart->items) > 0) {
          Session::put('cart', $cart);
      } else {
          Session::forget('cart');
      }

      return redirect()->route('shopping-cart');
    }

    public function getCart()
    {
      if (!Session::has('cart')) {
          return view('movies.shopping-cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      return view('movies.shopping-cart', ['movies' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
      if (!Session::has('cart')) {
          return view('movies.shopping-cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $total = $cart->totalPrice;
      return view('movies.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request)
    {
      if (!Session::has('cart')) {
          return redirect()->route('movies.shopping-cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      
      $order = new Order();
      $order->cart = serialize($cart);
      $order->address = $request->input('address');
      $order->name = $request->input('name');
      $order->user_id = Auth::id();
      $order->save();

      Session::forget('cart');
      return redirect('/shop')->with('success', 'Movie purchased successfully!');
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
            $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
                'category' => 'required',
                'price' => 'required',
                'year' => 'required',
                'cover-image' => 'required|image',
            ]);

            $filenameWithExtension = $request->file('cover-image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file('cover-image')->getClientOriginalExtension();

            $filenameToStore = $filename. '_' . time() . '.' . $extension;

            $path = $request->file('cover-image')->storeAs('public/movie_covers', $filenameToStore);

            $movie = new Movie();
            $movie->name = $request->input('name');
            $movie->description = $request->input('description');
            $movie->category = $request->input('category');
            $movie->price = $request->input('price');
            $movie->year = $request->input('year');
            $movie->cover_image = $filenameToStore;
            $movie->save();

            return redirect('/admin-movies')->with('success', 'Movie created successfully!');

      }
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();

        return redirect('/admin-movies')->with('success', 'Movie deleted successfully!');

   }
}
