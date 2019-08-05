<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{




  public function __construct()
  {
      $this->middleware('auth');
  }


    public function index(Request $request)
    {
        //

          $q = $request['q'];
          $active = $request['active'];
          $published = $request['published'];

          $category = Category::whereRaw('true');

           if($q)
           $category->whereRaw('(name like ? )',["%$q%"]);
           if($active!='')
           $category->where('active',$active);

           $category = $category->paginate(5)
             ->appends(['q'=>$q, 'active'=>$active  ]);


            return view('Category.index')
            ->with('title','Category Table')
            ->with('category',$category);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
            $category = Category::all();
            return view('category.create')->with('title','Create New Ctegory ')->with('category',$category);

    }


    public function store(CategoryRequest $request)
    {
        //
        $photo=basename($request->flePhoto->store('public/images'));
         $request['photo']=$photo;

        Category::create($request->all());

        \Session::flash('msg','s:Category Created Successfully');
         return redirect('/category/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category= Category::find($id);
        if(!$category){
            \Session::flash('msg','e:Invalid Category ID');
            return redirect('/category');
            }

            return view('Category.show')->with('title','Show Category ')
                ->with('category',$category);
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        if(!$category){
            \Session::flash('msg','e:Invalid Category ID');
            return redirect('/category');
        }
        return view('Category.edit')->with('title','Edit Category (Request)')
            ->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //
        $category= Category::find($id);

        if($request->hasFile('flePhoto')){
                  $photo = basename($request->flePhoto->store('public/images'));
                  $request['photo']=$photo;
              }

              $category->update([
                  'name' => $request['name'],
                  'active' => $request['active'],
                  'photo' => $request['photo'],

     ]);
      
        \Session::flash('msg','s:Category Updated Successfully');
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category= Category::find($id);
        $category->delete();
        \Session::flash('msg','w:Category Deleted Successfully');
        return redirect('/category');

    }






    }
