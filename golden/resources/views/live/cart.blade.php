@extends('layouts.app2')
@section('pageTitle', 'Cart')
@section('content')
<div class="page-container">
  <div class="page-content-wrapper">
    <section class="section-reservation-form" style="padding: 20px">
      <div class="container">
        <div class="section-content">
          <div class="swin-sc swin-sc-title style-2">
            <h3 class="title"><span>Check Out</span></h3>
          </div>
          
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="reservation-form">
                <div class="swin-sc swin-sc-contact-form light mtl">
                  @if (Session::has('cart'))
                    <form method="post" action="{{ url('/shoppingcart1') }}">
                      {{ csrf_field() }}
                      
                      <table class="table table-condensed table-striped">
                        <thead>
                          <tr>
                            <th>Meal</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-right">Amount (Naira)</th>
                            <th class="text-right">Action</th>
                          </tr>
                        </thead>

                        <tbody>
                            @forelse($products as $product)
                            <tr>
                              <td>{{ $product['item']{'stock_name'} }}</td>
                              <td class="text-center">{{ $product['quantity'] }}</td>
                              <td class="text-right">N {{ $product['selling_price'] }}</td>
                              <td class="text-right">
                                <div class="btn-group">
                                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                    Action
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}"> <span style="padding: 4px">Reduce by 1 </span></a></li>
                                    <li><a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}"> <span style="padding: 4px">Remove All</a></span></li>
                                  </ul>
                                </div>
                              </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>

                        <tfoot>
                          <tr>
                            <th class="text-right  pd-10"></th>
                            <th class="text-right  pd-10">Total Price</th>
                            <th class="text-right  pd-10 "><span class="vd_green font-sm font-normal"> N{{ $totalPrice }}</span></th>
                            <th></th>
                          </tr>
                        </tfoot>
                      </table>  
                   
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Delivery Address</label>
                            <textarea class="form-control" name="delivery_address" required="" cols="2"></textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                          <div class="form-group"><br><br>
                            <button type="submit" class="btn btn-success pull-right">Checkout</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  @else
                      <h4>No item in cart!!!</h4>
                  @endif   
                </div>
              </div>
            </div>
          </div>
          <div class="section-deco"><img src="{{ asset('assets/images/pages/reservation-showcase.png') }}" alt="fooday" class="img-deco"></div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection