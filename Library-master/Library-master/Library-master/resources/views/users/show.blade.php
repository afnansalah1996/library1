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
          <li class="breadcrumb-item active">Show User</li>
        </ol>
        @include('_msg')

  <form method="post" action="/category">
    @csrf

<div class="container">

  @if($user->photo)

  <div class="form-group row">
      <label for="flePhoto" class="col-sm-2 col-form-label">  <strong> Photo:</strong>  </label>
      <div class="col-sm-5">
      <img  style="  border-radius: 50%;" class="img-fluid img-rounded img-thumbnail" src='/storage/images/{{$user->photo}}' />
      </div>
  </div>
  @endif



    <dl class="row">

      <dt class="col-sm-3">User Name:</dt>
      <dd class="col-sm-9">{{$user->name}}</dd>
      <dt class="col-sm-3">Email:</dt>
      <dd class="col-sm-9">{{$user->email}}</dd>
      <dt class="col-sm-3"> Gender:</dt>
      <dd class="col-sm-9">{{$user->gender}}</dd>
      <dt class="col-sm-3"> Active:</dt>
      <dd class="col-sm-9">  <label><input disabled {{$user->active?"checked":""}} type="checkbox" value='on' name='active' id='active' /> Active</label> </dd>


    </dl>
    <hr>

<a class="btn btn-primary" href="/users/{{$user->id}}/edit">Edit</a>
<a class="btn btn-dark" href="/users">Cancel</a>
</div>

@endsection()
