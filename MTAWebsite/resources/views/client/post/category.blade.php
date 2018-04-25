@extends('layouts.client')
@section('content')
     <div class="right">
<div class="content">
    <div class="tieude_phai"><div>{{ $cate->title }}</div><span></span></div>
    <div class="wap_box_new">
      @foreach($ctpost as $post)
                    <div class="box_news">
                <a href="{{ $post->getpost->getSlug() }}" title="{{ $post->getpost->title }}"><img src="{{ asset(UPLOAD_IMAGE_POST.$post->getpost->images) }}" alt="{{ $post->getpost->title }}" /></a>      
                <a href="{{ $post->getpost->getSlug() }}" title="{{ $post->getpost->title }}"><h3>{{ $post->getpost->title }}</h3></a>
                <div class="mota"><h2>{{ $post->getpost->Seodesc }}</h2>
                </div>  
                <div class="clear"></div>         
            </div><!---END .box_new-->
    @endforeach
            </div><!---END .wap_box_new-->
    <div class="clear"></div>
    <div class="phantrang">{{ $ctpost->links() }}</div>
</div><!---END .box_container--> 
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