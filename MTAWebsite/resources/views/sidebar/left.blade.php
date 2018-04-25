                    <aside id="sp-left" class="span3">
                      <div class="module vina_categories">
                        <div class="mod-wrapper clearfix">
                          <h3 class="header">
                            <span>Danh Mục sản phẩm</span>
                            <div style="border-bottom: 1px solid #FF8C00; margin-bottom: 2px"></div>
                          </h3>
                          <span class="sp-badge vina_categories"></span>
                          <div class="mod-content clearfix">
                            <div class="mod-inner clearfix">
                              <div id="vina-treeview-jshopping293" class="vina-treeview-jshopping">

                                <ul class="level0 treeview-red">
                                 @foreach($category as $k=>$v)
                                 <li>
                                  <a href="{{ $v['slug'] }}" >
                                    <span class="catTitle ">
                                    {{ $v['title'] }}    </span>
                                  </a>
                                  <ul class="sub-menu">
                                   @if(isset($v['lstCat']))
                                   @foreach($v['lstCat'] as $k2=>$v2)
                                   <li>
                                    <a href="{{ $v2['slug'] }}" >
                                      <span class="catTitle ">
                                      {{ $v2['title'] }}</span>
                                    </a>
                                  </li>
                                  @endforeach
                                  @endif
                                </ul>
                              </li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="gap"></div>
                  <div class="module ">
                    <div class="mod-wrapper clearfix">
                      <div class="mod-content clearfix">
                        <div class="mod-inner clearfix">


                          <div class="custom"  >
                            <div class="hidden-md-down">
                              <div class="feature-l">
                                <ul class="list-group">
                                  <li class="media">
                                    <div class="support">
                                      <span ><img class="media-object" src="//bizweb.dktcdn.net/thumb/thumb/100/168/117/themes/222030/assets/feature1.png?1487738122913" alt="feature1" /></span></div>
                                      <div class="media-body"><span class="feature-title" >Tư vấn bán hàng 24/7</span><br />
                                        <p><span >0945 096 333</span></p>
                                      </div>
                                      <hr /></li>

                                      <li class="media">
                                        <div class="support">
                                          <span ><img class="media-object" src="//bizweb.dktcdn.net/thumb/thumb/100/168/117/themes/222030/assets/feature1.png?1487738122913" alt="feature1" /></span>
                                        </div>
                                        <div class="media-body"><span class="feature-title" >Hỗ trợ kĩ thuật 360°</span><br />
                                          <p><span >0981 041 333</span></p>
                                        </div>
                                        <hr /></li>
                                        <li class="media">
                                          <div class="support"><span><img class="media-object" src="//bizweb.dktcdn.net/thumb/thumb/100/168/117/themes/222030/assets/feature1.png?1487738122913" alt="feature1" /></span></div>

                                          <div class="media-body"><span class="feature-title" >CSKH/ Quản lý Dự Án</span><br />
                                            <p><span >0941 666 333</span></p>
                                          </div>
                                          <hr /></li>
                                        </ul>
                                      </div>
                                    </div></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="gap"></div>
                            <div class="module ">
                              <div class="mod-wrapper clearfix">
                                <h3 class="header">
                                  <span>TIN TỨC</span>                    <div class="box"></div>
                                </h3>
                                <div class="mod-content clearfix">
                                  <div class="mod-inner clearfix">
                                    <div id="ns2-271" class="nssp2 ns2-271">
                                      <div class="ns2-wrap">
                                        <div id="ns2-art-wrap271" class="ns2-art-wrap  ">     
                                          <div class="ns2-art-pages nss2-inner">
                                            <div class="ns2-page ">
                                              <div class="ns2-page-inner">
                                                <?php $i =1 ; ?>
                                                @foreach(showpost(1) as $post)
                                                @if($i<5)
                                                <div class="ns2-row ns2-first ns2-odd">
                                                  <div class="ns2-row-inner">
                                                    <div class="ns2-column flt-left col-1">
                                                      <div style="padding:3px 3px 3px 3px">
                                                        <div class="ns2-inner">
                                                          <h4 class="ns2-title">
                                                            <a href="{{ $post->getpost->getSlug() }}">
                                                              {{ $post->getpost->title }}
                                                            </a>
                                                          </h4>
                                                          <a href="{{ $post->getpost->getSlug() }}">
                                                            <img class="ns2-image" style="float:left;margin:3px" src="{{ asset('uploads/240x180-'.$post->getpost->images) }}" alt="{{ $post->getpost->getSlug() }}" title="{{ $post->getpost->getSlug() }}" />    
                                                          </a>
                                                          <p class="ns2-introtext">{{ $post->getpost->Seodesc }}</p>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                  </div>
                                                  <div class="clearfix"></div>
                                                </div>
                                                @endif
                                                <?php $i++; ?>
                                                @endforeach
                                                <div class="clearfix"></div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="clearfix"></div>
                                      </div>
                                    </div>           </div>
                                  </div>
                                </div>
                              </div>
                            </aside>
