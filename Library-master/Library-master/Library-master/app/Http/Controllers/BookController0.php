<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Book;
use App\Category;
use App\User;

class BookController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }


  public function create()
  {

    $categorgf+y = Category::all();
    return view(
      'users.upload')->with('title','Create New Book')->with('category',$category);
      // $books = Book::all();
      // return view('books.create')->with('title','Create New Book ')->with('books',$books);
  }


  public function store(BookRequest $request)
  {
    // $books->users_id = \Auth::user()->id;
    // $book->save();

     $user=\Auth::user();
    $request['users_id'] = $user->id ;

      if($request->hasFile('flePhoto')){
          $photo = basename($request->flePhoto->store('public/images'));
          $request['photo']=$photo;
        }

        if($request->hasFile('bookfile')){
          $file = basename($request->bookfile->store('public/books'));
          $request['bookfile']=$file;
        }

      //  dd($request->all());
      Book::create($request->all());

      \Session::flash('msg','s:Book Created Successfully');
      return redirect('/books/create');
  }
  public function show($id)
  {
      $books  = Book::find($id);
      if(!$books){
          \Session::flash('msg','e:Invalid Book ID');
          return redirect('/books');
      }
      $category = Category::get();
      return view('books.show')->with('title','Book Details')
          ->with('books',$books)->with('category',$category);
  }


  public function edit($id)
  {
      $books = Book::find($id);
      if(!$books){
          \Session::flash('msg','e:Invalid Book ID');
          return redirect('/books');
      }
      $category = Category::get();
      return view('books.edit')->with('title','Edit books ')
          ->with('books',$books)->with('category',$category);
  }


  public function update($id, Request $request)
  {

    $books = Book::find($id);

    if($request->hasFile('bookfile')){
      $file = basename($request->bookfile->store('public/books'));
      $request['bookfile']=$file;
    }

    if($request->hasFile('flePhoto')){
              $photo = basename($request->flePhoto->store('public/images'));
              $request['photo']=$photo;
          }

      $books->update($request->all());

      \Session::flash('msg','s:Book Updated Successfully');
      return redirect('/books');
  }
  public function destroy($id)
  {
      $books = Book::find($id);
      $books->delete();
      \Session::flash('msg','w:Book Deleted Successfully');
      return redirect('/books');
  }
}
