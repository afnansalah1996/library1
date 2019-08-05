<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;
use App\Slider;
use App\Book;
use App\Comment;
class GuestController extends Controller
{
    //

    public function welcomee()
    {
      $category = Category::paginate(3);

      return view('welcome')->with('title','welcome ')->with('category',$category);


    }


    public function welcome()
    {
        $sliders = Slider::where('active',1)->orderBy('id','desc')->take(5)->get();
        $articles = Article::where('active',1)->orderBy('id','desc')->take(3)->get();
        $category = Category::where('active',1)->orderBy('id','desc')->take(9)->paginate(3);
        $books = Book::where('active',1)->orderBy('id','desc')->take(3)->get();
        $comment = Comment::whereRaw('true')->orderBy('id','desc')->get();
        return view('welcome',compact('sliders','articles','books','category'));
        return view('commentbox',compact('sliders','comments','articles','books','category'));
    }

    public function wel()
    {

        $category = Category::where('active',1)->orderBy('id','desc')->paginate(3);
        $books = Book::where('active',1)->orderBy('id','desc')->get();
        return view('book',compact('books','category'));
    }

    public function addComment(Request $request, $id){
          $this->validate($request,[
              'comment'=>'required|max:200'
          ]);

          $book = Book::findOrFail($id);
          $coment = new Comment();
          $coment->users_id = auth()->user()->id;
          $coment->books_id = $book->id;
          $coment->comment = $request->input('comment');
          $coment->save();
          return redirect()->back();

      }

      public function destroy($id)
      {
          //
          $commment= Comment::find($id);
          $commment->delete();
          \Session::flash('msg','w:comments Deleted Successfully');
          return redirect()->back();

      }


      // public function more($id)
      // {
      //     //
      //     $book = Book::find($id);
      //     if(!$book){
      //         \Session::flash('msg','e:Invalid Book ID');
      //         return redirect('/categoryy/$id');
      //     }
      //     return view('book')->with('books',$book);
      // }






    // public function getDownload(Request $request,$id)
    // {        $books = Book::find($id);
    //
    //                 $file= public_path(). "/pdf/";  //path of your directory
    //                 $headers = array(
    //                     'Content-Type: application/pdf',
    //                 );
    //                  return \Response::download($file.$books, 'filename.pdf', $headers);
    // }

    public function viewCategory($id){
        $category = Category::find($id);
        $books = $category->books;
        return view('viewcategory')->with(['books'=>$books,'category'=>$category]);
    }

    // public function viewCategoryy(){
    //     $category = Category::paginate(3);
    //     $books = $category->books;
    //     return view('viewcategory0')->with(['books'=>$books,'category'=>$category]);
    // }



    public function viewBook($id){
        $book = Book::find($id);
        return view('book')->with('books',$book);
    }

    //
    // public function show()
    // {
    //   $category = Category::paginate(3);
    //
    //   return view('home')->with('title','home ')->with('category',$category);
    //
    // }


}
