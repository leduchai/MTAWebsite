@extends('layouts.client')
@section('slider')
    @if(count(banners('nc')) >0)
     <section>
                <figure>
                    <?php $h =1 ?>
                     @foreach(banners('nc') as $banner)
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
                        <a>Trang Chủ</a><span> / </span><a>{{ $pages->title }}</a>
                    </div>
                </div>
            </section>
            
            <section>
                <div class="row title-single">
                    <div class="col-lg-12 col-md-12">
                        <h2 class="title-single">{{ $pages->title }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <p class="text-description">{!! $pages->content !!}</p>
                    </div>
                </div>
            </section>
            @foreach($pages->childss() as $page)
            @if($page->index==1)
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

                            <p class="detail-description">
                                {{ $page->seo_content }}
                            </p>
                        </header>
                        <a href=" {{  url($page->getSlug()) }}" class="view-more">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                    </div>
                </div>
            </section>
            @elseif($page->index==2)
            <section>
                <div class="row title-single">
                    <div class="col-lg-12 col-md-12">
                         <h2 class="title-single">{{ $page->title }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 description-area">
                        <header class="description-header">
                            <p class="detail-description">
                                {{ $page->seo_content }}
                            </p>
                        </header>
                        <a href="{{  url($page->getSlug()) }}" class="view-more">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <a href=""><img alt="" src="{{ asset(UPLOAD_IMAGE_PAGE1.$page->images) }}" class="img-responsive"> </a>
                    </div>
                </div>
            </section>
            @elseif($page->index==3)
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
                            <img src="{{ asset(UPLOAD_IMAGE_PAGE2.$pa->images) }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                            <figcaption class="figure-caption-category"><a href="{{  url($pa->getSlug()) }}">{{ $pa->title }}</a></figcaption>
                        </figure>
                        <header>
                            <p class="note">{{ $pa->seo_content }}</p>
                        </header>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 a-line">
                        <hr>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 view-more">
                        <a href="{{  url($page->getSlug()) }}" class="view-more-line">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
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
                <div class="row" id="slide-contract">

                    <div class="owl-carousel owl-theme">
                        @foreach($page->childss() as $pa)
                        <div class="item">
                           <img src="{{ asset(UPLOAD_IMAGE_PAGE2.$pa->images) }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                            <figcaption class="figure-caption-category"><a href="{{  url($pa->getSlug()) }}">{{ $pa->title }}</a></figcaption>
                        </div>
                        @endforeach
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