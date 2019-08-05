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
          <li class="breadcrumb-item active">Create Category</li>
        </ol>
        @include('_msg')

    <div class="container mt-10">
              <form class="row" enctype="multipart/form-data">
                  <div class="col-3">
                      <input autofocus value="{{request()['q']}}" type="text" class="form-control" placeholder="Enter your search" name="q" />
                  </div>

                  <div class="col-2">
                      <select name="active" class="form-control">
                          <option value="">Any status</option>
                          <option {{request()['active']=='1'?'selected':''}} value="1">Active</option>
                          <option {{request()['active']=='0'?'selected':''}} value="0">Inactive</option>
                      </select>
                  </div>

                  <div class="col-2">
                      <select name="published" class="form-control">
                          <option value="">Any status</option>
                          <option {{request()['published']=='1'?'selected':''}} value="1">Published</option>
                          <option {{request()['published']=='0'?'selected':''}} value="0">InPublished</option>
                      </select>
                  </div>


                  <div class="col-2">
                      <input type="submit" value="Search" class="btn btn-primary" />
                  </div>




            <div class="col-3">
                <a href="/articles/create" class="btn btn-success">Create New Article</a>
            </div>
        </form>
        @if($articles->count()>0)
        <table class="table mt-3 table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <!-- <th scope="col">Summary</th>
              <th scope="col">Details</th> -->
              <th scope="col">Active</th>
              <th scope="col">Published</th>
              <th scope="col">Category</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($articles as $arti)
                <tr>
                  <th scope="row">   <img style="width:65px; highth:65px;   border-radius: 30%; " class="img-fluid img-rounded img-thumbnail" src='/storage/images/{{$arti->photo}}' /> </th>
                  <td>{{$arti->title}}</td>
                  <!-- <td>{{$arti->summary}} </td>
                  <td>{{$arti->details}}</td> -->
                  <td> <input type="checkbox" disabled {{$arti->active?"checked":""}} /> </td>
                  <td> <input type="checkbox" disabled {{$arti->active?"checked":""}} /> </td>
                  <td>{{$arti->category->name??''}}</td>
                  <td>
                    <a href='/articles/{{$arti->id}}/edit' class='btn btn-sm btn-primary'>Edit</a>
                    <a href='/articles/{{$arti->id}}' class='btn btn-sm btn-info'>Details</a>
                    <a onclick="return confirm('Are you sure dude?')" href='/articles/{{$arti->id}}/delete' class='btn btn-sm btn-danger'>Delete</a>
                  </td>
                </tr>
            @endforeach

          </tbody>
        </table>
        {{$articles->links()}}
        @else
        <div class='alert mt-4 alert-info'>There is no items to show</div>
        @endif
    </div>

@endsection()
