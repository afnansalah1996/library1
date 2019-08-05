@extends('admin_layouts._admin_layout')
@section('title','Book')
@section('content')



    <!-- Main Content -->

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Create books</li>
        </ol>
        @include('_msg')

    <div class="container mt-10">
        <form method="post" enctype="multipart/form-data" action="/books">
            @csrf
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-8">
                  <input autofocus value="{{old('title')}}" type="text" class="form-control" name="title" id="title" placeholder=" title">
                </div>
            </div>

            <div class="form-group row">
                <label for="auther" class="col-sm-2 col-form-label">Auther</label>
                <div class="col-sm-8">
                  <input autofocus value="{{old('auther')}}" type="text" class="form-control" name="auther" id="title" placeholder=" auther">
                </div>
            </div>

            <div class="form-group row">
                <label for="summary" class="col-sm-2 col-form-label">Summary</label>
                <div class="col-sm-8">
                  <textarea  class="form-control" name="summary" id="summary" placeholder="Enter summary">{{old('summary')}}</textarea>
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
                    <input type='hidden' value='0' name='published'/>
                    <label><input  {{old('published')?"checked":""}} type="checkbox" value='1' name='published' id='published' /> Published</label>

                </div>
            </div>

            <div class="form-group row">
                <label for="flePhoto" class="col-sm-2 col-form-label"> Photo</label>
                <div class="col-sm-8">
                    <input type="file" name="flePhoto" />
                </div>
            </div>


            <div class="form-group row">
                <label for="bookfile" class="col-sm-2 col-form-label">Book File</label>
                <div class="col-sm-8">
                    <input type="file" name="bookfile" />
                </div>
            </div>



            <div class="form-group row">
                <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-8">
                    <select id="category_id" class="form-control" name="category_id" >
                        <option value="">Select category</option>
                        @foreach($category as $categ)
                            <option {{old('category_id')==$categ->id?"selected":""}} value='{{$categ->id}}'>{{$categ->name}} ({{$categ->books->count()}})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type="submit" value="Create" class="btn btn-primary" />
                    <a class="btn btn-dark" href="/books">Cancel</a>
                </div>
            </div>
        </form>
    </div>

@endsection()
