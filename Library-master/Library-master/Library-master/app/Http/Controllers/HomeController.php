<?php

namespace App\Http\Controllers;
use App\Category;
use App\Article;
use App\Slider;
use App\Book;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $articles = Article::where('active',1)->orderBy('id','desc')->take(3)->get();
      $category = Category::all();
      return view('home',compact('articles','category'));

    }

    //
    // public function welcome()
    // {
    //     $sliders = Slider::where('active',1)->orderBy('id','desc')->take(5)->get();
    //     $articles = Article::where('active',1)->orderBy('id','desc')->take(3)->get();
    //     $category = Category::where('active',1)->orderBy('id','desc')->take(3)->get();
    //     $books = Book::where('active',1)->orderBy('id','desc')->take(3)->get();
    //     return view('welcome',compact('sliders','articles','books','category'));
    // }







}
