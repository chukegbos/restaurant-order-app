@extends('layouts.admin')
@section('pageTitle', 'Products')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Bar</th>
                      <th>Product Name</th>
                      <th>Price/Bottle(<span>&#8358;</span>)</th>
                      <th>Available</th>
                      <th>Sold</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($barproducts as $product)
                      <tr>
                        <td>
                          @forelse($bars as $bar)
                            @if($bar->bar_id==$product->bar)
                              {{ $bar->bar_name }}
                            @endif
                          @empty
                          @endforelse
                        </td>
                        <td>
                          @forelse($allproducts as $singleproduct)
                            @if($singleproduct->stock_id==$product->product)
                              {{ $singleproduct->stock_name }}
                            @endif
                          @empty
                          @endforelse
                        </td>

                        <td>
                          @forelse($allproducts as $singleproduct)
                            @if($singleproduct->stock_id==$product->product)
                              {{ $singleproduct->selling_price }}
                            @endif
                          @empty
                          @endforelse
                        </td>
                        <td>{{ $product->available }}</td>
                        <td>{{ $product->sold }}</td>
                        <td>
                            @if ($product->available <= 0)
                              <a class="btn btn-info btn-xs" href="#"><i class="fa fa-cart-arrow-down"></i> 
                                Out of Stock
                              </a> 
                            @else
                              @forelse($allproducts as $singleproduct)
                                @if($singleproduct->stock_id==$product->product)
                                  <a href="{{ url('/addcart') }}/{{$singleproduct->id}}" class="btn btn-info btn-xs">Add to Cart</a>
                                @endif
                              @empty
                              @endforelse
                            @endif
                        </td>
                      </tr>
                    @empty
                    @endforelse
                  </tbody>
                </table>
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