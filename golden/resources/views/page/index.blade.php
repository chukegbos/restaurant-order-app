@extends('layouts.admin')
@section('pageTitle', 'Dashhoard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
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

        @if(Auth::user()->role!="Attendant")
          <section class="content">
            <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>{{ $countproduct }}</h3>

                      <p>Products</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ url('/product') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>{{ $countpurchase }}</h3>

                      <p>Purchase</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-archway"></i>
                    </div>
                    <a href="{{ url('/purchase') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>{{ $countsale }}</h3>

                      <p>Sales</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ url('/orders') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>{{ $countsupplier }}</h3>

                      <p>Suppliers</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ url('/supplier') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                
                <!-- ./col -->
              </div>
              <!-- /.row -->
              <!-- Main row -->
              <div class="row">
                <!-- Left col -->
                <section class="col-lg-6 connectedSortable">
                  <!-- Custom tabs (Charts with tabs)-->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Sales
                      </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content p-0">
                        
                      </div>
                    </div><!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-6 connectedSortable">
                  <!-- solid sales graph -->
                  <div class="card bg-gradient-info">
                    <div class="card-header border-0">
                      <h3 class="card-title">
                        <i class="fas fa-th mr-1"></i>
                        Purchase
                      </h3>
                    </div>
                    <div class="card-body">
                      <div class="tab-content p-0">

                      </div>
                    </div>
                  </div>
                </section>
                <!-- right col -->
              </div>
            </div><!-- /.container-fluid -->
          </section>
        @else
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <section class="col-lg-5 connectedSortable">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                       
                      </h3>
                    </div><!-- /.card-header -->
                    <div class="row">
                      
                      <div class="col-md-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                          <div class="inner">
                            <h3>{{ $barproductscount }}</h3>

                            <p>Inventory</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-bag"></i>
                          </div>
                          <a href="{{ url('/store') }}/?bar=bar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                          <div class="inner">
                            <h3>{{ $orders }}</h3>

                            <p>Bar Sales</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-archway"></i>
                          </div>
                          <a href="{{ url('/orders') }}/?attendant=attendant" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <section class="col-lg-7 connectedSortable">
                  <!-- Custom tabs (Charts with tabs)-->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Last user sales Report for this bar
                      </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content p-0">
                        <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                          <tr>
                            <th>Name of Attendant</th>
                            <td>
                              @forelse($theusers as $user)
                                @if(isset($agent))
                                  @if($user->id==$report->agent)
                                  {{ $user->name }}
                                  @endif
                                @endif
                              @empty
                              @endforelse
                            </td>
                          </tr>
                          <tr>
                            <th>Number of Transaction</th>
                            <td>@if(isset($agent)) {{ $report->product }} @endif</td>
                          </tr>
                          <tr>
                            <th>Total Amount</th>
                            <td><span>&#8358;</span>@if(isset($agent)) {{ $report->amount }} @endif</td>
                          </tr>
                        </table>
                      </div>
                      </div>
                    </div><!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </section>        
              </div>
            </div>
          </section>
        @endif
        <!-- /.content -->
    </div>
@endsection