<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use App\Http\Requests\SliderRequest;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $q = $request['q'];
        $active = $request['active'];
        $items = Slider::whereRaw('true');

        if($q)
            $items->whereRaw('(title like ? or subtitle like ?)',["%$q%","%$q%"]);

        if($active!='')
            $items->where('active',$active);

        $items = $items->paginate(10)
            ->appends(['q'=>$q, 'active'=>$active]);

        return view('admin.slider.index')
            ->with('title','Manage Sliders')
            ->with('items',$items);
    }

    public function create()
    {
        return view('admin.slider.create')->with('title','Create New Slider');
    }
    public function store(SliderRequest $request)
    {
        $photo = '';
        if($request->hasFile('flePhoto')){
            $photo = basename($request->flePhoto->store('public/images'));
        }
        else{
            \Session::flash('msg','e:You must select Slider Image');
            return redirect('/admin/slider/create')->withInput();

        }
        $request['image'] = $photo;
        $account = Slider::create($request->all());

        \Session::flash('msg','s:Slider Created Successfully');
        return redirect('/admin/slider/create');
    }


    public function edit($id)
    {
        $item = Slider::find($id);
        if(!$item){
            \Session::flash('msg','e:Invalid Item ID');
            return redirect('/admin/slider');
        }
        return view('admin.slider.edit')->with('title','Edit Slider')
            ->with('item',$item);
    }


    public function update($id, SliderRequest $request)
    {
        $item = Slider::find($id);
        if($request->hasFile('flePhoto')){
            $photo = basename($request->flePhoto->store('public/images'));
            //$item->image = $photo;
            $request['image'] = $photo;
        }
        $item->update($request->all());

        \Session::flash('msg','s:Slider Updated Successfully');
        return redirect('/admin/slider');
    }
    public function destroy($id)
    {
        $item = Slider::find($id);
        $item->delete();
        \Session::flash('msg','w:Slider Deleted Successfully');
        return redirect('/admin/slider');
    }
}
