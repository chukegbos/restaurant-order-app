@extends('layouts.admin')
@section('pageTitle', 'Order Sale')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Sale</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Order Sale</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
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
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <div class="portfolio-item">
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
                    <div>
                      <p style="text-align: center;">
                        Buyer: <span style="font-weight: bolder">{{ $orders->buyer}}</span> <br>
                        Mode of Payment: <span style="font-weight: bolder">{{ $orders->mop }}</span> <br>
                        Date of Payment: <span style="font-weight: bolder">{{ $orders->created_at->toFormattedDateString() }}</span><br>
                        <a href="" class="btn btn-success btn-xs">Print</a> 
                      </p>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection