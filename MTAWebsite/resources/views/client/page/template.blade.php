@extends('layouts.client')
@section('slider')
	@include('layouts.slider')
@endsection
@section('content')
                           <section>
                <div class="row">
                        <div class="col-lg-3 col-md-3">
                                <p> menu clapse đang hoàn thiện nốt</p>
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
                                    <p>{!! $pages->content !!}</p>
                                </div>
                            </div>
                        </div>
                </div>
            </section>

@endsection