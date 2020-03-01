@extends('layouts.app2')
@section('pageTitle', 'Home')
@section('content')
<div class="page-container">
  <div class="top-header top-slider layout-shop">
    <div class="slides">
      <div class="slide-content slide-layout-01">
          <div class="container">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="swin-sc swin-sc-title text-left">
                          <h3 data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="500" class="title animated fadeInUp">Deliciousness jumping into the mouth</h3>
                          <h4 data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="1000" class="subtitle animated fadeInUp">Let Enjoy The Rhym Of {{ $setting->sitename }} Dishes</h4>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="slide-bg">
          <img src="{{ asset('assets/images/slider/shop-slider.jpg') }}" alt="" class="img img-responsive">
      </div>
    </div>
    <div class="slides">
      <div class="slide-content slide-layout-01">
        <div class="container">
          <div class="row">
            <div class="col-xs-6">
              <div class="swin-sc swin-sc-title text-left">
                <h3 data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="500" class="title animated fadeInUp">Where food speaks with your palate</h3>
                <h4 data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="1000" class="subtitle animated fadeInUp">We speak the good food language</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slide-bg">
          <img src="{{ asset('assets/images/slider/shop-slider2.jpg') }}" alt="" class="img img-responsive">
      </div>
    </div>
  </div>

    <div class="page-content-wrapper" style="margin-top: -50px;">
        <div class="page-content no-padding">
            <hr style="color: black">
            <section class="service-section-02 padding-top-100">
                <div class="container">
                    <div class="swin-sc swin-sc-iconbox">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="item icon-box-02">
                                    <div class="wrapper-icon">
                                        <i class="icons fa fa-gift"></i><span class="number">1</span>
                                    </div>
                                    <h4 class="title">Get Our App</h4>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="item icon-box-02">
                                    <div class="wrapper-icon">
                                        <i class="icons fa fa-shopping-bag"></i><span class="number">2</span>
                                    </div>
                                    <h4 class="title">Online Order</h4>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="item icon-box-02">
                                    <div class="wrapper-icon">
                                        <i class="icons fa fa-truck"></i><span class="number">3</span>
                                    </div>
                                    <h4 class="title">Fast Delivery</h4>
                                </div>
                            </div>
                          
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="item icon-box-02">
                                    <div class="wrapper-icon">
                                        <i class="icons fa fa-users"></i><span class="number">4</span>
                                    </div>
                                    <h4 class="title">Friendly Support</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <hr style="color: black">

            <section class="product-sesction-02 padding-top-120 padding-bottom-100">
                <div class="container">
                    <div class="swin-sc swin-sc-title">
                        <p class="top-title"><span>Popular Product</span></p>
                        <h3 class="title">Tasty And Good Price</h3>
                    </div>
                    <div class="swin-sc swin-sc-product products-02">
                        <div class="products nav-slider">
                            <div class="row">
                                @forelse($product8 as $product)
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="blog-item item swin-transition">
                                            <div class="block-img">
                                                <img src="{{ asset('storage') }}/{{ $product->image }}" alt="" class="img img-responsive" style="height: 185px">
                                                <div class="block-circle price-wrapper">
                                                    <span class="price woocommerce-Price-amount amount">
                                                        <span class="price-symbol"><span>&#8358;</span></span>{{ $product->selling_price}}
                                                    </span>
                                                </div>
                                                <div class="group-btn">
                                                    <a href="{{ url('/addcart') }}/{{$product->id}}" class="swin-btn btn-add-to-card">
                                                        <i class="fa fa-shopping-basket"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="block-content">
                                                <h5 class="title">
                                                    {{ $product->stock_name }}
                                                </h5>
                                                <div class="product-info">
                                                    <ul class="list-inline">
                                                        <li class="author">
                                                            <a href="{{ url('/addcart') }}/{{$product->id}}">
                                                                <i class="fa fa-shopping-basket"></i>
                                                                <span>Order</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="{{ url('/addcart') }}/{{$product->id}}">
                                                                <span class="price-symbol"><span>&#8358;</span></span>{{ $product->selling_price}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <!--
          <section>
            <div class="container">
              <div class="row">
                <div class="col-md-6 col-xs-12">
                  <div class="swin-sc swin-sc-banner item">
                    <div class="banner-featured-img"><img src="{{ asset('assets/images/banner-img-1.jpg') }}" alt="{{ $setting->sitename }}" class="img img-responsive">
                      <div class="banner-content">
                        <div class="banner-title">HONEY CAKE</div>
                        <div class="banner-subtitle">NEW DISHES THIS WEEK</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xs-12">
                  <div class="swin-sc swin-sc-banner right item">
                    <div class="banner-featured-img"><img src="{{ asset('assets/images/banner-img-2.jpg') }}" alt="{{ $setting->sitename }}" class="img img-responsive">
                      <div class="banner-content">
                        <div class="banner-title">HAM STORY</div>
                        <div class="banner-subtitle">OUR HANDMADE PRODUCTS</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="padding-top-120 padding-bottom-100">
            <div class="container">
              <div class="swin-sc swin-sc-title">
                <p class="top-title"><span>New Product</span></p>
                <h3 class="title">Lunch And Dinner</h3>
              </div>
              <div class="swin-sc swin-sc-product products-02 carousel-02">
                <div class="products nav-slider">
                  <div class="row slick-padding">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="blog-item item swin-transition">
                        <div class="block-img"><img src="{{ asset('assets/images/product/product-2e.jpg') }}" alt="" class="img img-responsive">
                          <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>45.0</span></div>
                          <div class="group-btn"><a href="javascript:void(0)" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                        </div>
                        <div class="block-content">
                          <h5 class="title"><a href="javascript:void(0)">Jambon Salad Hot Bread</a></h5>
                          <div class="product-info">
                            <ul class="list-inline">
                              <li class="author"><span>Chef</span><span class="text">Don Joe</span></li>
                              <li class="rating"><a href="javascript:void(0)"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="blog-item item swin-transition">
                        <div class="block-img"><img src="{{ asset('assets/images/product/product-2f.jpg') }}" alt="" class="img img-responsive">
                          <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>15.0</span></div>
                          <div class="group-btn"><a href="javascript:void(0)" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                        </div>
                        <div class="block-content">
                          <h5 class="title"><a href="javascript:void(0)">Mexico Beafsteak Potato</a></h5>
                          <div class="product-info">
                            <ul class="list-inline">
                              <li class="author"><span>Chef</span><span class="text">Don Joe</span></li>
                              <li class="rating"><a href="javascript:void(0)"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="blog-item item swin-transition">
                        <div class="block-img"><img src="{{ asset('assets/images/product/product-2d.jpg') }}" alt="" class="img img-responsive">
                          <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>30.0</span></div>
                          <div class="group-btn"><a href="javascript:void(0)" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                        </div>
                        <div class="block-content">
                          <h5 class="title"><a href="javascript:void(0)">Madagasca Lopster Tasty</a></h5>
                          <div class="product-info">
                            <ul class="list-inline">
                              <li class="author"><span>Chef</span><span class="text">Don Joe</span></li>
                              <li class="rating"><a href="javascript:void(0)"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="blog-item item swin-transition">
                        <div class="block-img"><img src="{{ asset('assets/images/product/product-2f.jpg') }}" alt="" class="img img-responsive">
                          <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>15.0</span></div>
                          <div class="group-btn"><a href="javascript:void(0)" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                        </div>
                        <div class="block-content">
                          <h5 class="title"><a href="javascript:void(0)">Mexico Beafsteak Potato</a></h5>
                          <div class="product-info">
                            <ul class="list-inline">
                              <li class="author"><span>Chef</span><span class="text">Don Joe</span></li>
                              <li class="rating"><a href="javascript:void(0)"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="blog-item item swin-transition">
                        <div class="block-img"><img src="{{ asset('assets/images/product/product-2a.jpg') }}" alt="" class="img img-responsive">
                          <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span></div>
                          <div class="group-btn"><a href="javascript:void(0)" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                        </div>
                        <div class="block-content">
                          <h5 class="title"><a href="javascript:void(0)">Mexico Beafsteak Potato fly</a></h5>
                          <div class="product-info">
                            <ul class="list-inline">
                              <li class="author"><span>Chef</span><span class="text">Don Joe</span></li>
                              <li class="rating"><a href="javascript:void(0)"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="blog-item item swin-transition">
                        <div class="block-img"><img src="{{ asset('assets/images/product/product-2b.jpg') }}" alt="" class="img img-responsive">
                          <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>5.0</span></div>
                          <div class="group-btn"><a href="javascript:void(0)" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                        </div>
                        <div class="block-content">
                          <h5 class="title"><a href="javascript:void(0)">Mexico Beafsteak Potato</a></h5>
                          <div class="product-info">
                            <ul class="list-inline">
                              <li class="author"><span>Chef</span><span class="text">Don Joe</span></li>
                              <li class="rating"><a href="javascript:void(0)"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        -->
         
              <div class="shop-banner banner-section">
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <div class="content-wrapper">
                      <h2 class="heading-title">BIGGEST EVENT - SALE<span class="text-large">50% OFF</span>IN THIS WEEK</h2>
                      <p class="des">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                    </div>
                  </div>
                </div>
              </div>
          <!--<section class="padding-bottom-100 padding-top-100">
            <div class="container">
              <div data-item="5" class="swin-sc swin-sc-partner">
                <div class="main-slider">
                  <div class="slides">
                    <div class="item"><img src="{{ asset('assets/images/partner/partner-01.png') }}" alt="{{ $setting->sitename }}" class="img img-responsive"></div>
                    <div class="item"><img src="{{ asset('assets/images/partner/partner-02.png') }}" alt="{{ $setting->sitename }}" class="img img-responsive"></div>
                    <div class="item"><img src="{{ asset('assets/images/partner/partner-03.png') }}" alt="{{ $setting->sitename }}" class="img img-responsive"></div>
                    <div class="item"><img src="{{ asset('assets/images/partner/partner-02.png') }}" alt="{{ $setting->sitename }}" class="img img-responsive"></div>
                    <div class="item"><img src="{{ asset('assets/images/partner/partner-01.png') }}" alt="{{ $setting->sitename }}" class="img img-responsive"></div>
                    <div class="item"><img src="{{ asset('assets/images/partner/partner-03.png') }}" alt="{{ $setting->sitename }}" class="img img-responsive"></div>
                    <div class="item"><img src="{{ asset('assets/images/partner/partner-02.png') }}" alt="{{ $setting->sitename }}" class="img img-responsive"></div>
                  </div>
                </div>
              </div>
            </div>
          </section>-->
        </div>
    </div>
</div>
@endsection