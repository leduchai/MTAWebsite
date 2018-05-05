<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="text/css" href="{{ asset('admin-assets/dist/img/images.jpg') }}">
  <link rel="stylesheet" href="{{asset('admin-assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-assets/css/bootstrap-toggle.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-assets/bower_components/datatables.net-bs/css/jquery.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-assets/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-assets/dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/dist/css/style.css')}}">
  <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
  <script src="{{asset('admin-assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('admin-assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin-assets/dist/js/bootstrap-toggle.min.js')}}"></script>
  <script src="{{asset('admin-assets/bower_components/datatables.net-bs/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin-assets/dist/js/adminlte.min.js')}}"></script>
  <script src="{{asset('admin-assets/dist/js/demo.js')}}"></script>
  <script src="{{ asset('tinymce/jquery.tinymce.min.js') }}"></script>
  <script type="text/javascript">
    tinymce.init({
    selector: "textarea",theme: "modern",height: 350,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
   image_advtab: true ,
   external_filemanager_path:"{{ url('tinymce/filemanager') }}/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : "{{ asset('tinymce/filemanager/plugin.min.js') }}"}
   });
  </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="../../index2.html" class="logo">
      <span class="logo-mini"><b>M</b>TA</span>
      <span class="logo-lg"><b>MTA</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset(\Auth::user()->images)}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ \Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="{{asset(\Auth::user()->images)}}" class="img-circle" alt="User Image">

                <p>
                  {{ \Auth::user()->name }}
                  
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('profile.form') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
 
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset(\Auth::user()->images)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ \Auth::user()->name }}</p>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="{{ route('admin') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-word-o"></i>
            <span>Bài Viết</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('post.list') }}"><i class="fa fa-list-ul"></i>Tất cả bài viết</a></li>
            <li><a href="{{ route('post.create') }}"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a></li>
            <li><a href="{{ route('cate.post.list') }}"><i class="glyphicon glyphicon-plus"></i> Chuyên mục</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Thành viên</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user.list') }}"><i class="fa fa-list-ul"></i>Tất cả người dùng</a></li>
            <li><a href="{{ route('user.create') }}"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-film"></i>
            <span>Banner</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('banner.list') }}"><i class="fa fa-list-ul"></i>Danh sách</a></li>
             <li><a href="{{ route('banner.create') }}"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-duplicate"></i><span>Trang</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('page.list')}}"><i class="fa fa-list-ul"></i>Tất cả</a></li>
            <li><a href="{{route('page.create')}}"><i class="glyphicon glyphicon-plus"></i>Thêm mới</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-menu-hamburger"></i><span>Menu</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="{{route('menu')}}"><i class="fa fa-list-ul"></i>Tất cả</a></li>
          </ul>
        </li> 
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-envelope"></i><span>Liên hệ</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('contact.list')}}"><i class="fa fa-list-ul"></i>Danh sách</a></li>
            

          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i><span>Tùy chọn</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('setting') }}"><i ></i>Xem</a></li>
            <li><a href="{{ route('faculty.list') }}"><i ></i>Phòng</a></li>
            <li><a href="{{ route('contract.list') }}"><i ></i>Hợp tác</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
      <div class="alert alert-dange ajax-error" role="alert"><span
        style="font-weight: bold; font-size: 18px;">Thông báo!</span><br>
        <div class="ajax-error-ct"></div>
      </div>
      <div class="alert ajax-success" role="alert"
      style="width: 350px;background: rgba(92,130,79,0.9); display:none; color: #fff;"><span
      style="font-weight: bold; font-size: 18px;">Thông báo!</span>
      <br>
      <div class="ajax-success-ct"></div>
    </div>
    @yield('section');
  </div>
  <div class="control-sidebar-bg"></div>
</div>

@yield('js')
<script src="{{asset('admin-assets/dist/js/ajax.js')}}"></script>
</body>
</html>
