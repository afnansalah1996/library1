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

    <div class="container mb-3 mt-10">
              <form class="row mb-3">
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
                      <input type="submit" value="Search" class="btn btn-primary" />
                  </div>

            <div class="col-3">
                <a href="/category/create" class="btn btn-success">Create New Category</a>
            </div>
        </form>




        @if($category->count()>0)
        <table class="table mt-10 table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Count Of Articles </th>
              <th scope="col">Active</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($category as $categ)
                <tr>
                  <th scope="row">  <img style="width:65px; highth:65px;   border-radius: 30%; " class="img-fluid img-rounded img-thumbnail" src='/storage/images/{{$categ->photo}}' /> </th>
                  <td>{{$categ->name}}</td>
                  <td>{{$categ->articles->count()}}</td>
                  <td><input type="checkbox" disabled {{$categ->active?"checked":""}} /></td>
                  <td>
                    <a href='/category/{{$categ->id}}/edit' class='btn btn-sm btn-primary'>Edit</a>
                    <a href='/category/{{$categ->id}}' class='btn btn-sm btn-info'>Details</a>
                    <a onclick="return confirm('Are you sure dude?')" href='/category/{{$categ->id}}/delete' class='btn btn-sm btn-danger'>Delete</a>
                  </td>
                </tr>
            @endforeach

          </tbody>
        </table>
        {{$category->links()}}
        @else
        <div class='alert mt-4 alert-info'>There is no items to show</div>
        @endif
      </div>

      @endsection()
