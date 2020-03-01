@extends('layouts.admin')
@section('pageTitle', 'Outlets')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Outlets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Outletss</li>
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
                <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#addbar"> 
                  <i class="fa fa-plus"></i> Add Outlets
                </a>  
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
                      <th>Outlet Name</th>
                      <th>Outlets ID</th>
                      <th>Current Manager</th>
                      <th>Action</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($bars as $bar)
                      <tr>
                        <td>{{ $bar->bar_name }}</td>
                        <td>{{ $bar->bar_id }}</td>
                        <td>
                          @if(isset($bar->current_manager))
                            @forelse($theusers as $user)
                            
                              @if($user->id==$bar->current_manager)
                              {{ $user->name }}
                              @endif
                            @empty
                            @endforelse
                          @else
                            No Attendant
                          @endif
                        </td>
                        <th>
                          <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#editbar{{ $bar->id }}"><i class="fa fa-edit"></i> Edit</a> 
                          <a href="{{ url('/store') }}/?bar_id={{$bar->bar_id}}" class="btn btn-info btn-xs">Inventory</a>
                          <a href="{{ url('/orders') }}/?barid={{$bar->id}}" class="btn btn-warning btn-xs">Sales</a>
                        </th>

                        <td>
                          <form action="{{ url('/deletebar') }}/{{$bar->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ Method_field('DELETE') }}
                            
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                          </form>
                        </td>
                      </tr>


                      <div class="modal fade" id="editbar{{ $bar->id }}">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Outlet</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="col-sm-12" method="POST" action="{{ url('/updatebar') }}">
                                  {{ csrf_field() }}
                                  <div class="form-group">
                                    <label>Name of Bar</label>
                                    <input type="text" class="form-control" name="bar_name" required value="{{ $bar->bar_name }}">
                                  </div>

                                  <div class="form-group">
                                    <label>Bar ID</label>
                                    <input type="text" class="form-control" name="bar_id" value="{{ $bar->bar_id }}" readonly="true">
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

  <div class="modal fade" id="addbar">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Outlet</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="col-sm-12" method="POST" action="{{ url('/bar') }}">
              {{ csrf_field() }}
              <div class="form-group">
                <label>Name of Outlet</label>
                <input type="text" class="form-control" name="bar_name" required>
              </div>

              <div class="form-group">
                <label>Outlet ID</label>
                <input type="text" class="form-control" name="bar_id" value="{{ $random_number }}" readonly="true">
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