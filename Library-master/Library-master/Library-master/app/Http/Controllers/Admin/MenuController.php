<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Menu;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $q = $request['q'];
        $active = $request['active'];
        $items = Menu::whereRaw('true');

        if($q)
            $items->whereRaw('(title like ? or url like ?)',["%$q%","%$q%"]);

        if($active!='')
            $items->where('active',$active);

        $items = $items->paginate(10)
            ->appends(['q'=>$q, 'active'=>$active]);

        return view('admin.menu.index')
            ->with('title','Manage Menus')
            ->with('items',$items);
    }

    public function create()
    {
        $topMenu = Menu::where("parent_id",0)->get();
        return view('admin.menu.create')->with('title','Create New Menu')->with('topMenu',$topMenu);
    }
    public function store(MenuRequest $request)
    {
        $photo = '';
        $request['image'] = $photo;
        $account = Menu::create($request->all());

        \Session::flash('msg','s:Menu Created Successfully');
        return redirect('/admin/menu/create');
    }


    public function edit($id)
    {
        $topMenu = Menu::where("parent_id",0)->get();
        $item = Menu::find($id);
        if(!$item){
            \Session::flash('msg','e:Invalid Item ID');
            return redirect('/admin/menu');
        }
        return view('admin.menu.edit')->with('title','Edit Menu')
            ->with('item',$item)->with('topMenu',$topMenu);
    }


    public function update($id, MenuRequest $request)
    {
        $item = Menu::find($id);
        $item->update($request->all());

        \Session::flash('msg','s:Menu Updated Successfully');
        return redirect('/admin/menu');
    }
    public function destroy($id)
    {
        $item = Menu::find($id);
        $item->delete();
        Menu::where("parent_id",$id)->delete();
        \Session::flash('msg','w:Menu Deleted Successfully');
        return redirect('/admin/menu');
    }
}
