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
        <form class="row">
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
                <a href="/admin/slider/create" class="btn btn-success">Create New Slider</a>
            </div>
        </form>
        @if($items->count()>0)
        <table class="table mt-3 table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Subtitle</th>
              <th scope="col">Active</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($items as $item)
                <tr>
                  <td>{{$item->title}}</td>
                  <td>{{$item->subtitle}} </td>
                  <td>{{$item->active?'Active':'Inactive'}}</td>
                  <td>
                    <a href='/admin/slider/{{$item->id}}/edit' class='btn btn-sm btn-primary'>Edit</a>
                    <a onclick="return confirm('Are you sure dude?')" href='/admin/slider/{{$item->id}}/delete' class='btn btn-sm btn-danger'>Delete</a>
                  </td>
                </tr>
            @endforeach

          </tbody>
        </table>
        {{$items->links()}}
        @else
        <div class='alert mt-4 alert-info'>There is no items to show</div>
        @endif
    </div>

@endsection()
