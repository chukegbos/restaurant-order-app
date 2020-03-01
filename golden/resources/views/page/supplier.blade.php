@extends('layouts.admin')
@section('pageTitle', 'Suppliers')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Suppliers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Suppliers</li>
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
                <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#addsupplier"> 
                  <i class="fa fa-plus"></i> Add Supplier
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
                      <th>Supplier</th>
                      <th>Contact Person</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Action</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($suppliers as $supplier)
                      <tr>
                        <td>{{ $supplier->supplier_name }}</td>
                        <td>{{ $supplier->contact_person}}</td>
                        <td>{{ $supplier->email}}</td>
                        <td>{{ $supplier->phone}}</td>
                        </td>
                        <th><a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#editsupplier{{ $supplier->id }}">Edit</a> </th>
                        <td>
                          <form action="{{ url('/deletesupplier') }}/{{$supplier->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ Method_field('DELETE') }}
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                          </form>
                        </td>
                      </tr>


                      <div class="modal fade" id="editsupplier{{ $supplier->id }}">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit supplier</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="col-sm-12" method="POST" action="{{ url('/updatesupplier') }}">
                                  {{ csrf_field() }}
                                  
                                  <div class="form-group">
                                    <label>Supplier</label>
                                    <input type="text" class="form-control" name="supplier_name" value="{{ $supplier->supplier_name }}" required="">
                                    <input type="hidden" name="id" value="{{ $supplier->id }}">
                                  </div>

                                  <div class="form-group">
                                    <label>Contact Person</label>
                                    <input type="text" class="form-control" name="contact_person" required value="{{ $supplier->contact_person }}">
                                  </div>

                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" required value="{{ $supplier->email }}">
                                  </div>

                                  <div class="form-group">
                                    <label>Phone</label>
                                    <input type="tel" class="form-control" name="phone" required value="{{ $supplier->phone }}">
                                  </div>

                                  <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" required="">{{ $supplier->address }}</textarea>
                                  </div>

                                  <div class="form-group">
                                    <label>Name of Bank</label>
                                    <input type="text" class="form-control" name="bank_name" value="{{ $supplier->bank_name }}">
                                  </div>

                                  <div class="form-group">
                                    <label>Account Number</label>
                                    <input type="text" class="form-control" name="bank_account" value="{{ $supplier->bank_account }}">
                                  </div>

                                  <div class="form-group">
                                    <label>Name of Account</label>
                                    <input type="text" class="form-control" name="account_name" value="{{ $supplier->account_name }}">
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

  <div class="modal fade" id="addsupplier">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add supplier</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="col-sm-12" method="POST" action="{{ url('/supplier') }}">
              {{ csrf_field() }}
              <div class="form-group">
                <label>Supplier</label>
                <input type="text" class="form-control" name="supplier_name" required>
              </div>

              <div class="form-group">
                <label>Contact Person</label>
                <input type="text" class="form-control" name="contact_person" required="">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
              </div>

              <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" class="form-control" name="phone">
              </div>

              <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" name="address" required=""></textarea>
              </div>

              <div class="form-group">
                <label>Name of Bank</label>
                <input type="text" class="form-control" name="bank_name">
              </div>

              <div class="form-group">
                <label>Account Number</label>
                <input type="text" class="form-control" name="bank_account">
              </div>

              <div class="form-group">
                <label>Name of Account</label>
                <input type="text" class="form-control" name="account_name">
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