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
          <li class="breadcrumb-item active">Update Users</li>
        </ol>
        @include('_msg')

    <!-- Main Content -->
    <div class="container">
        <form method="post" enctype="multipart/form-data" action="/users/{{$user->id}}">
            @csrf
            @method('put')



            @if($user->photo)
                    <div class="form-group row">
                        <label for="notes" class="col-sm-2 col-form-label">Photo</label>
                        <div class="col-sm-5">
                        <img class="img-fluid img-rounded img-thumbnail" src='/storage/images/{{$user->photo}}' />
                            <!--<img class="img-fluid img-rounded img-thumbnail" src='{{asset("storage/images/$user->photo")}}' />-->
                        </div>
                    </div>
                    @endif
                    <div class="form-group row">
                        <label for="flePhoto" class="col-sm-2 col-form-label">Photo</label>
                        <div class="col-sm-4">
                          <input type="file" name="flePhoto" id="flePhoto">
                        </div>
                    </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-8">
                  <input autofocus type="text" class="form-control" value='{{$user->name}}' name="name" id="name" placeholder="name">
                </div>
            </div>
             <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input autofocus type="text" class="form-control" value='{{$user->email}}' name="email" id="name" placeholder="email">
                </div>
            </div>
            

            <div class="form-group row">
                          <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                          <div class="col-sm-8">
                              <div class='mt-2'>
                                  <label><input {{$user->gender=="M"?"checked":""}} type="radio" value='M' name='gender' /> Male</label>
                                  <label><input {{$user->gender=="F"?"checked":""}} type="radio" value='F' name='gender' /> Female</label>
                              </div>
                          </div>
                      </div>

                      <div class="form-group row">
                          <div class="col-sm-8 offset-sm-2">
                              <input type='hidden' value='0' name='active'/>
                              <label><input {{$user->active?"checked":""}} type="checkbox" value='1' name='active' id='active' /> Active</label>
                          </div>
                      </div>


            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type="submit" value="Update" class="btn btn-primary" />
                    <a class="btn btn-dark" href="/users">Cancel</a>
                </div>
            </div>
        </form>


    </div>

@endsection()
