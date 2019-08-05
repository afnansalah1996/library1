@extends('admin_layouts._admin_layout')

@section('content')

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">User Links</li>
    </ol>
    @include('_msg')



        <div class='container'>
        <h1>  <strong>   {{ $user->name . ' links' }}  </strong> </h1>
             <hr>
        <div class="col-md-8 col-lg-6 ">

            <form  method="post" enctype="multipart/form-data" action="/users/{{ $user->id}}/links">
                @csrf


                 <div class="form-group row">
                    <div class="col-sm-9 mt-3">
                        <ul class='list-unstyled'>
                        <?php $userLinks = $user->links()->get(); ?>
                        @foreach($links->where('parent_id',0) as $link)
                            <li>
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input {{$userLinks->where('id',$link->id)->count()>0?"checked":""}} type="checkbox" value="{{$link->id}}" class="custom-control-input" id="linkCheckbox{{$link->id}}" name="links[]">
                                    <label class="custom-control-label" for="linkCheckbox{{$link->id}}"><b>{{$link->title}}</b></label>
                                </div>
                                <ul style='list-style-type:none'>
                                    @foreach($links->where('parent_id',$link->id) as $sublink)
                                        <li>
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input {{$userLinks->where('id',$sublink->id)->count()>0?"checked":""}} type="checkbox" value="{{$sublink->id}}" class="custom-control-input" id="linkCheckbox{{$sublink->id}}" name="links[]">
                                                <label class="custom-control-label" for="linkCheckbox{{$sublink->id}}">{{$sublink->title}}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>





                <div class="form-group row">
                    <div class="col-sm-9 mt-3">
                        <button type="submit" name="register" class="btn btn-primary">Save Links</button>
                        <a href="/users" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>

            </form>
        </div>

</div>

@endsection()


@section('js')
    <script>
        $(function(){
            $(":checkbox").change(function(){
                //الاب واولاد عمه
                $(this).parent().next().find(":checkbox").prop('checked',$(this).prop('checked'));

                $(this).parent().parent().parent()
                var isChecked = $(this).closest('ul').find(':checked').length;
                $(this).closest('ul').prev().find(":checkbox").prop('checked',isChecked);
            });
        });
    </script>
@endsection()
