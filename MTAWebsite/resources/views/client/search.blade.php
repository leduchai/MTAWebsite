@extends('layouts.client')
@section('content')
                           <section>
                <div class="row">
                    <div class="col-lg-12 col-md-12 path">
                        Tìm kiếm với từ khóa "{{ $keywords }}"
                        <p id="sum-result">{{ count($ctposts) }}</p>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col-lg-9 col-md-9">
                      @foreach($ctposts as $p2)
                        <div class="row post-item">
                            <div class="col-lg-3 col-md-3 text-center">
                            @if(!empty($p2->images))
                             <a href="{{ url($p2->link()) }}"><img src="{{ asset(UPLOAD_IMAGE_POST.$p2->images) }}" class="img-responsive figure-img img-fluid rounded" alt="{{ $p2->title }}"></a>
                            @else
                            <a href="{{ url($p2->link()) }}"><span class="glyphicon glyphicon-bell bell"></span</a>
                            @endif
                            </div>
                            <div class="col-lg-9 col-md-9 ">
                              <figure class="figure">
                                 <h3 class="post-title"><a href="{{ $p2->link() }}">{{ $p2->title }}</a></h3>
                                    <p class="note-category">{{ $p2->seo_content }}</p>
                                    <span class="date">{{ $p2->created_at }}</span>
                                </figure>
                            </div>
                        </div>
                      @endforeach
                      {{ $ctposts->links() }}
                    </div>
                    <div class="col-lg-3 col-md-3">
                        @include('layouts.sidebar')
                    </div>
                </div>
            </section>
@endsection
@section('title')
Kết quả tìm kiếm ...
@endsection
