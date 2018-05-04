@extends('layouts.client')
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
		@foreach($new->getTopPost(10) as $p)
		@if($i < 2)
		<div class="col-lg-6 col-md-6">

			<figure class="figure">
				<a href="{{ $p->getSlug() }}"><img src="{{ asset(UPLOAD_IMAGE_POST.$p->images) }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure."></a>
				<figcaption class="figure-caption-category"> <a href="{{ $p->getSlug() }}">{{ $p->title }} </a></figcaption>
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
				@foreach($new->getTopPost(10) as $p1)
				@if($j >= 2 && $j < 7)
				<li><a href="{{ $p1->getSlug() }}">{{ $p1->title }}</a> </li>
				@endif
				<?php $j++; ?>
				@endforeach
			</ul>
			<a href="{{ $new->getSlug() }}" class="view-more-right">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
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
				<a href="{{ $p2->getSlug() }}"><img src="{{ asset(UPLOAD_IMAGE_POST.$p2->images) }}" class="img-responsive figure-img img-fluid rounded" alt="{{ $p2->title }}"></a>
				<figcaption class="figure-caption-category"><a href="{{ $p2->getSlug() }}">{{ $p2->title }}</a></figcaption>
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
		<div class="col-lg-11 col-md-11 a-line">
			<hr>
		</div>
		<div class="col-lg-1 col-md-1 view-more">
			<a href="" class="view-more">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
		</div>
	</div>
</section>
<section>
	<div class="row title-single">
		<div class="col-lg-12 col-md-12">
			<h2 class="title-single">Thông báo</h2>
		</div>
	</div>
	<div class="row">
		<?php $i =1; ?>
		@foreach($noti->getTopPost(10) as $p)
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
			<ul class="highlight-news">
				<?php $j = 1; ?>
				@foreach($noti->getTopPost(10) as $p1)
				@if($j >= 2 && $j < 7)
				<li><a href="{{ $p->link() }}">{{ $p1->title }}</a> </li>
				@endif
				<?php $j++; ?>
				@endforeach
			</ul>
			<a href="" class="view-more-right">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
		</div>
	</div>
</section>
<section>
	<div class="row title-single">
		<div class="col-lg-12 col-md-12">
			<h2 class="title-single">Tuyển Sinh</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 background-over">
			<header class="description-header">
				<h3 class="title-description">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit.
				</h3>
				<p class="detail-description">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed dolore tenetur odio omnis optio hic ut repellat
				</p>
				<a href="" class="view-more">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
			</header>
			<figure class="figure">
				<img src="{{ asset('client-assets/images/big-image-9.jpg') }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
			</figure>
		</div>
	</div>
</section>

<section class="background-gray">
	<div class="row title-single">
		<div class="col-lg-12 col-md-12">
			<h2 class="title-single"></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-12">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4">
					<figure class="figure">
						<img src="{{ asset('client-assets/images/medium-image-10.jpg') }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
						<figcaption class="figure-caption-category">Hình ảnh, video tiêu biểu</figcaption>
					</figure>
					<header>
						<p class="note-category">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo beatae sunt obcaecati, dolorum nisi, autem!</p>
					</header>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<figure class="figure">
						<img src="{{ asset('client-assets/images/medium-image-10.jpg') }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
						<figcaption class="figure-caption-category">Hình ảnh, video tiêu biểu</figcaption>
					</figure>
					<header>
						<p class="note-category">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo beatae sunt obcaecati, dolorum nisi, autem!</p>
					</header>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<figure class="figure">
						<img src="{{ asset('client-assets/images/medium-image-10.jpg') }}" class="img-responsive figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
						<figcaption class="figure-caption-category">Hình ảnh, video tiêu biểu</figcaption>
					</figure>
					<header>
						<p class="note-category">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo beatae sunt obcaecati, dolorum nisi, autem!</p>
					</header>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 btn-notification">
			<div>
				<a href="" class="view-more">Thông báo<span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span></a>
			</div>
		</div>
	</div>
	<div class="row view-more-area">
		<div class="col-lg-11 col-md-11 a-line">
			<hr>
		</div>
		<div class="col-lg-1 col-md-1 view-more">
			<a href="" class="view-more">Xem thêm<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
		</div>
	</div>
</section>
@endsection