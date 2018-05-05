@extends('layouts.client')
@section('slider')
@if(count(banners('ht')) >0)
     <section>
                <figure>
                    <?php $h =1 ?>
                     @foreach(banners('ht') as $banner)
                     @if($h==1)
                        <img src="{{ asset('uploads/'.$banner->images) }}" class="img-responsive" alt="" />
                    @endif
                    @endforeach
                </figure>
                
    </section>
@endif
@endsection
@section('content')


<section>
    <div class="row">
        <div class="col-lg-12 col-md-12 path">
            <a href="{{ route('home.page') }}">Trang Chủ</a><span> / </span><a>{{ $pages->title }}</a>
        </div>
    </div>
</section>

<section>
    <div class="row title-single">
        <div class="col-lg-12 col-md-12">
            <h2 class="title-single">Giới Thiệu</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <p class="text-description">{!! $pages->content !!}</p>
        </div>
    </div>
</section>
@foreach($pages->childss() as $page)
@if($page->index == 1)
<section>
 
    <div class="row title-single">
        <div class="col-lg-12 col-md-12">
            <h2 class="title-single">{{ $page->title }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <a href=""><img alt="" src="{{ asset(UPLOAD_IMAGE_PAGE1.$page->images) }}" class="img-responsive"> </a>
        </div>
        <div class="col-lg-6 col-md-6 description-area">
            <header class="description-header">
                <h3 class="title-description">
                    {{ $page->title }}
                </h3>
                <p class="detail-description">
                    {{ $page->seo_content }}
                </p>
            </header>
            <a href="{{ $page->getSlug() }}" class="view-more">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
        </div>
    </div>
</section>
@else
<section class="background-gray">
    <div class="row title-single">
        <div class="col-lg-12 col-md-12">
            <h2 class="title-single">{{ $page->title }}</h2>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-6 col-md-6 description-area">
            <header class="description-header">
                <h3 class="title-description">
                    {{ $page->title }}
                </h3>
                <p class="detail-description">
                    {{ $page->seo_content }}
                </p>
            </header>
            <a href="{{ $page->getSlug() }}" class="view-more">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
        </div>
        <div class="col-lg-6 col-md-6">
            <a href=""><img alt="" src="{{ asset(UPLOAD_IMAGE_PAGE1.$page->images) }}" class="img-responsive"> </a>
        </div>
    </div>
</section>

@endif
@endforeach
<section class="background-gray">
    <div class="row title-single">
        <div class="col-lg-12 col-md-12">
            <h2 class="title-single">Liên Kết</h2>
        </div>
    </div>
    <div class="row" id="slide-contract">
        <div class="owl-carousel owl-theme">
            @foreach($contracts as $contract)
            <div class="item">
                <a href="{{ $contract->url }}"><img src="{{ asset('uploads/'.$contract->images) }}" class="img-responsive" title="{{ $contract->title }}" /></a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
@section('title')
{{$pages->seo_title}}
@endsection

@section('description')
{{$pages->seo_content}}
@endsection