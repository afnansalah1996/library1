
    <div class="panel panel-default">
        <div class="panel-heading text-center">Comments</div>




        <div class="panel-body">
            @include('partial.alerts')
            <form action="{{route('comment',$books->id)}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea autofocus class="form-control" name="comment" placeholder="Enter Your Comment Here"></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" name="addcomment" class="btn btn-primary">Add Comment</button>
              </div>

            </form>
            <hr>
            @if (count($books->comment) > 0)
            @foreach($books->comment as $comment)
                <div style="margin-top: 30px; margin-bottom: 30px;" class="row">
                  <div class="col-sm-4">


                  <h3 style="color:black; margin-bottom:2px;"> <strong> {{$comment->user->name??''}}</strong> </h3>
                   <h6 style="margin-top: 3px;">{{$comment->created_at}}</h6>
                 </div>

                   <div class="col-sm-10">
                  <textarea readonly class="form-control" name="comment" placeholder="Enter Your Comment Here"> {{$comment->comment}} </textarea>
                </div>



                    <a style="width:50px;" href='/comment/{{$comment->id}}/delete' onclick='return confirm("Are you sure ?")' class='btn btn-sm btn-danger'  ><i class="fa fa-lg fa-trash"></i></a>

                </div>
                <!-- /.row -->
                @endforeach
                @endif
        </div>
    </div>
