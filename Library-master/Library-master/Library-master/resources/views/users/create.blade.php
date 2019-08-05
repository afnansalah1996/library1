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
          <li class="breadcrumb-item active">Create Users</li>
        </ol>
        @include('_msg')

    <!-- Main Content -->
    <div class="container">
        <form method="post" enctype="multipart/form-data" action="/users">
            @csrf

            <div class="form-group row">
                <label for="flePhoto" class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-8">
                    <input type="file" name="flePhoto" />
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-8">
                  <input value="{{old('name')}}" autofocus type="text" class="form-control" name="name" id="name" placeholder="User Name">
                </div>
            </div>
             <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input value="{{old('email')}}" type="text" class="form-control" name="email" id="name" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input value="{{old('password')}}" type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
            </div>

             <div class="form-group row">
            <label for="published" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-8">
                <div class='mt-2'>

                    <label><input {{old('gender')=="F"?"checked":""}} type="radio" value='F' name='gender' />Femal</label>
                    <label><input {{old('gender')=="M"?"checked":""}} type="radio" value='M' name='gender' /> Male</label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-8 offset-sm-2">
                <input type='hidden' value='0' name='active'/>
                <label><input  {{old('active')?"checked":""}} type="checkbox" value='1' name='active' id='active' /> Active</label>

            </div>
        </div>


            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type="submit" value="Create" class="btn btn-primary" />
                    <a class="btn btn-dark" href="/users">Cancel</a>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('js')
<!-- Demo scripts for this page-->
    <script src="/admin-pages/js/demo/chart-area-demo.js"></script>
    <script src="/admin-pages/js/demo/chart-bar-demo.js"></script>
    <script src="/admin-pages/js/demo/chart-pie-demo.js"></script>
@endsection
