<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Link;
use PDF;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Notifications\CreateNewUser;
use App\Notifications\PasswordChangedNotification;
class UserController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }

    public function changePassword()
    {
      return view('users.changePassword')
          ->with('title','Change Password');

        \Notification::send(User::get(),new PasswordChangedNotification());
        $users = User::find(1);
        $users->notify(new PasswordChangedNotification($users));


    }
    public function postChangePassword(Request $request)
    {
        $request->validate([
            'password'=>'required',
            'newpassword'=>'required|min:6|confirmed'
        ]);

        $users = \Auth::user();//logged in user
        if(Hash::check($request['password'], $users->password)){

            //تغيير كلمة المرور
            $users->password = Hash::make($request['newpassword']);
            $users->save();

           $users->notify(new PasswordChangedNotification($users));

            \Session::flash('msg','s: Password Changed Successfully');
        }
        else{
            \Session::flash('msg','e:Invalid Current Password');
        }
        return redirect('/users/changePassword');
    }

    // public function index(Request $request) {
    //        $users = User::all();
    //        return view('users.index',['users' => $users]);
    //    }

       public function report(Request $request)
       {
            $users = User::paginate(3);

           if($request->view_type === 'download') {
               $pdf = PDF::loadView('users.report', ['users' => $users]);
               return $pdf->download('users.pdf');
           } else {
               $view = View('users.report', ['users' => $users]);
               $pdf = \App::make('dompdf.wrapper');
               $pdf->loadHTML($view->render());
               return $pdf->stream();
           }

       }

    public function index(Request $request)
    {

        $q=$request['q'];
        $gender = $request['gender'];
        $active = $request['active'];
         $users = User::whereRaw('true');

        if($q)
            $users->whereRaw('(name like ? or email like ? )',["%$q%","%$q%"]);

            if($gender)
            $users->where('gender',$gender);

            if($active!='')
            $users->where('active',$active);

         $users = $users->paginate(3)
      ->appends(['q'=>$q , 'gender'=>$gender , 'active'=>$active]);
        return view('users.index')
        ->with('title','List Users')
        ->with('users',$users);
    }


    public function create()
    {
        return view('users.create')
        ->with('title','Create Users');
    }


    public function store(UserRequest $request)
    {
      $photo=basename($request->flePhoto->store('public/images'));
       $request['photo']=$photo;

       $user=\Auth::user();
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'gender' => $request['gender'],
            'active' => $request['active'],
            'photo' => $request['photo'],
            'password' => Hash::make($request['password']),
        ]);


       //
    //     $user->notify(new CreateNewUser( $user));
         \Session::flash('msg','s:User Created Successfully , Go for your email');

        return redirect('/users/create');
    }

    public function show($id)
    {
        $user= User::find($id);
        if(!$user){
            \Session::flash('msg','e:Invalid User ID');
            return redirect('/users');
        }
        return view('users.show')
        ->with('title','Show User')
         ->with('user',$user)  ;
    }


    public function edit($id)
    {
        $user= User::find($id);
        if(!$user){
            \Session::flash('msg','e:Invalid User ID');
            return redirect('/users');
        }
        return view('users.edit')
        ->with('title','Edit User')
         ->with('user',$user)  ;
    }


    public function update(Request $request, $id)
    {
      $user= User::find($id);

             $request->validate([
               //
               'name'=>'required|max:50',
               'email'=>'required|email|unique:users,email,'.$id,
               'gender'=>'required',
               'active'=>'required',


             ]);

             if($request->hasFile('flePhoto')){
                       $photo = basename($request->flePhoto->store('public/images'));
                       $request['photo']=$photo;
                   }

                   $user->update([
                       'name' => $request['name'],
                       'email' => $request['email'],
                       'gender' => $request['gender'],
                       'active' => $request['active'],
                       'photo' => $request['photo'],
                       'password' => Hash::make($request['password']),
                   ]);

         \Session::flash('msg','s:User Updated Successfully');
        return redirect('/users');
    }


    public function destroy($id)
    {
         $user= User::find($id);
         $user->delete();

        \Session::flash('msg','s:User Deleted Successfully');
        return redirect('/users');
    }

    public function contact(){

      return view('users.contact');

    }


    public function links($id) {
            $user = User::find($id);
            if (!$user) {
                \Session::flash('msg', 'w:Invalid User');
                return redirect('/users');
            }
            $links = Link::orderBy('order_id')->get();
            return view('users.links')
                            ->with('title', $user->name . ' Links')
                            ->with('links', $links)
                            ->with('user', $user);
        }
        public function postLinks(Request $request,$id) {
            //حذف جميع الصلاحيات الحالية لهذا المستخدم
            \DB::table('users_link')->where('users_id', $id)->delete();
            if($request->links){
                foreach($request->links as $link_id)
                {
                    \DB::table('users_link')->insert(['users_id'=>$id, 'link_id'=>$link_id]);
                }
            }
            \Session::flash('msg', 'User links saved successfully');

            return redirect('/users/{{$user->id}}/links');
        }
    }
