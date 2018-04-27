            <section>
                <div class="example-using-css">
                	@foreach(banners('slider') as $banner)
                    <img data-lazy-src="{{ asset('uploads/'.$banner->images) }}" />
                    
                    @endforeach
                </div>
            </section>