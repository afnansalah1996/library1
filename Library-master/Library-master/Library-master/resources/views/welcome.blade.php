<!DOCTYPE html>
<html lang="en">
<head>
<title>Invest</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Invest project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/invest/styles/bootstrap4/bootstrap.min.css">
<link href="/invest/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/invest/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/invest/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="/invest/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="/invest/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="/invest/styles/responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Home -->

	<div class="home">
		<div class="home_slider_container">

			<!-- Home Slider -->

			<div class="owl-carousel owl-theme home_slider">



					<div class="container mt-5">
							<div class="bd-example mt-1">
									<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
											<ol class="carousel-indicators">
													<?php $index = 0; ?>
													@foreach($sliders as $slider)
													<li data-target="#carouselExampleCaptions" data-slide-to="{{$index}}" class="{{$index++==0?'active':''}}"></li>
													@endforeach
											</ol>
											<div class="carousel-inner">
													<?php $index = 0; ?>
													@foreach($sliders as $slider)
													<div class="carousel-item {{$index++==0?'active':''}}">
															<img src="{{asset('storage/images/'.$slider->image)}}" class="d-block w-100" alt="{{$slider->title}}">
															<div class="carousel-caption d-none d-md-block">
																	<h5>{{$slider->title}}</h5>
																	<p>{{$slider->subtitle}}.</p>
																	@if($slider->url)
																	<a href="{{$slider->url}}" class="template-btn mt-3">READE MORE</a>
																	@endif
															</div>
													</div>
													@endforeach
											</div>
											<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
													<span class="carousel-control-prev-icon" aria-hidden="true"></span>
													<span class="sr-only">Previous</span>
											</a>
											<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
													<span class="carousel-control-next-icon" aria-hidden="true"></span>
													<span class="sr-only">Next</span>
											</a>
									</div>
							</div>
					</div>


			</div>


		</div>

		<!-- Header -->

		<header class="header">

			<!-- Top Bar -->
			<div style="margin-top:-18px;" class="top_bar">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="top_bar_container d-flex flex-row align-items-center justify-content-start">
								<div class="logo_container">
									<div class="logo">
										<a href="#">
											<div class="logo_line_1"><span>Lib</span>rary</div>
											<div class="logo_line_2">home</div>
											<div class="logo_line_1 logo_img "><img style=" margin-bottom: 10px; border-radius: 50%;" src="/invest/images/logo1.png" alt=""></div>
										</a>
									</div>
								</div>
								<div class="top_bar_content ml-auto mt-5">
									<div class="coins">
										<!-- <ul>
											<li>BTC $10200</li>
											<li>ETH $979</li>
											<li>LTC $230</li>
										</ul> -->
									</div>


                 @guest
									<div class="register_login">
										<div class="register"><a href="/register">register</a></div>
										<div class="login"><a href="/login">login</a></div>
									</div>

							  	@else
									<div class="register_login">
										<div class="login"><a href="/home">{{ Auth::user()->name }} </a></div>

									</div>

									@endguest

								</div>
								<div class="burger">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>




			<!-- Main Menu -->
			<div class="main_menu">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="main_menu_container d-flex flex-row align-items-center justify-content-start">
								<div class="main_menu_content">
									<ul class="main_menu_list">

										<li><a href="/">Home
											<svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 width="9px" height="5px" viewBox="0 0 9 5" enable-background="new 0 0 9 5" xml:space="preserve">
												<g>
													<polyline class="arrow_d" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" points="0.022,-0.178 4.5,4.331 9.091,-0.275 	"/>
												</g>
											</svg>
										</a></li>



										<li class="hassubs">
											<a href="/category">Categories
												<svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
													 width="9px" height="5px" viewBox="0 0 9 5" enable-background="new 0 0 9 5" xml:space="preserve">
													<g>
														<polyline class="arrow_d" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" points="0.022,-0.178 4.5,4.331 9.091,-0.275 	"/>
													</g>
												</svg>
											</a>
											<ul>
												<li><a href="/articles"> Articles
													<svg version="1.1" id="Layer_6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
														 width="9px" height="5px" viewBox="0 0 9 5" enable-background="new 0 0 9 5" xml:space="preserve">
														<g>
															<polyline class="arrow_d" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" points="0.022,-0.178 4.5,4.331 9.091,-0.275 	"/>
														</g>
													</svg>
												</a></li>
												<li><a href="/books"> Books
													<svg version="1.1" id="Layer_7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
														 width="9px" height="5px" viewBox="0 0 9 5" enable-background="new 0 0 9 5" xml:space="preserve">
														<g>
															<polyline class="arrow_d" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" points="0.022,-0.178 4.5,4.331 9.091,-0.275 	"/>
														</g>
													</svg>
												</a></li>


											</ul>
										</li>





										<li><a href="/invest/about.html">about us
											<svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 width="9px" height="5px" viewBox="0 0 9 5" enable-background="new 0 0 9 5" xml:space="preserve">
												<g>
													<polyline class="arrow_d" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" points="0.022,-0.178 4.5,4.331 9.091,-0.275 	"/>
												</g>
											</svg>
										</a></li>



										<li><a href="/invest/contact.html">contact
											<svg version="1.1" id="Layer_16" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 width="9px" height="5px" viewBox="0 0 9 5" enable-background="new 0 0 9 5" xml:space="preserve">
												<g>
													<polyline class="arrow_d" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" points="0.022,-0.178 4.5,4.331 9.091,-0.275 	"/>
												</g>
											</svg>
										</a></li>
									</ul>
								</div>
								<div class="main_menu_contact ml-auto">
									<!-- <div class="main_menu_phone"><img src="/invest/images/phone-call.svg" alt=""><span>+825 25 800 800</span></div>
									<div class="main_menu_email"><img src="/invest/images/envelope.svg" alt=""><span>office@invest.com</span></div> -->
									<div class="main_menu_search">
										<div class="main_menu_search_button">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" enable-background="new 0 0 512 512" width="15px" height="15px">
												<g>
												<path class="mag_path" d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5   S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9   C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z" fill="#f4f4f8"/>
												</g>
											</svg>
										</div>
										<div class="main_menu_search_content">
											<form action="#">
												<input class="search_input" type="search" placeholder="Keyword" required="required">
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Menu -->

		</header>
	</div>


	<div class="info">

		<!-- <div class="container">

			<div class="row">
					@foreach($category as $categ)
					<div class="col-lg-4 col-md-6">
							<div style="margin-left:50px;" class="single-news">
									<div class="news-img">
											<img style="  border-radius: 40%;" src="{{asset('storage/images/'. $categ->photo)}}" alt="" class="img-fluid">
									</div>
									<div class="news-text">
											<div style="margin-left:30px; margin-top:15px;" class="news-date">
											{{date('d-m-Y', strtotime($categ->updated_at))}}

											</div>
											<h3  style="margin-left:30px; margin-top:15px;"><a href="blog-details.html">{{$categ->name}}</a></h3>
											<a  style="margin-left:30px; margin-top:15px;" href="/category/{{$categ->id}}" class="news-btn">Show All Book <i class="fa fa-long-arrow-right"></i></a>
									</div>
							</div>
					</div>
					@endforeach
			</div>
		</div>
 -->






			<div class="container">

					<div style="margin-top: -50px; " class="row">
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


