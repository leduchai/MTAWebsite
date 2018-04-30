@extends('layouts.client')
@section('slider')
    @include('layouts.slider')
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
                        <p class="text-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
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
                    <div class="col-lg-6 col-md-6">
                        <a href=""><img alt="" src="{{ asset(UPLOAD_IMAGE_PAGE.$page->images) }}" class="img-responsive"> </a>
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
             @endif
            <?php $i++; ?>
            @endforeach
            <section class="background-gray">
                <div class="row title-single">
                    <div class="col-lg-12 col-md-12">
                        <h2 class="title-single">Các Bậc Học</h2>
                    </div>
                </div>
                <div class="row">
                    <?php $j = 1;?> 
            @foreach($pages->childss() as $pa)
            @if($j>1)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <figure class="figure">
                            <a href="{{ $pa->getSlug() }}"><img src="{{ asset(UPLOAD_IMAGE_PAGE.$pa->images) }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure."></a>
                            <figcaption class="figure-caption-category"><a href="{{ $pa->getSlug() }}">{{ $pa->title }}</a></figcaption>
                        </figure>
                        <header>
                            <p class="note-category">{{ $pa->seo_content }}</p>
                        </header>
                        <a href="{{ $pa->getSlug() }}" class="view-more">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                    </div>
                     @endif
            <?php $j++; ?>
            @endforeach
                </div>
            </section>
            
            @endsection