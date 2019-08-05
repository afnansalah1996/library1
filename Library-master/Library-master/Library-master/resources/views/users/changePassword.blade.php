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
          <li class="breadcrumb-item active"> Change Password </li>
        </ol>
        @include('_msg')


    <!-- Main Content -->
    <div class="container">
        <form method="post" action="/users/changepassword">
            @csrf
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-8">
                  <input autofocus  type="password" class="form-control" name="password" id="password" placeholder="Current Password">
                </div>
            </div>

            <div class="form-group row">
                <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-8">
                  <input  type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password">
                </div>
            </div>
            <div class="form-group row">
                <label for="newpassword_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-8">
                  <input  type="password" class="form-control" name="newpassword_confirmation" id="newpassword_confirmation" placeholder="New Password Confirmation">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type="submit" value="Change Password" class="btn btn-primary" />
                </div>
            </div>
        </form>
    </div>

@endsection()
