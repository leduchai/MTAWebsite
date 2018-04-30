@extends('layouts.client')
@section('slider')
    @include('layouts.slider')
@endsection
@section('content')
            <section>
                <div class="row">
                    <div class="col-lg-12 col-md-12 path">
                        <a>Trang Chủ</a><span> / </span><a>{{ $pages->title }}</a>
                    </div>
                </div>
            </section>

            <?php $i = 1;?> 
            @foreach($pages->childss() as $page)
            @if($i==1)
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
                            <a href="{{ $page->getSlug() }}" class="view-more">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                        </header>
                        <figure class="figure">
                            <img src="{{ asset(UPLOAD_IMAGE_PAGE.$page->images) }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                        </figure>
                    </div>
                </div>
            </section>
            @elseif($i==2)
            <section>
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
                        <a href=""><img alt="" src="{{ asset('client-assets/images/medium-image-2.png') }}" class="img-responsive"> </a>
                    </div>

                </div>
            </section>
            @elseif($i==3)
            <section>
                <div class="row title-single">
                    <div class="col-lg-12 col-md-12">
                        <h2 class="title-single">{{ $page->title }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 background-over">
                        <header class="description-header" id="color-black">
                            <h3 class="title-description">
                                {{ $page->title }}
                            </h3>
                            <p class="detail-description">
                                 {{ $page->seo_content }}
                            </p>
                            <a href="{{ $page->getSlug() }}" class="view-more">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                        </header>
                        <figure class="figure">
                            <img src="{{ asset(UPLOAD_IMAGE_PAGE.$page->images) }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                        </figure>
                    </div>
                </div>
            </section>
            @elseif($i==4)
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
                            <img src="{{ asset(UPLOAD_IMAGE_PAGE.$pa->images) }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                            <figcaption class="figure-caption-category">{{ $pa->title }}</figcaption>
                        </figure>
                        <header>
                            <p class="note">{{ $pa->seo_content }}</p>
                        </header>
                    </div>
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
            @endif
            <?php $i++; ?>
            @endforeach
            <section class="background-gray">
                <div class="row">
                     <?php $j = 1;?> 
            @foreach($pages->childss() as $p1)
            @if($j>4)
                    <div class="col-lg-6 col-md-6">
                        <div class="row title-single">
                            <div class="col-lg-12 col-md-12">
                                <h2 class="title-single">Cơ Cấu Tổ Chức</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <figure class="figure">
                                    <img src="{{ asset(UPLOAD_IMAGE_PAGE.$p1->images) }}" class="img-responsive figure-img img-fluid rounded" alt="{{ $p1->title }}">
                                    <figcaption class="figure-caption-category">{{ $p1->title }}</figcaption>
                                </figure>
                                <header>
                                    <p class="note-category">{{ $p1->seo_ttile }}</p>
                                </header>
                                <a href="{{ $p1->getSlug() }}" class="view-more">Xem thêm<span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span></a>
                            </div>
                        </div>
                    </div>
                     @endif
            <?php $j++; ?>
            @endforeach

                </div>
            </section>
            @endsection