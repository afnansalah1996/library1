
<div class="container">
    @if(Session::get('msg'))
        <?php
            $msg = Session::get('msg');
            $msgClass = 'alert-info';
            $first2Letter = strtolower(substr($msg,0,2));
            if($first2Letter=='s:'){
                $msgClass = 'alert-success';
                $msg=substr($msg,2);//قص اول حرفين
            }
            else if($first2Letter=='e:'){
                $msgClass = 'alert-danger';
                $msg=substr($msg,2);//قص اول حرفين
            }
            else if($first2Letter=='i:'){
                $msgClass = 'alert-info';
                $msg=substr($msg,2);//قص اول حرفين
            }
            else if($first2Letter=='w:'){
                $msgClass = 'alert-warning';
                $msg=substr($msg,2);//قص اول حرفين
            }
        ?>
        <div class='alert {{$msgClass}} alert-dismissible fade show' role="alert">
            {{$msg}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
