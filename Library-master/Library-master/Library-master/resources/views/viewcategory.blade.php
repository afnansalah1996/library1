@extends('layouts._bslayout')

@section('content')


<div class="container">

    <div style="margin-top:120px;  margin-bottom:70px;" class="row">
      <div class="col">
        <div class="section_title_container text-center">
          <div class="section_subtitle">take a look at our</div>
          <div class="section_title">{{$category->name}} Books </div>
        </div>
      </div>
    </div>


    <div style="margin-bottom:2px;" class="row">


    <div class="panel panel-default">
        <div class="panel-heading text-center"></div>

        <div class="panel-body">
            @if (count($books) > 0)
                @foreach($books as $book)
                    <div style="color:black;" class="row">
                        <div class="col-md-3">
                          <img style="  border-radius: 20%;" src="{{asset('storage/images/'. $book->photo)}}" alt="" class="img-fluid">
                        </div>
                        <!-- /.col-md-12 -->
                        <div class="col-md-9 text-center">
                            <h2>{{$book->title}}</h2>
                            <p>{{$book->summary}}</p>
                            <br/>
                            Author : {{$book->auther}} <br/>
                            <a href="{{asset('storage/books/'.$book->bookfile)}}" class="btn btn-primary download">Download</a>
                            <!-- <a href='/bookk/{{$book->id}}/more' class='btn btn-sm btn-info'>More info</a> -->

                            <a href="{{route('book',$book->id,true)}}" class="btn btn-info">More info</a>

                        </div>
                        <!-- /.col-md-9 -->
                    </div>
                    <hr>
                    @endforeach
                @endif
        </div>
      </div>
    </div>
  </div>



@endsection
