@extends('layouts._bslayout')

@section('content')

<div class="container">

  <div style="margin-top:120px;  margin-bottom:70px;" class="row">


    						<div class="col">
    							<div class="section_title_container text-center">
    								<div class="section_subtitle">take a look at our</div>
    								<div class="section_title"> All Category Of Books </div>
    								{{$category->links()}}

    							</div>
    						</div>
    					</div>
    					<div style="margin-bottom:50px;" class="row">

    						@foreach($category as $categ)
    						<div class="col-lg-4 col-md-6">
    								<div style="margin-left:50px;" class="single-news">
    										<div style="margin-top: 10px; margin-bottom:10px;" class="news-img">
    												<img style="  height: 200px;  width: 65%;  border-radius: 50%;" src="{{asset('storage/images/'. $categ->photo)}}" alt="" class="img-fluid">
    										</div>
    										<div class="news-text">
    												<!-- <div style="margin-left:50px; margin-top:15px;" class="news-date">
    												{{date('d-m-Y', strtotime($categ->updated_at))}}

    												</div> -->
    												<h3  style="margin-left:50px; margin-top:15px;"><a href="/categoryy/{{$categ->id}}">{{$categ->name}}</a></h3>
    												<!-- <a  style="margin-left:30px; margin-top:15px;" href="/category/{{$categ->id}}" class="news-btn">read more <i class="fa fa-long-arrow-right"></i></a> -->
    										</div>
    								</div>
    						</div>
    						@endforeach
    				</div>
    			</div>



</div>
</div>





@endsection
