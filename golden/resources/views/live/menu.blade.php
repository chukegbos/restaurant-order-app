@extends('layouts.app2')
@section('pageTitle', 'Home')
@section('content')
<style type="text/css">
    @media screen and (min-width: 800px) {
      .set {
       margin-top: 50px
      }
    }
</style>
<div class="page-container">
  <div class="page-content-wrapper set">
    <section class="product-sesction-02 padding-top-120 padding-bottom-100">
        <div class="container">
          <div class="swin-sc swin-sc-title">
            <p class="top-title"><span>Popular Product</span></p>
            <h3 class="title">Tasty And Good Price</h3>
          </div>
          <div class="swin-sc swin-sc-product products-02">
            <div class="products nav-slider">
              <div class="row">
                @forelse($allproducts as $product)
                  <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="blog-item item swin-transition">
                          <div class="block-img">
                              <img src="{{ asset('storage') }}/{{ $product->image }}" alt="" class="img img-responsive" style="height: 180px">
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
            <div class="row">
                <div class="col">
                  <ul class="pagination float-right">
                      {{ $theproducts->links() }}
                  </ul>
                </div>
              </div>
          </div>
        </div>
    </section>
  </div>
</div>
@endsection