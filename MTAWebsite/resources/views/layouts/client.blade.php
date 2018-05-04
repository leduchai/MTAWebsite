<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chủ</title>
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
    <script src="{{ asset('client-assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client-assets/js/jquery.mousewheel.min.js') }}"></script>
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
                                    <input type="search" id="search" name="Search">
                                    <a href="#" id="tag-a-search" title="Tìm kiếm"><span class="glyphicon glyphicon-search"></span></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </section>

            <section>
                <div class="topnav" id="myTopnav">
                    <a href="{{ route('home.page') }}" class="active">Trang Chủ</a>
                    @if(isset($menu))
                    @foreach($menu as $k => $v)
                    <a href="{{ $v['url'] }}">{{ $v['title'] }}</a>
                    @if(isset($v['lstCat']))
                    @foreach($$v['lstCat'] as $k1 => $v1)
                    @if(isset($v1['ltsSubCat']))
                    @foreach($v1['ltsSubCat'] as $k2 => $v2)

                    @endforeach
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    @endif
                    
                    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
                </div>
            </section>
            @yield('slider')
            @yield('content')
        </main>
    </div>
    <footer>
        <div class="container">
            <section>
                <div class="row">
                    <div class="col-md-4 sp-item">
                        <div id="slides">
                          <div class="item ft-item text-center">
                            <strong>Học Viện Kĩ thuật quân sự</strong><br>
                            <p>Khu A - Hà Nội</p>
                            <p>Địa chỉ :  236 Hoàng Quốc Việt, Bắc Từ Liêm, Hà Nội</p>
                            <p>Điện thoại : {{ setting()->phone }}</p>
                            <p>Email : {{ setting()->email }}</p>
                        </div>
                        <div class="item ft-item text-center">
                            <strong>Học Viện Kĩ thuật quân sự</strong><br>
                            <p>Cơ sở Xuân Phương - Hà Nội</p>
                            <p>Địa chỉ :  Hồng Mai, Phúc Diễn, Từ Liêm, Hà Nội</p>
                            <p>Điện thoại : {{ setting()->phone }}</p>
                            <p>Email : {{ setting()->email }}</p>
                        </div>
                        <div class="item ft-item text-center">
                            <strong>Học Viện Kĩ thuật quân sự</strong><br>
                            <p>Trung tâm 125 - Vĩnh Phúc</p>
                            <p>Địa chỉ :  Nguyễn Văn Linh, Liên Bảo, Vĩnh Yên, Vĩnh Phúc</p>
                            <p>Điện thoại : {{ setting()->phone }}</p>
                            <p>Email : {{ setting()->email }}</p>
                        </div>
                        <div class="item ft-item text-center">
                            <strong>Học Viện Kĩ thuật quân sự</strong><br>
                            <p>Cơ sở 2 - TP. Hồ Chí Minh</p>
                            <p>Địa chỉ :  71 Cộng Hòa, Phường 4, Tân Bình, Hồ Chí Minh</p>
                            <p>Điện thoại : {{ setting()->phone }}</p>
                            <p>Email : {{ setting()->email }}</p>
                        </div>
                        <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
                        <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
                    </div>
                </div>
                <div class="col-md-8 sp-item">
                    <div class="row">
                        <div class="col-md-8">
                            <strong>Liên kết website</strong><br>
                            <div class="row">
                                <?php $k=1;?>
                                @foreach($faculty as $f)
                                @if($k<11)
                                <div class="col-md-6"><p><a href="{{ $f->url }}">{{ $f->title }}</a></p></div>
                                @endif
                                <?php $k++;?>
                                @endforeach
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <strong>Facebook</strong><br>
                            <div class="fb-page" data-href="{{ setting()->facebook }}" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="{{ setting()->facebook }}" class="fb-xfbml-parse-ignore"><a href="{{ setting()->facebook }}">Học Viện Kĩ Thuật Quân Sự</a></blockquote></div>
                        </div>
                    </div>
                </div>
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




