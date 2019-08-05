<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\Category;

class ArticleController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }


  public function index(Request $request)
  {
        $q = $request['q'];
          $active = $request['active'];
          $published = $request['published'];
                 $articles = Article::whereRaw('true');
             if($q)
            $articles->whereRaw('(title like ? or summary like ? or category_id in (select id from category where name like ?))',["%$q%","%$q%","%$q%"]);

           if($active!='')
           $articles->where('active',$active);

           if($published!='')
                   $articles->where('published',$published);

                 $articles = $articles->paginate(5)
                     ->appends(['q'=>$q, 'active'=>$active , 'published'=>$published   ]);

                     return view('articles.index')
                         ->with('title',' Articles table')
                         ->with('articles',$articles);
  }

  public function create()
  {

    $category = Category::all();
    return view(
      'articles.create')->with('title','Create New Article')->with('category',$category);
      // $articles = Article::all();
      // return view('articles.create')->with('title','Create New Article ')->with('articles',$articles);
  }


  public function store(ArticleRequest $request)
  {

    if($request->hasFile('flePhoto')){
              $photo = basename($request->flePhoto->store('public/images'));
              $request['photo']=$photo;
          }


      Article::create($request->all());

      \Session::flash('msg','s:Article Created Successfully');
      return redirect('/articles/create');
  }
  public function show($id)
  {
      $articles  = Article::find($id);
      if(!$articles){
          \Session::flash('msg','e:Invalid Article ID');
          return redirect('/articles');
      }
      $category = Category::get();
      return view('articles.show')->with('title','Article Details')
          ->with('articles',$articles)->with('category',$category);
  }


  public function edit($id)
  {
      $articless = Article::find($id);
      if(!$articless){
          \Session::flash('msg','e:Invalid Article ID');
          return redirect('/articles');
      }
      $category = Category::get();
      return view('articles.edit')->with('title','Edit Articles ')
          ->with('articles',$articless)->with('category',$category);
  }


  public function update($id, ArticleRequest $request)
  {
    $articless = Article::find($id);

    if($request->hasFile('flePhoto')){
              $photo = basename($request->flePhoto->store('public/images'));
              $request['photo']=$photo;
          }

      $articless->update($request->all());

      \Session::flash('msg','s:Article Updated Successfully');
      return redirect('/articles');
  }
  public function destroy($id)
  {
      $articless = Article::find($id);
      $articless->delete();
      \Session::flash('msg','w:Article Deleted Successfully');
      return redirect('/articles');
  }
}
