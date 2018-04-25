@extends('layouts.client')
@section('content')
     <div class="right">
<div class="box_container">
    <div class="content">   
      <div class="tieude_phai"><div>{{ $post->title }}</div><span></span></div>
        {!! $post->content !!}             
    </div><!--.content-->
</div><!--.box_container-->
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