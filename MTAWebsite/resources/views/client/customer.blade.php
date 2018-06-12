@extends('layouts.client')
@section('content')
<div class="container">
    <div class=" style1" id="content-url"><a href="{{ route('home.page') }}">Trang chủ</a> <span class="style2">» Khách hàng</span></div>
    <div class="main-site">
    


<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

-->
<!--  <script type="text/javascript" src="lib1/jquery-1.10.1.min.js"></script>
-->
<!-- include Cycle plugin -->


 @include('sidebar.left') 
       <div id="content-right2">
              <div class="tab-chuan">NHẬN XÉT CỦA KHÁCH HÀNG VỀ SẢN PHẨM HỒ HOÀN CẦU</div>
          <div class="bg-ct-right">
            @foreach($customers as $customer)
                        <div class="item_khachhang"><img src="{{ asset('uploads/156x156-'.$customer->images) }}" />
                        
                          <a style=" display:block" href="" target="_blank">{{ $customer->title }}</a>
                            <span >
                              {!! $customer->content !!}
                            </span>
                        </div>
            @endforeach()
            {{ $customers->links() }}               
          </div>
      </div>
      
        </div>
      
  </div>
@endsection