<!DOCTYPE html>
<html lang="vi">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>@yield('title')</title>
	<meta name="description" content="@yield('description')"/>
	@yield('opengraph')
	<link rel="icon" type="text/css" href="{{ asset('client-assets/images/icon.ico') }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ asset('client-assets/js/jquery.devrama.slider.min.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('client-assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('client-assets/css/mta.website.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('client-assets/css/slider.all.css') }}">
	<script type="text/javascript" src="{{ asset('client-assets/js/mta.website.js') }}"></script>
	<script type="text/javascript" src="{{ asset('client-assets/js/slider.all.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('client-assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('client-assets/css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('client-assets/css/menu.home.css') }}">
	<script type="text/javascript" src=""></script>
	<script src="{{ asset('client-assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('client-assets/js/jquery.mousewheel.min.js') }}"></script>
	<script src="{{ asset('client-assets/js/menu.home.js') }}"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<div id="fb-root"></div>
	<script>(function (d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id))
			return;
		js = d.createElement(s);
		js.id = id;
		js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=608950069232934";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
</head>
<body>
	<div class="container">
		<main>

			<section>
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<figure>
							<a href=""><img src="{{ asset('uploads/'.setting()->logo) }}" class="img-responsive"></a>
						</figure>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="contact">
									<a href="{{ route('contact') }}"><button id="btn-contact">Liên Hệ</button></a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="search">
									<form action="{{ route('search') }}" method="post">
										<input type="search" id="search" name="keywords" >
										<a href="#" id="tag-a-search" title="Tìm kiếm"><span class="glyphicon glyphicon-search"></span></a>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section>
				<div id='cssmenu'>
					<ul class="menu-pr">
						<li><a href="{{ route('home.page') }}">Trang Chủ</a></li>
						@if(isset($menu))
						@foreach($menu as $k => $v)
						<li class='active'>
							<a href="{{  url($v['url']) }}">{{ $v['title'] }}</a>
							@if(isset($v['lstCat']))
							<ul class="has-children">

								@foreach($v['lstCat'] as $k1 => $v1)
								<li>
									<a href="{{  url($v1['url']) }}">{{ $v1['title'] }}</a>
								</li>
								@endforeach
								
								
							</ul>
							@endif
						</li>
						@endforeach
						@endif
						<li><a href='#' data-toggle="modal" data-target="#websiteLinkPopup">Liên Kết</a></li>
						<!-- Modal -->
						<div class="modal fade" id="websiteLinkPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h3 class="modal-title" id="popupTitle">Liên kết website</h3>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-3" id="khoa-item">
												<a href="#"><img class="icon" src="{{ asset('client-assets/images/68867072_n.png') }}" /></a>
												<p><a href="http://dangkyhoc.mta.edu.vn/dkmh/login.asp">Đăng Kí Học</a></p>
											</div>
											<div class="col-md-3" id="khoa-item">
												<a href="http://atc.mta.edu.vn/"><img class="icon" src="{{ asset('client-assets/images/007-settings.png') }}" /></a>
												<p><a href="http://atc.mta.edu.vn/">Trung Tâm Công Nghệ</a></p>
											</div>

											<div class="col-md-3" id="khoa-item">
												<a href="http://ttnn.mta.edu.vn/"><img class="icon" src="{{ asset('client-assets/images/002-hello-speech-bubble-handmade-chatting-symbol.png') }}" /></a>
												<p><a href="http://ttnn.mta.edu.vn/">Trung Tâm Ngoại Ngữ</a></p>
											</div>
											<div class="col-md-3" id="khoa-item">
												<a href="#"><img class="icon" src="{{ asset('client-assets/images/001-books-stack-of-three.png') }}" /></a>
												<p><a href="#">Thư Viện</a></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3" id="khoa-item">
												<a href="http://fit.mta.edu.vn/"><img class="icon" src="{{ asset('client-assets/images/009-computer.png') }}" /></a>
												<p><a href="http://fit.mta.edu.vn/">Khoa Công Nghệ Thông Tin</a></p>
											</div>
											<div class="col-md-3" id="khoa-item">
												<a href="#"><img class="icon" src="{{ asset('client-assets/images/005-flask.png') }}" /></a>
												<p><a href="http://hoalykythuat.mta.edu.vn/">Khoa Hóa Lí Kĩ Thuật</a></p>
											</div>
											<div class="col-md-3" id="khoa-item">
												<a href="http://sdh.mta.edu.vn/"><img class="icon" src="{{ asset('client-assets/images/004-sprout.png') }}" /></a>
												<p><a href="#">Phòng Sau Đại Học</a></p>
											</div>
											<div class="col-md-3" id="khoa-item">
												<a href="#"><img class="icon" src="{{ asset('client-assets/images/008-conveyor.png') }}" /></a>
												<p><a href="#">Khoa Cơ Khí</a></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3" id="khoa-item">
												<a href="http://itse.mta.edu.vn/"><img class="icon" src="{{ asset('client-assets/images/8036224_n.png') }}" /></a>
												<p><a href="http://itse.mta.edu.vn/">Viện Kĩ Thuật Công Trình Đặc Biệt</a></p>
											</div>
											<div class="col-md-3" id="khoa-item">
												<a href="#"><img class="icon" src="{{ asset('client-assets/images/003-television.png') }}" /></a>
												<p><a href="http://fre.mta.edu.vn/">Khoa Vô Tuyến Điện Tử</a></p>
											</div>
											<div class="col-md-3" id="khoa-item">
												<a href="#"><img class="icon" src="{{ asset('client-assets/images/aeroplane32.png') }}" /></a>
												<p><a href="#">Khoa Động Lực</a></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</ul>
				</div>
			</section>
			@yield('slider')
			@yield('content')
		</main>
	</div>
	<footer>
		<div class="container">
			<section id="infomation-footer">
				<div class="row">
					<div class="col-lg-4 col-md-4 sp-item">
						<div id="slides">
							<div class="item ft-item text-center">
								<strong>Học Viện Kĩ Thuật Quân Sự</strong><br>
								<p class="branch-name">Khu A - Hà Nội</p>
								<p>Địa chỉ :  236 Hoàng Quốc Việt, Bắc Từ Liêm, Hà Nội</p>
								<p>Điện thoại : {{ setting()->phone }}</p>
								<p>Email : {{ setting()->email }}</p>
							</div>
							<div class="item ft-item text-center">
								<strong>Học Viện Kĩ Thuật Quân Sự</strong><br>
								<p class="branch-name">Cơ sở Xuân Phương - Hà Nội</p>
								<p>Địa chỉ :  Hồng Mai, Phúc Diễn, Từ Liêm, Hà Nội</p>
								<p>Điện thoại : {{ setting()->phone }}</p>
								<p>Email : {{ setting()->email }}</p>
							</div>
							<div class="item ft-item text-center">
								<strong>Học Viện Kĩ Thuật Quân Sự</strong><br>
								<p class="branch-name">Trung tâm 125 - Vĩnh Phúc</p>
								<p>Địa chỉ :  Nguyễn Văn Linh, Liên Bảo, Vĩnh Yên, Vĩnh Phúc</p>
								<p>Điện thoại : {{ setting()->phone }}</p>
								<p>Email : {{ setting()->email }}</p>
							</div>
							<div class="item ft-item text-center">
								<strong>Học Viện Kĩ Thuật Quân Sự</strong><br>
								<p class="branch-name">Cơ sở 2 - TP. Hồ Chí Minh</p>
								<p>Địa chỉ :  71 Cộng Hòa, Phường 4, Tân Bình, Hồ Chí Minh</p>
								<p>Điện thoại : {{ setting()->phone }}</p>
								<p>Email : {{ setting()->email }}</p>
							</div>
							<a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
							<a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="row">
							<p id="menu-footer">Menu</p>
						</div>
						<div class="row menu-footer">
							
							<ul>
								<div class="col-lg-6 col-md-6"><li><a href="">Trang Chủ</a></li></div>
									@if(isset($menu))
									@foreach($menu as $k => $v)
									
								<div class="col-lg-6 col-md-6">	<li><a href="{{ $v['url'] }}">{{ $v['title'] }}</a></li></div>
									
									@endforeach
									@endif
									<div class="col-lg-6 col-md-6"><li><a href='#' data-toggle="modal" data-target="#websiteLinkPopup">Liên Kết</a></li></div>
								</ul>
							</div>
						</div>
			
										<div class="col-lg-4 col-md-4">
						<div class="row ">
							<p id="fb-footer">Mạng xã hội</p>
						</div>
												<div class="row menu-footer">
							<div class="fb-page" data-href="{{ setting()->facebook }}" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="{{ setting()->facebook }}" class="fb-xfbml-parse-ignore"><a href="{{ setting()->facebook }}">Học Viện Kĩ Thuật Quân Sự</a></blockquote></div>
						</div>
					</div>
				</div>
				<div class="row" id="license">
					<p>Bản quyền thuộc về trường Học viện Kỹ Thuật Quân Sự</p>
				</div>
			</section>
			<section>
				<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
			</section>
		</div>
		<script src="{{ asset('client-assets/js/jquery.slides.min.js') }}"></script>
		<script>
			$(function() {
				$('#slides').slidesjs({
					width: 940,
					height: 528,
					navigation: false
				});
			});
		</script>
	</footer>
</body>
</html>




