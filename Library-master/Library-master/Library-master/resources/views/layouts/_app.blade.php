<!doctype html>
<html lang="en">
	<head>
		<title>Library</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="/twitter/assets/images/network-128.png">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="/twitter/assets/css/bootstrap.min.css"   crossorigin="anonymous">
		<link rel="stylesheet" href="/twitter/assets/css/main.css">


	</head>
	<body>
		<nav style="background-color:	#F0E68C;" class="navbar navbar-expand-md navbar-light sticky-top" >
			<a class="navbar-brand" href="/">
				<img id="logo" class="img-fluid" src="/twitter/assets/images/logo1.png" alt="My Network" >
				<span id="brand-name"> <strong>  Library </strong></span>
			</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

            @auth
                        <?php
                          //dd(Auth::user()->links);
                          $userLinks = Auth::user()->links()->where('show_in_menu',1)->orderBy('order_id')->get();
                          $links = $userLinks->where('parent_id',0);
                          //dd($userLinks);
                          //$links = DB::table('link')->where('show_in_menu',1)->where('parent_id',0)
                          //->whereRaw('id in (select link_id from users_link where users_id=?)',Auth::user()->id)->get();
                        ?>


    @foreach($links as $link)

        <?php
            $sublinks = $userLinks->where('parent_id',$link->id);
        ?>
        @if($sublinks->count()>0)
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{$link->title}}
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach($sublinks as $sublink)
        <a class="dropdown-item" href="{{$sublink->url}}">{{$sublink->title}}</a>
        @endforeach
      </div>
    </li>
    @else
    <li class="nav-item">
      <a class="nav-link " href="{{$link->url}}" role="button"  aria-haspopup="true" aria-expanded="false">
        {{$link->title}}
      </a>

      <!-- <a class="link-item" href="{{$link->url}}">{{$link->title}}</a> -->
    </li>
    @endif
    @endforeach


                        @endauth



          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else


                  <li class="nav-item dropdown">

                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <b style="color:black;">{{ Auth::user()->name }}</b>   <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/admin "> Control Banel </a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>



                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</div>
</nav>


		<section style="background-color:#FAFAD2;" class="container wrapper ">



			<div class="row mt-4">
				<div class="col-12 col-md-3  p-md-0">
					<div class="panel profile pt-0  ">
						<div class="title py-2">
							<h6 class="text-center">Your Profile</h6>
						</div>
						<div class="content p-3">
							<img class="userImage img-fluid " src='/storage/images/{{Auth::user()->photo}}' alt="{{ Auth::user()->name }}">
							<h5 class="text-center"> {{ Auth::user()->name }}</h5>
							<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
						</div>
					</div>
        </div>
      </div>
      <div class="row mt-4">

        <div  class="col-12 col-md-3  p-md-0">
          <div class="panel followers pt-0  ">
            <div class="title py-2">
              <h6 class="text-center">Activities</h6>
            </div>


            <div class="content pt-3 pb-1 px-2">
              <ul class="list-unstyled ">

                <li class="media">
                  <a class="d-flex center" href="/books/create">
                    <!-- <img src="" alt=""> -->
                      <h5 style="color:black; margin-left:70px;"> Upload Books </h5>
                  </a>
                  <div class="media-body pl-2">
                  </div>
                </li>

                <li class="media">
                  <a class="d-flex center" href="/category">
                    <!-- <img src="" alt=""> -->
                      <h5 style="color:black; margin-left:60px;"> Show All Category </h5>
                  </a>
                  <div class="media-body pl-2">
                  </div>
                </li>

                <li class="media">
                  <a class="d-flex center" href="/books">
                    <!-- <img src="" alt=""> -->
                      <h5 style="color:black; margin-left:70px;"> Show All Books </h5>
                  </a>
                  <div class="media-body pl-2">
                  </div>
                </li>




                </ul>
            </div>
          </div>

      </div>




				<div class="col-12 col-md-12">
					<!-- create post -->

					<!-- posts list -->

              @yield('content')

            </div>
          </div>

				<!-- followers -->


		</section>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="/twitter/assets/js/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
		<script src="/twitter/assets/js/popper.min.js"  crossorigin="anonymous"></script>
		<script src="/twitter/assets/js/bootstrap.min.js"  crossorigin="anonymous"></script>
	</body>
</html>
