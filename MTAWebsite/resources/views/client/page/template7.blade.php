@extends('layouts.client')
@section('slider')

@endsection
@section('content')
<section>
    <div class="row">
        <div class="col-lg-3 col-md-3 collapse width show" id="sidebar">
            <p id="category-name">{{ $listPage->title }}</p>
            @if(count($listPage->childss()) > 0)
            <div class="list-group">
                <?php $i=1 ;?>
                @foreach($listPage->childss() as $p1)
                @if($i==1)
                    @if(count($p1->childss()) > 0)
                    <a href="#{{ $p1->id }}" class="list-group-item collapsed first-item" data-toggle="collapse" aria-expanded="false"><span>{{ $p1->title }}</span> </a>
                    @else
                    <a href="{{ $p1->getSlug() }}" class="list-group-item  first-item"><span>{{ $p1->title }}</span> </a>
                    @endif
                @else
                    @if(count($p1->childss()) > 0)
                    <a href="#{{ $p1->id }}" class="list-group-item collapsed" data-toggle="collapse" aria-expanded="false"><span>{{ $p1->title }}</span> </a>
                    @else
                    <a href="{{ $p1->getSlug() }}" class="list-group-item "><span>{{ $p1->title }}</span> </a>
                    @endif
                @endif
                <!-- menu con -->
                @if(count($p1->childss()) > 0)
                <div class="collapse" id="{{ $p1->id }}" data-parent="#sidebar">
                    @foreach($p1->childss() as $p2)
                    
                    
                    <a id="{{ $p2->id }}" onclick="myfunction({{ $p2->id }},{{ $p1->id }})" href="{{ $p2->getSlug() }}" class="list-group-item" >{{ $p2->title }}</a>
                  
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
                    <h3 id="title-post">{{ $pages->title }}</h3>
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
                    @if(count($pages->childss())>0)
                    @foreach($pages->childss() as $p2)
                        <div class="row post-item">
                            <div class="col-lg-3 col-md-3 text-center">
                            @if(!empty($p2->images))
                             <a href="{{ $p2->getSlug() }}"><img src="{{ asset(UPLOAD_IMAGE_PAGE2.$p2->images) }}" class="img-responsive figure-img img-fluid rounded" alt="{{ $p2->title }}"></a>
                            @else
                            <a href="{{ $p2->getSlug() }}"><span class="glyphicon glyphicon-bell bell"></span</a>
                            @endif
                            </div>
                            <div class="col-lg-9 col-md-9 ">
                              <figure class="figure">
                                 <h3 class="post-title"><a href="{{ $p2->getSlug() }}">{{ $p2->title }}</a></h3>
                                    <p class="note-category">{{ $p2->seo_content }}</p>
                                    <span class="date">{{ $p2->created_at }}</span>
                                </figure>
                            </div>
                        </div> 
                      @endforeach
                      @endif
                </div>
            </div>
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