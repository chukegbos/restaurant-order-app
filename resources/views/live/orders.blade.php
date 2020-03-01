@extends('layouts.app2')
@section('pageTitle', 'My Orders')
@section('content')
<div class="page-container">   
  <div class="page-content-wrapper">
    <section class="section-reservation-form" style="padding: 20px">
      <div class="container">
        <div class="section-content">
          <div class="swin-sc swin-sc-title style-2">
            <h3 class="title"><span>My Orders</span></h3>
          </div>
          <div class="row">
            <div class="col-md-12"> 
              @include('component.usersidebar')  
              <div class="content">
                <div class="swin-sc swin-sc-contact-form light mtl" style="padding: 30px">
                  
                  <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Sale ID</th>
                          <th>Total Price (Naira)</th>
                          <th>Payment Status</th>
                          <th>Order Status</th>
                          <th>Date</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($orders as $order)
                        <tr>
                          <td>{{ $order->sale_id }}</td>
                          <td>N{{ $order->cart->totalPrice }}</td>  
                          <td>{{ $order->payment_status }}</td>
                          <td>{{ $order->delivery_status }}
                              <form action="{{ url('/changestatus') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $order->id }}">
                                <select name="delivery_status" onchange='form.submit()'>
                                  <option>---</option>
                                  <option value="Completed">Completed</option>
                                  <option value="Cancelled">Cancelled</option>
                                </select>
                              </form>
                          </td>
                          <td>{{ $order->created_at->toFormattedDateString() }}</td>
                          <td><a href="{{ url('/shoppingcart2') }}/?payment_id={{ $order->sale_id }}" class="btn btn-success">@if($order->payment_status=="Paid")View @else View/Pay @endif</a></td>                 
                        </tr>
                        @empty
                        @endforelse
                      </tbody>                     
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>       
        </div>
      </div>
    </section>  
  </div>
</div>
@endsection