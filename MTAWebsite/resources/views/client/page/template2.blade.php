@extends('layouts.client')
@section('slider')
     <section>
                <figure>
                    <?php $h =1 ?>
                     @foreach(banners('dt') as $banner)
                     @if($h==1)
                        <img src="{{ asset('uploads/'.$banner->images) }}" class="img-responsive" alt="" />
                    @endif
                    @endforeach
                </figure>
                
    </section>

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
                        <p class="text-description">
                            {!! $pages->Content !!}
                        </p>
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
                        <h2 class="title-single">{{ $pages->title }}</h2>
                    </div>
                </div>
                <div class="row">
                    <?php $j = 1;?> 
                    @foreach($page->childss() as $pa)
                    @if($j<5)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <figure class="figure">
                            <a href="{{ $pa->getSlug() }}"><img src="{{ asset(UPLOAD_IMAGE_PAGE2.$pa->images) }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure."></a>
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
            @endif
             @endforeach
            @endsection
            @section('title')
{{$pages->seo_title}}
@endsection

@section('description')
{{$pages->seo_content}}
@endsection