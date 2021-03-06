﻿@extends('layouts.client')
@section('slider')
@include('layouts.slider')
@endsection
@section('content')
<section>
</section>

<div class="se-pre-con"></div>


<section>
	<div class="row title-single">
		<div class="col-lg-12 col-md-12">
			<h2 class="title-single">Tin Nổi Bật</h2>
		</div>
	</div>
	<div class="row">
		<?php $i =1; ?>
		@foreach($new->getTopPost(8) as $p)
		@if($i < 2)
		<div class="col-lg-6 col-md-6">

			<figure class="figure">
				<a href="{{ url($p->getSlug()) }}"><img src="{{ asset(UPLOAD_IMAGE_POST.$p->images) }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure."></a>
				<figcaption class="figure-caption-category"> <a href="{{ url($p->getSlug()) }}">{{ $p->title }} </a></figcaption>
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
				@foreach($new->getTopPost(8) as $p1)
				@if($j >= 2 )
				<li><a href="{{  url($p1->getSlug()) }}">{{ $p1->title }}</a> </li>
				@endif
				<?php $j++; ?>
				@endforeach
			</ul>
			<a href="{{  url($new->getSlug()) }}" class="view-more-right">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
		</div>
	</div>
</section>

<section class="background-gray">
	<div class="row title-single">
		<div class="col-lg-12 col-md-12">
			<h2 class="title-single">Tin Tức Và Sự Kiện</h2>
		</div>
	</div>
	<div class="row">
		<?php $k = 1; ?>
		@foreach(showpost(1)->getpost() as $p2)
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
			<a href="" class="view-more-line">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
		</div>
	</div>
</section>
<section>
	<div class="row title-single">
		<div class="col-lg-12 col-md-12">
			<h2 class="title-single">Thông Báo</h2>
		</div>
	</div>
	<div class="row">
		<?php $i =1; ?>
		@foreach($noti->getTopPost(8) as $p)
		@if($i < 2)
		<div class="col-lg-6 col-md-6">

			<figure class="figure">
				<a href="{{ $p->link() }}"><img src="{{ asset(UPLOAD_IMAGE_POST.$p->images) }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure."></a>
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
			<ul class="highlight-notification">
				<?php $j = 1; ?>
				@foreach($noti->getTopPost(8) as $p1)
				@if($j >= 2)
				<li><a href="{{  url($p->link()) }}">{{ $p1->title }}</a> </li>
				@endif
				<?php $j++; ?>
				@endforeach
			</ul>
			<a href="{{  url($noti->getSlug()) }}" class="view-more-right">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
		</div>
	</div>
</section>
@if(count(showpost(10)->getpost()) > 0)
<section>
	<div class="row title-single">
		<div class="col-lg-12 col-md-12">
			<h2 class="title-single">Tuyển Sinh</h2>
		</div>
	</div>
	<?php $l=1; ?>
	@foreach(showpost(10)->getpost() as $ad)
	@if($l==1)
	<div class="row">
		<div class="col-lg-12 col-md-12 background-over">
			<header class="description-header">
				<h3 class="title-description">
					{{ $ad->title }}
				</h3>
				<p class="detail-description">
					{{ $ad->seo_content }}
				</p>
				<a href="{{  url($ad->getSlug()) }}" class="view-more">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
			</header>
			<figure class="figure">
				<img src="{{ asset(UPLOAD_IMAGE_POST1.$ad->images) }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
			</figure>
		</div>
	</div>
	@endif
	<?php $l++; ?>
	@endforeach
</section>

<section>
	<div class="row title-single">
		<div class="col-lg-12 col-md-12">
			<h2 class="title-single"></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-12">
			<div class="row">
				<?php $m=1; ?>
				@foreach(showpost(10)->getpost() as $ad)
				@if($m>1 && $m<5 )
				<div class="col-lg-4 col-md-4 col-sm-4">
					<figure class="figure">
						<img src="{{ asset(UPLOAD_IMAGE_POST.$ad->images) }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
						<figcaption class="figure-caption-category"><a href="{{  url($ad->getSlug()) }}">{{ $ad->title }}</a></figcaption>
					</figure>
					<header>
						<p class="note-category">{{ $ad->seo_content }}</p>
					</header>
				</div>

				@endif
				<?php $m++; ?>
				@endforeach
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 btn-notification">
			<div>
				<a href="{{  url(showpost(9)->getSlug()) }}" class="view-more">Thông báo<span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span></a>
			</div>
		</div>
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
@endif
@endsection
            @section('title')
{{setting()->slogan}}
@endsection

@section('description')
{{setting()->description}}
@endsection