@extends('layouts.client')
@section('slider')
		<section>
                {!! setting()->map !!}
         </section>
@endsection
@section('content')


            <section>
                <div class="row">
                    <div class="col-lg-12 col-md-12 path">
                        <a href="{{ route('home.page') }}">Trang Chủ</a><span> / </span><a>Liên Hệ</a>
                    </div>
                </div>
            </section>
			 @if(session('message'))
              <script type="text/javascript">
              	alert('Cảm ơn bạn đã liên hệ với chúng tôi');
              </script>      
              @endif
            <section>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                    	@foreach($faculty as $c)
                        <div class="row contact-department">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <figure>
                                    <a href=""><img src="{{ asset('uploads/'.$c->images) }}"></a>
                                </figure>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <header class="department-detail">
                                    <h3 class="department-name">
                                      {{ $c->title }}
                                    </h3>
                                    <p><span class="glyphicon glyphicon-home"></span>{{ $c->address }}</p>
                                    <p><span class="glyphicon glyphicon-phone-alt"></span>{{ $c->phone }}</p>
                                    <p><span class="glyphicon glyphicon-envelope"></span>{{ $c->email }}</p>
                                </header>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <form class="form-message" action="{{ route('contact.save') }}" method="post">
                            <div class="form-group">
                                <p>Nếu bạn cần hỗ trợ, hãy gửi thông tin vào biểu mẫu dưới đây. Chúng tôi sẽ cố gắng phản hồi sớm nhất!</p>
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" id="Name" required="required" placeholder="Họ tên (*)" value="">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="Email" required="required" placeholder="Email (*)" value="">
                            </div>
                            <div class="form-group">
                                <input type="tel" name="phone" id="PhoneNumber" placeholder="Số điện thoại" value="">
                            </div>
                            <div class="form-group">
                                <textarea id="Message" name="Message" required="required" placeholder="Thông điệp (*)" rows="4"></textarea>
                            </div>
                            <button type="submit" id="Send">Gửi</button>
                        </form>
                    </div>
                </div>
            </section>
@endsection
@section('title')
    Liên hệ
@endsection

@section('description')

@endsection