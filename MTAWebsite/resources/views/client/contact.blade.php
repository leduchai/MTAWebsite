@extends('layouts.client')
@section('content')
<div class="container">
      <div class="main-site">
              <div class="tab-chuan">Liên Hệ</div>
                  <div class="bg-ct-right">
                  <div class="contact-l">         
                   <p><strong>{{ setting()->slogan }}</strong></p>
                  <p>{{ setting()->Description }}<br />Địa chỉ: {{ setting()->slogan }}<br />Điện thoại: {{ setting()->phone }}<br />Email: {{ setting()->email }} </p><br />
                     <div class="contact-form">
        <div class="tab-chuan2">GỬI THÔNG TIN</div>          
                     <form method="post" name="frm" action="{{ route('contact.save') }}">
                       @if(session('message'))
                    <script type="text/javascript">
                      alert('Cảm ơn bạn đã liên hệ với chúng tôi');
                    </script>
                @endif
                                <ul id="form-inner">
                                    <li>
                                        <div class="columnright">
                                          <input required type="text" class="maxchar"  name="name" placeholder="Họ và tên..." />
                                        </div>
                                      <div class="clearb"></div>
                                    </li>
                                    <li>
                                      <div class="columnright"><input required type="text" class="maxchar"  name="address" placeholder="Địa chỉ..."/>
                                      </div>
                                        <div class="clearb"></div>
                                    </li>
                                    <li>
                                        <div class="columnright"><input required type="email" class="maxchar" name="email" placeholder="Nhập email..." /></div>
                                        <div class="clearb"></div>
                                    </li>
                                    <li>
                                        <div class="columnright"><input required type="text" class="maxchar"  name="phone" placeholder="Nhập số điện thoại..." /></div>
                                        <div class="clearb"></div>
                                    </li>
                            
                                    <li>
                                        <div class="columnright"><textarea name="content" rows="3" class="maxchar textarea"  placeholder="Nhập nội dung yêu cầu..."></textarea>
                                        </div><div class="clearb"></div>    
                                    </li>
                                    
                                    
                                     <li>
                                        <input type="submit" class="button" value="Gửi">
                                
                                      </li>
                                </ul>
                                
                                
                            </form>
                        </div>  
                    <div class="clearb"></div>
                  </div>
                  <div class="contact-r"><div class="googlemap">
                    {!! setting()->map !!}
                </div></div>
             </div>
      </div>
  </div>
@endsection