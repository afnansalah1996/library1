@extends('layouts._app')

@section('content')
<div  style="margin-left:140px; margin-top:-492px;" class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                     Welcome in Library
                   <!-- @Lang('message.welcome') -->
                  </div>

                <div  class="card-body">

                  <div class="container">
                    <div class="row">
                      <div class="col">
                        <div class="section_title_container text-center">
                          <div class="section_title">Some New Articles  </div>
                        </div>
                      </div>
                    </div>

                      @foreach($articles as $article)

                      <div class="col-lg-12 news_col">
                        <div class="news_item">
                          <div class="news_image">
                            <img src="{{asset('storage/images/'.$article->photo)}}" class="d-block w-100" alt="{{$article->title}}">
                          </div>
                          <div class="news_content">
                            <div class="news_title">{{$article->title}}</div>
                            <div class="news_text">
                              <h4>{{$article->summary}}</h4>
                            </div>

                          </div>
                          <div class="news_button"><a href="/articles/{{$article->id}}">read more</a></div>
                        </div>
                      </div>

                      @endforeach


                    </div>

                  </div>
                </div>
              </div>

@endsection
