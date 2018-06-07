@extends('layouts.client')
@section('content')
  <section>
                <div class="row">
        <div class="col-lg-3 col-md-3 collapse width show" id="sidebar">
            <p id="category-name">{{ $listCate->title }}</p>
            @if(count($listCate->childss()) > 0)
            <div class="list-group">
                <?php $i=1 ;?>
                @foreach($listCate->childss() as $p1)
                @if($i==1)
                    @if(count($p1->childss()) > 0)
                    <a href="#{{ $p1->id }}" class="list-group-item collapsed first-item" data-toggle="collapse" aria-expanded="false"><span>{{ $p1->title }}</span> </a>
                    @else
                    <a href="{{  url($p1->getSlug()) }}" class="list-group-item  first-item"><span>{{ $p1->title }}</span> </a>
                    @endif
                @else
                    @if(count($p1->childss()) > 0)
                    <a href="#{{ $p1->id }}" class="list-group-item collapsed" data-toggle="collapse" aria-expanded="false"><span>{{ $p1->title }}</span> </a>
                    @else
                    <a href="{{  url($p1->getSlug()) }}" class="list-group-item "><span>{{ $p1->title }}</span> </a>
                    @endif
                @endif
                @if(count($p1->childss()) > 0)
                <div class="collapse" id="{{ $p1->id }}" data-parent="#sidebar">
                    @foreach($p1->childss() as $p2)
                    <a id="{{ $p2->id }}" onclick="myfunction({{ $p2->id }},{{ $p1->id }})" href="{{  url($p2->getSlug()) }}" class="list-group-item" >{{ $p2->title }}</a>
                    @endforeach
                </div>
                @endif
                <?php $i++;?>
                @endforeach    
            </div>
            @endif
        </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <h3 id="title-post">{{ $post->title }}</h3>
                            </div>
                        </div>
                        <div class="row info-date-view">
                            <div class="col-lg-3 col-md-3">
                                <span class="glyphicon glyphicon-calendar"><span id="date">{{ $date }}<span></span>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <span class="glyphicon glyphicon-eye-open"><span id="view">{{ $view }}<span></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                {!! $post->content !!}

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="row title-single">
                    <div class="col-lg-12 col-md-12">
                        <h2 class="title-single">Có thể bạn quan tâm</h2>
                    </div>
                </div>
                <div class="row">
                  <?php $i=1; ?>
                  @foreach($postrl as $rl)
                  @if($i<5)
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <figure class="figure">
                            <img src="{{ asset(UPLOAD_IMAGE_POST.$rl->images) }}" class="img-responsive figure-img img-fluid rounded" alt="{{ $rl->title }}">
                            <figcaption class="figure-caption"><a href="{{  url($rl->getSlug()) }}">{{ $rl->title }}</a></figcaption>
                        </figure>
                        <header>
                            <p class="note">{{ $rl->seo_content }}</p>
                        </header>
                    </div>
                    @endif
                     <?php $i++; ?>
                    @endforeach
                </div>
            </section>


            <section>
                <div class="row">
                    <div class="col-lg-8 col-md-8 area-same-category">
                        <h3>Cùng chuyên mục</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <ul class="same-category">
                          <?php $i=1; ?>
                  @foreach($postrl as $rl)
                  @if($i>4)
                            <li><a href="{{  url($rl->getSlug()) }}">{{ $rl->title }}</a></li>
                            @endif
                     <?php $i++; ?>
                    @endforeach
                        </ul>
                    </div>
                </div>

            </section>

@endsection
@section('title')
{{$post->seo_title}}
@endsection

@section('description')
{{$post->seo_content}}
@endsection