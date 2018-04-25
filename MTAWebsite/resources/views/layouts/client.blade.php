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
    <script type="text/javascript" src="/MTA-Website/MTAWebsite/Script/jquery.devrama.slider.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/css/mta.website.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/css/slider.all.css') }}">
    <script type="text/javascript" src="{{ asset('client-assets/js/mta.website.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client-assets/js/slider.all.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('client-assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client-assets/css/owl.theme.default.min.css') }}">
    <script src="{{ asset('client-assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client-assets/js/jquery.mousewheel.min.js') }}"></script>

</head>
<body>
    <div class="container">
        <main>

            <section>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <figure>
                            <a href=""><img src="{{ asset('client-assets/images/logo.png') }}" class="img-responsive"></a>
                        </figure>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="contact">
                                    <button id="btn-contact"><a href="/MTA-Website/MTAWebsite/Views/Contact/Contact.html">Liên Hệ</a></button>
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
                    <a href="/MTA-Website/MTAWebsite/Views/Home/Home.html" class="active">Trang Chủ</a>
                    <a href="/MTA-Website/MTAWebsite/Views/About/About.html">Giới Thiệu</a>
                    <a href="/MTA-Website/MTAWebsite/Views/News/News.html">Tin Tức</a>
                    <a href="/MTA-Website/MTAWebsite/Views/Admission/Admission.html">Tuyển Sinh</a>
                    <a href="/MTA-Website/MTAWebsite/Views/Student/Student.html">Sinh Viên</a>
                    <a href="/MTA-Website/MTAWebsite/Views/Education/Education.html">Đào Tạo</a>
                    <a href="/MTA-Website/MTAWebsite/Views/Research/Research.html">Nghiên Cứu</a>
                    <a href="/MTA-Website/MTAWebsite/Views/Contract/Contract.html">Hợp Tác</a>
                    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
                </div>
            </section>
            @yield('slider')
            @yield('content')




        </main>
    </div>
</body>
</html>




