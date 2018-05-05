@extends('layouts.client')
@section('slider')
    @if(count(banners('sv')) >0)
     <section>
                <figure>
                    <?php $h =1 ?>
                     @foreach(banners('sv') as $banner)
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
            @elseif($page->index==2)
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
                        <a href="" class="view-more">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
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
                    <?php $i=1;?>
                    @foreach($page->childss() as $pa)
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <figure class="figure">
                            <img src="{{ asset(UPLOAD_IMAGE_PAGE2.$pa->images) }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                            <figcaption class="figure-caption-category"><a href="{{ $pa->getSlug() }}">{{ $pa->title }}</a></figcaption>
                        </figure>
                        <header>
                            <p class="note">{{ $pa->seo_content }}</p>
                        </header>
                    </div>
                    <?php $i++;?>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-11 col-md-11 a-line">
                        <hr>
                    </div>
                    <div class="col-lg-1 col-md-1 view-more">
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
                    @foreach($page->childss() as $pa)
                    <div class="col-lg-4 col-md-4">
                        <figure class="figure">
                            <img src="{{ asset(UPLOAD_IMAGE_PAGE2.$pa->images) }}" class="img-responsive figure-img img-fluid rounded" alt="{{ $pa->title }}">
                            <figcaption class="figure-caption-category"><a href="{{ $pa->getSlug() }}">{{ $pa->title }}</a></figcaption>
                        </figure>
                        <header>
                            <p class="note-category">{{ $pa->seo_content }}</p>
                        </header>
                        <a href="{{ $pa->getSlug() }}" class="view-more">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                    </div>
                    @endforeach
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