<!--
			<div class="container">

					<div style="margin-top: -50px; margin-bottom:40px;" class="row">
						<div class="col">
							<div class="section_title_container text-center">
								<div class="section_subtitle">take a look at our</div>
								<div class="section_title"> All Category Books </div>
							</div>
						</div>
					</div>
					<div style="margin-bottom:120px;" class="row">

						@foreach($books as $book)
						<div class="col-lg-4 col-md-6">
								<div style="margin-left:50px;" class="single-news">
										<div class="news-img">
												<img style="  border-radius: 20%;" src="{{asset('storage/images/'. $book->photo)}}" alt="" class="img-fluid">
										</div>
										<div class="news-text">
												<div style="margin-left:30px; margin-top:15px;" class="news-date">
												{{date('d-m-Y', strtotime($book->updated_at))}}

												</div>
												<h3  style="margin-left:30px; margin-top:15px;"><a href="blog-details.html">{{$book->title}}</a></h3>
												<p  style="margin-left:30px; margin-top:15px;">{{$book->summary}}</p>
												<a  style="margin-left:30px; margin-top:15px;" href="/books/{{$book->id}}" class="news-btn">read more <i class="fa fa-long-arrow-right"></i></a>
										</div>
								</div>
						</div>
						@endforeach
				</div>
			</div> -->

















	<div class="news">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">take a look at our</div>
						<div class="section_title">Some New Articles  </div>
					</div>
				</div>
			</div>
			<div class="row news_row">


				@foreach($articles as $article)

				<div class="col-lg-4 news_col">
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



















	<!-- Footer -->

	<footer style="margin-bottom:-110px;" class="footer">
		<div class="container">
			<div class="row">

				<!-- Footer Column -->
				<div class="col-lg-3 footer_col">
					<div class="footer_about">
						<div class="logo_container footer_logo">
							<div class="logo">
								<a href="#">
									<div class="logo_line_1"><span>Lib</span>rary</div>
								</a>
							</div>
						</div>
						<p class="footer_about_text">Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit. Integer ut imperdiet erat. Quisque ultricies lectus tellus, eu tristique magna pharetra nec.</p>
					</div>
				</div>

				<!-- Footer Column -->
				<div class="col-lg-3 footer_col">
					<div class="footer_links">
						<div class="footer_title">Useful Links</div>
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Case Studies</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="#">Consulting</a></li>
							<li><a href="#">Commodities</a></li>
							<li><a href="#">Insurance</a></li>
							<li><a href="#">Trades</a></li>
							<li><a href="#">Planning</a></li>
							<li><a href="#">Finance</a></li>
							<li><a href="#">Crypto</a></li>
						</ul>
					</div>
				</div>

				<!-- Footer Column -->
				<div class="col-lg-6 footer_col">
					<div class="footer_newsletter">
						<div class="footer_title">Subscribe to our newsletter</div>
						<form action="#" class="footer_newsletter_form">
							<input type="email" class="footer_newsletter_input" placeholder="Your E-mail" required="required">
							<button class="footer_newsletter_button" type="submit">subscribe</button>
						</form>
						<div class="footer_newsletter_text">Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit. Integer ut imperdiet erat. Quisque ultricies lectus tellus, eu tristique magna pharetra nec.</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-reddit-alien" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-4 order-md-1 order-2">
						<div class="copyright_content d-flex flex-row align-items-center justify-content-start">
							<div class="cr"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
						</div>
						</div>
					</div>
					<div class="col-md-8 order-md-2 order-1">
						<nav class="footer_nav d-flex flex-row align-items-center justify-content-md-end">
							<!-- <ul>
								<li><a href="#">Home</a></li>
								<li><a href="/invest/about.html">About us</a></li>
								<li><a href="/invest/services.html">Services</a></li>
								<li><a href="/invest/news.html">Blog</a></li>
								<li><a href="/invest/contact.html">Contact</a></li>
							</ul> -->
						</nav>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="/invest/js/jquery-3.2.1.min.js"></script>
<script src="/invest/styles/bootstrap4/popper.js"></script>
<script src="/invest/styles/bootstrap4/bootstrap.min.js"></script>
<script src="/invest/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/invest/plugins/easing/easing.js"></script>
<script src="/invest/plugins/parallax-js-master/parallax.min.js"></script>
<script src="/invest/js/custom.js"></script>
</body>
</html>
