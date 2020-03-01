@extends('layouts.app2')
@section('pageTitle', 'Payment')
@section('content')
<div class="page-container">   
  <div class="page-content-wrapper">
    <section class="section-reservation-form" style="padding: 20px">
      <div class="container">
        <div class="section-content">
          <div class="swin-sc swin-sc-title style-2">
            <h3 class="title"><span>Payment</span></h3>
          </div>
          
          <div class="row">
            <div class="col-md-12"> 
              @include('component.usersidebar')  
              <div class="content">
                <div class="row">
                  <div class="col-md-3"> </div>
                  <div class="col-md-6"> 
                    <div class="swin-sc swin-sc-contact-form light mtl">
                      <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>Product</th>
                              <th>Quantity</th>
                              <th>Unit Price (<span>&#8358;</span>)</th>
                              <th>Price (<span>&#8358;</span>)</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach($orderss as $item)
                              <tr>
                                <td>{{ $item['item']['stock_name']  }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ $item['selling_price'] / $item['quantity'] }}</td>
                                <td>{{ $item['selling_price'] }}</td>
                              </tr>
                            @endforeach
                          </tbody>

                          <tfoot>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                            </tr>

                            <tr>
                              <th></th>
                              <th class="text-right  pd-10"></th>
                              <th class="text-center  pd-10">Total Price</th>
                              <th class="text-center  pd-10 "><span class="vd_green font-sm font-normal"><span>&#8358;</span>{{ $totalPrice  }}</span></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    
                      <p style="text-align: center;">
                        @foreach($theusers as $user)
                          @if($user->id==$orders->buyer)
                            Name: <span style="font-weight: bolder">{{ $user->name}}</span> <br>
                            Phone: <span style="font-weight: bolder">{{ $user->phone }}</span> <br>
                            Email: <span style="font-weight: bolder">{{ $user->email }}</span><br>
                            Delivery Address: <span style="font-weight: bolder">{{ $delivery_address  }}</span><br>
                          @endif
                        @endforeach
                        <!--Mode of Payment: <span style="font-weight: bolder">{{ $orders->mop }}</span> <br>
                        Date of Payment: <span style="font-weight: bolder">{{ $orders->created_at->toFormattedDateString() }}</span><br>-->
                      </p>
                      @if($payment_status!="Paid")
                        <div class="row">
                          <div class="col-md-4"></div>
                          <div class="col-md-2">
                            <form>
                              <script src="https://js.paystack.co/v1/inline.js"></script>
                              <button type="button" onclick="payWithPaystack()" class="btn btn-success pull-right">Pay</button> 
                            </form>
                          </div>
                        </div>
                      @else
                      <p style="text-align: center;">
                        Payment Status: <span style="font-weight: bolder">{{ $payment_status }}</span> <br>
                        Delivery Status: <span style="font-weight: bolder">{{ $delivery_status }}</span> <br>
                      </p>
                      @endif
                    </div>
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

<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_15bebc3c7d43577a794d37b53b2b04417f70c908',
      email: '{{ $iuser->email }}',
      amount: '{{ $totalPrice  }}00',
      currency: "NGN",
      phone: "{{$iuser->phone}}",
      firstname: '{{ $iuser->name }}',
      custom_description: "Golden Apple Restuarant Order",
      description: "Golden Apple Restuarant Order",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "{{ $iuser->name }}",
                variable_name: "{{ $iuser->name }}",
                value: "{{ $iuser->phone }}"
            }
         ]
      },
      callback: function(response){
           window.location.replace("{{ url('/shoppingcart2') }}/?payment_id={{ $sale_id }}");
          //alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>
@endsection