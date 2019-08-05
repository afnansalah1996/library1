@extends('admin_layouts._admin_layout')
@section('title','Users')
@section('content')



    <!-- Main Content -->

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">All Users</li>
        </ol>
        @include('_msg')

    <!-- Main Content -->
    <div class="container">

        <form class="row">
        <div class="col-3">
        <input autofocus value="{{request()['q']}}" type="text" class="form-control"  name="q" placeholder="Enter Name or Email" >
        </div>

        <div class="col-2">
              <select name="gender" class="form-control">
                  <option value="">Any gender</option>
                  <option {{request()['gender']=='M'?'selected':''}} value="M">Male</option>
                  <option {{request()['gender']=='F'?'selected':''}} value="F">Female</option>

              </select>
          </div>

          <div class="col-2">
              <select name="active" class="form-control">
                  <option value="">Any status</option>
                  <option {{request()['active']=='1'?'selected':''}} value="1">Active</option>
                  <option {{request()['active']=='0'?'selected':''}} value="0">Inactive</option>
              </select>
          </div>



        <div class="col-2">
        <input type="submit" value="Search" class="btn btn-primary" />
        </div>
        <div class="col-3">
        <a href="/users/create" class="btn btn-success">Create New User</a>
        </div>
    </form>



     @if($users->count()>0)
        <table class="table mt-3 table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">User Name</th>
              <th scope="col">Email</th>
              <th scope="col">Active</th>
              <th scope="col">Gender</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>

            @foreach($users as $user)
                <tr>
                  <th scope="row">{{$user->id}}</th>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td><input type="checkbox" disabled {{$user->active?"checked":""}} /></td>
                  <td>{{$user->gender}}</td>


                  <td>
                    <a href='/users/{{$user->id}}/edit' class='btn btn-sm btn-primary'>Edit</a>
                    <a href='/users/{{$user->id}}' class='btn btn-sm btn-info'>Details</a>
                    <a href='/users/{{$user->id}}/links' class='btn btn-sm btn-warning'>Links</a>
                    <a href='/users/{{$user->id}}/delete' onclick='return confirm("Are you sure ?")' class='btn btn-sm btn-danger'>Delete</a>
                  </td>
                </tr>
            @endforeach

          </tbody>
        </table>
     {{$users->links()}}
     @endif
    </div>


@endsection
@section('js')
<!-- Demo scripts for this page-->
    <script src="/admin-pages/js/demo/chart-area-demo.js"></script>
    <script src="/admin-pages/js/demo/chart-bar-demo.js"></script>
    <script src="/admin-pages/js/demo/chart-pie-demo.js"></script>
@endsection
