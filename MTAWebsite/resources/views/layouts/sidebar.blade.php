<div class="row">
                            <div class="col-lg-12 col-md-12">
                                <p class="category">Chuyên mục</p>
                                <div class="category">
                                    <ul>
                                      @foreach($category as $c)
                                        <li class="sub-category" id="category-name-1"><a class="category-link" href="{{ $c->getSlug() }}">{{ $c->title }}<span class="count">({{ count(showpost($c->id)) }})</span></a></li>
                                      @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>