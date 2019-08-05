@extends('layouts._layout')
@section('content')

<!--content-->
<div class="container">
	<div class="cont">
		<div style="width:1150px" class="content">
			<div class="content-top-bottom">
				<h2> All Categories</h2>

                  <div class="panel panel-default">
                 	            <div class="panel-heading text-center"> <h4>Choose The Category Of Articles That Would You Read It ! </h4></div>
                          <h4>    {{$category->links()}} </h4>

                 	            <div class="panel-body">
                 	                @if (count($category) > 0)
                 	                    @foreach($category as $categ)
                 	                        <div class="row">
                 	                            <div class="col-md-3">
                                                <img src="{{asset('storage/images/'.$categ->photo)}}" class="img-responsive"/>
                 	                            </div>
                 	                            <!-- /.col-md-12 -->
                 	                            <div class="col-md-9 text-center">
                 	                                <h1>{{$categ->name}}</h1>
                 	                                <br/>
                 	                             <h4>   Active : <input type="checkbox" disabled {{$categ->active?"checked":""}} /> </h4> <br/>
                 	                                <a href="/category/{{$categ->id}}" class="btn btn-primary">Open</a>
                 	                                <a href="#" class="btn btn-info">More info</a>
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
          	  </div>

	<!----->
</div>






























@endsection
