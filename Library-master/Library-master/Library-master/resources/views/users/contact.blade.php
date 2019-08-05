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
          <li class="breadcrumb-item active">Contact with us..</li>
        </ol>
        @include('_msg')

    <!-- Main Content -->
    <div class="container">
        <form method="post" enctype="multipart/form-data" action="/users">
            @csrf


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
                <label for="message" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-8">
                  <textarea  class="form-control" name="message" id="message" placeholder="Enter Message">{{old('message')}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type="submit" value="Send" class="btn btn-primary" />
                    <a class="btn btn-dark" href="/users">Cancel</a>
                </div>
            </div>


@endsection
