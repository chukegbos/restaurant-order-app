@extends('layouts.admin')
@section('pageTitle', 'Cart')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="text-align: right;">Shopping Cart</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Cart</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="card">
            @if(isset($status))
              <div class="alert alert-success alert-dismissable" style="margin:20px">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>  <i class="icon fa fa-check"></i> Success!</h4>
                {{ $status}}
              </div>
            @endif

            @if(isset($error))
              <div class="alert alert-danger alert-dismissable" style="margin:20px">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>  <i class="icon fa fa-times"></i> Oops!</h4>
                {{ $error}}
              </div>
            @endif
            <!-- /.card-header -->
            <div class="card-body">
              @if (Session::has('cart'))
                <form method="post" action="{{ url('/shoppingcart') }}">
                  {{ csrf_field() }}
                  <div class="table-responsive">
                    <table class="table table-condensed table-striped">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th class="text-center">Quantity</th>
                          <th class="text-right">Selling Price (Naira)</th>
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
                                  <li><a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}"> <span style="padding: 4px">Reduce All</a></span></li>
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
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Select Mode of Payment</label>
                        <select class="form-control" name="mop">
                            <option value="Cash">Cash</option>
                            <!--<option value="Mobile Transfer">Mobile Transfer</option>
                            <option value="POS">POS</option>-->
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Buyer</label>
                        <input type="text" name="buyer" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <a href="{{ url('/product') }}" class="btn btn-info">Back</a>
                    </div>

                    <div class="col-md-6">
                      <button type="submit" class="btn btn-success">Checkout</button>
                    </div>
                  </div>
                </form>
              @else
                  <h4>No item in cart!!!</h4>
              @endif    
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection