@extends('layouts.admin')
@section('pageTitle', 'Purchase')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              @if(!isset($debt))
                Purchases
              @else
                Suppliers' Debt
              @endif
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Purchases</li>
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
            <div class="card-header">
              <h3 class="card-title">
                @if(!isset($debt))
                  <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#addpurchase"> 
                    <i class="fa fa-plus"></i> Add purchase
                  </a>
                @endif  
              </h3>
            </div>
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
                      <th>Purchase ID</th>
                      <th>Date of Purchase</th>
                      <th>Product</th>
                      <th>Total Amount(<span>&#8358;</span>)</th>
                      <th>Total Pay(<span>&#8358;</span>)</th>
                      <th>Balance(<span>&#8358;</span>)</th>
                      <th>Supplier</th>
                      <th>Action</th>
                      <!--<th>Delete</th>-->
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($purchases as $purchase)

                      @if(isset($debt))
                        @if($purchase->total_amount > $purchase->total_pay)
                          <tr>
                            <td>{{ $purchase->purchase_id }}</td>
                            <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($purchase->date_of_purchase))->toFormattedDateString() }}</td>
                            <td>
                              @forelse($allproducts as $product)
                                @if($product->id==$purchase->product)
                                  {{ $product->stock_name }}
                                @endif
                              @empty
                              @endforelse
                            </td>
                            <td>{{ $purchase->total_amount }}</td>
                            <td>{{ $purchase->total_pay}}</td>
                            <td>{{ $purchase->balance }}</td>
                            <td>
                              @forelse($suppliers as $supplier)
                                @if($supplier->id==$purchase->supplier)
                                  {{ $supplier->supplier_name }}
                                @endif
                              @empty
                              @endforelse
                            </td>
                            <th><a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#editpurchase{{ $purchase->id }}">Edit</a> </th>
                            <!--<td>
                              <form action="{{ url('/deletepurchase') }}/{{$purchase->id}}" method="POST">
                                {{ csrf_field() }}
                                {{ Method_field('DELETE') }}
                                
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                              </form>
                            </td>-->
                          </tr>
                        @endif
                      @else
                        <tr>
                            <td>{{ $purchase->purchase_id }}</td>
                            <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($purchase->date_of_purchase))->toFormattedDateString() }}</td>
                            <td>
                              @forelse($allproducts as $product)
                                @if($product->id==$purchase->product)
                                  {{ $product->stock_name }}
                                @endif
                              @empty
                              @endforelse
                            </td>
                            <td>{{ $purchase->total_amount }}</td>
                            <td>{{ $purchase->total_pay}}</td>
                            <td>{{ $purchase->balance }}</td>
                            <td>
                              @forelse($suppliers as $supplier)
                                @if($supplier->id==$purchase->supplier)
                                  {{ $supplier->supplier_name }}
                                @endif
                              @empty
                              @endforelse
                            </td>
                            <th><a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#editpurchase{{ $purchase->id }}">Edit</a> </th>
                            <!--<td>
                              <form action="{{ url('/deletepurchase') }}/{{$purchase->id}}" method="POST">
                                {{ csrf_field() }}
                                {{ Method_field('DELETE') }}
                                
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                              </form>
                            </td>-->
                          </tr>
                      @endif

                      <div class="modal fade" id="editpurchase{{ $purchase->id }}">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Purchase</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="col-sm-12" method="POST" action="{{ url('/updatepurchase') }}">
                                  {{ csrf_field() }}
                                  <div class="form-group">
                                    <label>Name of Item</label>
                                    <select class="form-control" name="product" required="">
                                        @forelse($allproducts as $product)
                                          <option value="{{ $product->id }}" @if($product->id==$purchase->product) Selected @endif>{{ $product->stock_name  }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" class="form-control" name="quantity" value="{{ $purchase->quantity }}" required>
                                  </div>


                                  <div class="form-group">
                                    <label>Supplier</label>
                                    <select class="form-control" name="supplier" required="">
                                        @forelse($suppliers as $supplier)
                                          <option value="{{ $supplier->id }}" @if($supplier->id==$purchase->supplier) Selected @endif>{{ $supplier->supplier_name  }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label>Date of Purchase</label>
                                    <input type="date" class="form-control" name="date_of_purchase"  value="{{ $purchase->date_of_purchase->format('Y-m-d') }}" required>
                                  </div>

                                  <div class="form-group">
                                    <label>Purchase ID</label>
                                    <input type="text" class="form-control" name="purchase_id" value="{{ $purchase->purchase_id }}" readonly="true">
                                  </div>

                                 
                                  <div class="form-group">
                                    <label>Cost of Product (<span>&#8358;</span>)</label>
                                    <input type="number" class="form-control" name="total_amount" value="{{ $purchase->total_amount }}" required="">
                                  </div>

                                  <div class="form-group">
                                    <label>Amount Paid (<span>&#8358;</span>)</label>
                                    <input type="number" class="form-control" name="total_pay" value="{{ $purchase->total_pay }}" required="">
                                  </div>

                                  <div class="reset button">
                                    <button type="submit" class="btn btn-success">Save</button>
                                  </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
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

  <div class="modal fade" id="addpurchase">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Purchase</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="col-sm-12" method="POST" action="{{ url('/purchase') }}">
              {{ csrf_field() }}
              <div class="form-group">
                <label>Name of Item</label>
                <select class="form-control" name="product" required="">
                    @forelse($allproducts as $product)
                      <option value="{{ $product->id }}">{{ $product->stock_name  }}</option>
                    @empty
                    @endforelse
                </select>
              </div>

              <div class="form-group">
                <label>Quantity</label>
                <input type="number" class="form-control" name="quantity" required>
              </div>

              <div class="form-group">
                <label>Supplier</label>
                <select class="form-control" name="supplier" required="">
                    @forelse($suppliers as $supplier)
                      <option value="{{ $supplier->id }}">{{ $supplier->supplier_name  }}</option>
                    @empty
                    @endforelse
                </select>
              </div>

              <div class="form-group">
                <label>Date of Purchase</label>
                <input type="date" class="form-control" name="date_of_purchase" required>
              </div>

              <div class="form-group">
                <label>Purchase ID</label>
                <input type="text" class="form-control" name="purchase_id" value="{{ $random_number }}" readonly="true">
              </div>

             
              <div class="form-group">
                <label>Cost of Product (<span>&#8358;</span>)</label>
                <input type="number" class="form-control" name="total_amount" required="">
              </div>

              <div class="form-group">
                <label>Amount Paid (<span>&#8358;</span>)</label>
                <input type="number" class="form-control" name="total_pay" required="">
              </div>

              <div class="reset button">
                <button type="submit" class="btn btn-success">Save</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection