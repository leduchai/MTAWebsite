@extends('layouts.client')
@section('slider')
@if(count(banners('ts')) >0)
                <section>
                <div class="example-using-css">
                    @foreach(banners('ts') as $banner)
                    <img data-lazy-src="{{ asset('uploads/'.$banner->images) }}" />
                    
                    @endforeach
                </div>
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
            <h2 class="title-single">Tin Tức</h2>
        </div>
    </div>
    <div class="row">
     <?php $k = 1; ?>
     @foreach(showpost(10)->getpost() as $p2)
     @if($k<5)
     <div class="col-lg-3 col-md-3 col-sm-6">
        <figure class="figure">
            <a href="{{  url($p2->getSlug()) }}"><img src="{{ asset(UPLOAD_IMAGE_POST.$p2->images) }}" class="img-responsive figure-img img-fluid rounded" alt="{{ $p2->title }}"></a>
            <figcaption class="figure-caption-category"><a href="{{  url($p2->getSlug()) }}">{{ $p2->title }}</a></figcaption>
        </figure>
        <header>
            <p class="note-category">{{ $p2->seo_content }}</p>
        </header>
    </div>
    @endif
    <?php $k++; ?>
    @endforeach


</div>
<div class="row view-more-area">
    <div class="col-lg-10 col-md-10 col-sm-10 a-line">
        <hr>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 view-more">
        <a href="{{  url(showpost(10)->getSlug()) }}" class="view-more-line">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
    </div>
</div>
</section>



<section class="background-gray">
    <div class="row title-single">
        <div class="col-lg-12 col-md-12">
            <h2 class="title-single">Thông Báo</h2>
        </div>
    </div>
    <div class="row">
        <?php $i =1; ?>
        @foreach(showpost(9)->getpost() as $p)
        @if($i < 2)
        <div class="col-lg-6 col-md-6">

            <figure class="figure">
                <a href="{{  url($p->link()) }}"><img src="{{ asset(UPLOAD_IMAGE_POST.$p->images) }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure."></a>
                <figcaption class="figure-caption-category"> <a href="{{ $p->link() }}">{{ $p->title }} </a></figcaption>
            </figure>

            <header>
                <p class="note-category">{{ $p->seo_content }}</p>
            </header>
        </div>
        @endif
        <?php $i++; ?>
        @endforeach
        <div class="col-lg-6 col-md-6">
            <ul class="highlight-news">
                <?php $j = 1; ?>
                @foreach(showpost(9)->getpost() as $p1)
                @if($j >= 2 && $j < 7)
                <li><a href="{{  url($p1->link()) }}">{{ $p1->title }}</a> </li>
                @endif
                <?php $j++; ?>
                @endforeach
            </ul>
            <a href="{{  url(showpost(9)->getSlug()) }}" class="view-more-right">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
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

        @foreach($page->childss() as $pa)
        <div class="col-lg-3 col-md-3 col-sm-6">
            <figure class="figure">
                <a href="{{  url($pa->getSLug()) }}"><img src="{{ asset(UPLOAD_IMAGE_PAGE2.$pa->images) }}" class="img-responsive figure-img img-fluid rounded" alt="{{ $pa->title }}"></a>
                <figcaption class="figure-caption-category"><a href="{{  url($pa->getSLug()) }}">{{ $pa->title }}</a></figcaption>
            </figure>
            <header>
                <p class="note-category">{{ $pa->seo_content }}</p>
            </header>
        </div>
        @endforeach
    </div>
    <div class="row view-more-area">
        <div class="col-lg-10 col-md-10 col-sm-10 a-line">
            <hr>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 view-more">
            <a href="{{  url($page->getSlug()) }}" class="view-more-line">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
        </div>
    </div>
</section>
@else
            <section>
            <div class="row title-single">
                    <div class="col-lg-12 col-md-12">
                        <h2 class="title-single">{{ $page->title }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 background-over">
                        <header class="description-header">
                            <h3 class="title-description">
                                {{ $page->title }}
                            </h3>
                            <p class="detail-description">
                               {{ $page->seo_content }}
                            </p>
                            <a href="{{  url($page->getSlug()) }}" class="view-more">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                        </header>
                        <figure class="figure">
                            <img src="{{ asset(UPLOAD_IMAGE_PAGE.$page->images) }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                        </figure>
                    </div>
                </div>
            </section>
@endif
@endforeach
@endsection
@section('title')
{{$pages->seo_title}}
@endsection

@section('description')
{{$pages->seo_content}}
@endsection