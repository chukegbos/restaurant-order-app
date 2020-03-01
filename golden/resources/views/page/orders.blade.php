@extends('layouts.admin')
@section('pageTitle', 'Sales')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Sales</li>
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
                      <th>Sale ID</th>
                      <th>Buyer</th>
                      <th>Total Price (Naira)</th>
                      <th>Payment Staus</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($orders as $order)
                    <tr>
                      <td>{{ $order->sale_id }}</td>
                      <td>@forelse($theusers as $user)
                          @if($user->id==$order->buyer)
                          {{ $user->name }}
                          @endif
                        @empty
                        @endforelse
                      </td>
                      <td>N{{ $order->cart->totalPrice }}</td>  
                      <td>
                        @if($order->payment_status=="Paid") <span style="color: green">Paid </span> @else <span style="color: red"> Unpaid </span> @endif
                      </td>

                      <td>
                        {{ $order->delivery_status}}
                        <form action="{{ url('/changestatus') }}" method="post">
                          {{ csrf_field() }}
                          <input type="hidden" name="id" value="{{ $order->id }}">
                          <select name="delivery_status" onchange='form.submit()'>
                            <option value="Pending">Pending</option>
                            <option value="In-progress">In-progress</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>
                          </select>
                        </form>
                      </td>
                      <td>{{ $order->created_at->toFormattedDateString() }}</td>
                      <td><a href="{{ url('/vieworders') }}/?pid={{ $order->sale_id }}" class="btn btn-success">View</a></td>                 
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