@extends('layouts.client')
@section('content')
     <div class="right">
<script type="text/javascript" src="{{ asset('client-assets/js/cloudzoom.js') }}"></script>
<link href="{{ asset('client-assets/css/cloudzoom.css') }}" type="text/css" rel="stylesheet" /> 
<script type = "text/javascript">
  CloudZoom.quickStart();
  $(document).ready(function(e) {
    $('.slick .cloudzoom-gallery').click(function(){
      var url_hinh = $(this).parent('a').attr('href');
      $('.images_main').attr('href',url_hinh);
      $('.images_main .cloudzoom').attr('data-cloudzoom',"zoomSizeMode:'image',autoInside: 550 ,zoomImage:"+url_hinh);
    });
  });
</script>

<!-- slick -->
<link rel="stylesheet" type="text/css" href="{{ asset('client-assets/css/slick.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('client-assets/css/slick-theme2.css') }}"/>
<script type="text/javascript" src="{{ asset('client-assets/js/slick.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.slick').slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 1,
      draggable:true,
      centerMode:false,  //item nằm giữa
    });
  });
</script>
<!-- slick -->
        
<script language="javascript">
  function addtocart(pid){
    document.form1.productid.value=pid;
    document.form1.command.value='add';
    document.form1.submit();
  }
</script>
<form name="form1" action="index.php">
  <input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>

<!-- Begin Jquery tabs-->
<link href="{{ asset('client-assets/css/tab.css') }}" type="text/css" rel="stylesheet" />
<script language="javascript" type="text/javascript">
  $(document).ready(function(){
    $('#tabs div#tab2').hide();
    $('#tabs div#tab3').hide();
    $('#tabs div:first').show();
    $('#tabs ul li:first').addClass('active');
    
    $('#tabs ul li').click(function(){
      $('#tabs ul li').removeClass('active');
      $(this).addClass('active');
      var currentTab = $(this).attr('type'); 
      $('#tabs div#tab1').hide();
      $('#tabs div#tab2').hide();
      $('#tabs div#tab3').hide();
      $(currentTab).show();
      return false;
    });   
  });
</script>
<!--End Jquery tabs-->

<div class="content">
<div class="tieude_phai"><div>{{ $product->title }}</div> <span></span></div>
  <div class="clear"></div>
<div class="box_containerlienhe">
  <div class="chitietsanpham">
      
        <div class="zoom_slick">    
         <a class="swipebox images_main" rel="group_slick" href="{{ asset(UPLOAD_IMAGE_PRODUCT.$product->images) }}" title="{{ $product->title }}">
         <img class='cloudzoom' src="{{ asset(UPLOAD_IMAGE_PRODUCT.$product->images) }}" data-cloudzoom ="zoomSizeMode:'image',autoInside: 550 ,zoomImage: '{{ asset(UPLOAD_IMAGE_PRODUCT.$product->images) }}' " ></a>
         
                  
        </div><!--.zoom_slick--> 
        
        <ul class="product_info">
                <li style="margin-bottom:7px;"><a class="addfont" style="color:#1d8d45; font-weight:normal; font-size:20px;">{{ $product->title }}</a></li>
                 
                 
                 <li><b>Giá: </b><span style="color:#F00;">Liên hệ</span></b></li>            
               
                <div class="addthis_native_toolbox"></div>
                
                 <div class="clear"></div>           
        </ul>
              
        <div class="clear"></div>
        <div id="tabs">   
        <ul id="ultabs">         
            <li type="#tab1">Chi tiết sản phẩm</li>
            <li type="#tab2">Đánh giá</li> 
        </ul>
        <div style="clear:both"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
              {!! $product->content !!}
            
            </div> 
            
            <div id="tab2">
              <div class="fb-comments" data-href="localhost:8000/{{ $product->getSlug() }}" data-width="818" data-numposts="5"></div>
            </div>  
            
        </div><!---END #content_tabs-->
    </div><!---END #tabs--> 
        
  </div>
<div class="right_content2">
 <!--jcau-->    
 <link rel="stylesheet" type="text/css" href="{{ asset('client-assets/css/jcarousel.css') }}" media="screen" />
 <script type="text/javascript" src="{{ asset('client-assets/js/jquery.jcarousel.js') }}"></script><!--jquery ch?y hình ngan t?ng nhít m?t-->
 <script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({<!--th? ul id="mycarousel" s? du?c th?c thi-->
      wrap: 'circular',
      auto:1,
      scroll: 1
    });    
  });
</script>
<!--jcau--> 
<div class="tieude_phai">
  <div>ĐỐI TÁC</div>
</div>
<div class="right_doitac">
  <ul id="mycarousel" class="jcarousel-skin-tango" style="overflow:hidden;">
    @foreach($customer as $customer)
   <li>
    <div class="pic"><a href="" title="" target="_blank"><img src="{{ asset('uploads/192x125-'.$customer->images) }}"  style="height:123px; width:190px; border:1px #ccc solid;" /></a></div>
  </li>
  @endforeach
  </ul>


</div>  
</div>
</div><!--end right-->
@endsection