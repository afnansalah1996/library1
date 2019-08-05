@extends('admin_layouts._admin_layout')
@section('title','Ctegory')
@section('content')



    <!-- Main Content -->

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Show Category</li>
        </ol>

        <form method="post" action="/category">
            @csrf

            @if($category->photo)
            <div class="form-group row">
                <label for="flePhoto" class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-5">
                <img class="img-fluid img-rounded img-thumbnail" src='/storage/images/{{$category->photo}}' />
                </div>
            </div>
            @endif

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Category Name</label>
                <div class="col-sm-8">
                  <input readonly value="{{$category->name}}" type="text" class="form-control" name="name" id="name" placeholder=" Name">
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Articles Count</label>
                <div class="col-sm-8">
                  <input readonly value=" {{$category->articles->count()}}  "  type="text" class="form-control" name="name" id="name" >
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <label><input disabled {{$category->active?"checked":""}} type="checkbox" value='on' name='active' id='active' /> Active</label>
                </div>
            </div>






            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <a class="btn btn-primary" href="/category/{{$category->id}}/edit">Edit</a>
                    <a class="btn btn-dark" href="/category">Cancel</a>
                </div>
            </div>
        </form>
    </div>

@endsection()
