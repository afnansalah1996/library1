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
          <li class="breadcrumb-item active">Edit Category</li>
        </ol>
        @include('_msg')


    <div class="container mt-10">
              <form method="post" enctype="multipart/form-data" action="/category/{{$category->id}}">
            @csrf
            @method('put')


                        @if($category->photo)
                                <div class="form-group row">
                                    <label for="notes" class="col-sm-2 col-form-label">Photo</label>
                                    <div class="col-sm-5">
                                    <img class="img-fluid img-rounded img-thumbnail" src='/storage/images/{{$category->photo}}' />
                                    </div>
                                </div>
                                @endif
                                <div class="form-group row">
                                    <label for="flePhoto" class="col-sm-2 col-form-label">Photo</label>
                                    <div class="col-sm-4">
                                      <input type="file" value="{{$category->photo}}" name="flePhoto" id="flePhoto">
                                    </div>
                                </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Category Name</label>
                <div class="col-sm-8">
                  <input value="{{$category->name}}" autofocus  type="text" class="form-control" name="name" id="name">
                  <!-- <input value="{{old('name')}}" autofocus  type="text" class="form-control" name="name" id="name"> -->
                </div>
            </div>


            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type='hidden' value='0' name='active'/>
                    <label><input {{$category->active?"checked":""}} type="checkbox" value='1' name='active' id='active' /> Active</label>
                </div>
            </div>



            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type="submit" value="Update" class="btn btn-primary" />
                    <a class="btn btn-dark" href="/category">Cancel</a>
                </div>
            </div>
        </form>
    </div>

@endsection()
