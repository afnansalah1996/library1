@extends('admin_layouts._admin_layout')
@section('title','menu')
@section('content')



    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">create slider</li>
        </ol>
        @include('_msg')





    <!-- Main Content -->
    <div class="container">
        <form method="post" enctype="multipart/form-data"  action="/admin/slider/{{$item->id}}">
            @csrf
            @method('put')
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-8">
                  <input autofocus value="{{$item->title}}" type="text" class="form-control" name="title" id="title" placeholder="Title">
                </div>
            </div>

            <div class="form-group row">
                <label for="subtitle" class="col-sm-2 col-form-label">Sub Title</label>
                <div class="col-sm-8">
                  <input autofocus value="{{$item->subtitle}}" type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Sub Title">
                </div>
            </div>
            <div class="form-group row">
                <label for="url" class="col-sm-2 col-form-label">URL</label>
                <div class="col-sm-8">
                  <input autofocus value="{{$item->url}}" type="text" class="form-control" name="url" id="url" placeholder="URL">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type='hidden' value='0' name='active'/>
                    <label><input  {{$item->active?"checked":""}} type="checkbox" value='1' name='active' id='active' /> Active</label>

                </div>
            </div>


            <div class="form-group row">
                <label for="flePhoto" class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-8">
                    <input type="file" name="flePhoto" />
                    @if($item->image)
                    <div>
                        <img class='img-fluid img-thumbnail' src='{{asset("storage/images/".$item->image)}}' />
                    </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type="submit" value="Update" class="btn btn-primary" />
                    <a class="btn btn-dark" href="/admin/slider">Cancel</a>
                </div>
            </div>
        </form>
    </div>

@endsection()
