@extends('layouts._bslayout')

@section('content')

<div class="container">

  <div style="margin-top:120px;  margin-bottom:70px;" class="row">
    <div class="col">
      <div class="section_title_container text-center">
        <div class="section_subtitle">take a look at our</div>
        <div class="section_title">Book details and comments  </div>
      </div>
    </div>
  </div>


  <div style="margin-bottom:2px;" class="row">
    <div class="panel panel-default">
        <div class="panel-heading text-center"></div>

        <div class="panel-body">

      <div class="panel panel-default">

        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">


                    <!-- <img src="{{asset('storage/thumbnails/'.$books->photo)}}" class="img-responsive"/> -->
                    <img style="  border-radius: 20%;" src="{{asset('storage/images/'. $books->photo)}}" alt="" class="img-fluid">

                </div>
                <!-- /.col-md-12 -->
                <div style="color:black;" class="col-md-9 text-center">
                    <h2>{{$books->title}}</h2>
                    <p>{{$books->summary}}</p>
                    <br/>
                    Author : {{$books->auther}} <br/>
                    <a href="{{asset('storage/books/'.$books->bookfile)}}" class="btn btn-primary">Download</a>
                    <a href="" class="btn btn-info">More info</a>

                </div>
                <!-- /.col-md-9 -->
            </div>
        </div>
    </div>
<hr>

@include('commentbox')


</div>
</div>
</div>
</div>





@endsection
