@extends('layouts.admin')
@section('pageTitle', 'Bar Attendants')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Bar Attendants</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Bars</li>
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
                <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#adduser"> 
                  <i class="fa fa-plus"></i> Add Attendants
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
                      <th>Name</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Action</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($users as $user)
                      <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <th>
                          <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#edituser{{ $user->id }}"><i class="fa fa-edit"></i> Edit</a> 
                          <a href="#" class="btn btn-info btn-xs">Transactions</a>
                        </th>

                        <td>
                          <form action="{{ url('/deleteuser') }}/{{$user->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ Method_field('DELETE') }}
                            
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                          </form>
                        </td>
                      </tr>


                      <div class="modal fade" id="edituser{{ $user->id }}">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Attendant</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="col-sm-12" method="POST" action="{{ url('/updateuser') }}">
                                  {{ csrf_field() }}
                                  <div class="form-group">
                                  <label>Name of Attendant</label>
                                  <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                  <input type="hidden" name="id" value="{{ $user->id }}">
                                </div>

                                <div class="form-group">
                                  <label>Username</label>
                                  <input type="text" class="form-control" name="username" value="{{ $user->username }}" required>
                                </div>

                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" class="form-control" name="email" value="{{ $user->email }}" required="">
                                </div>

                                <div class="form-group">
                                  <label>Phone</label>
                                  <input type="tel" class="form-control" name="phone" value="{{ $user->phone }}" required>
                                </div>

                                <div class="form-group">
                                  <label>Address</label>
                                  <textarea class="form-control" name="address" required>
                                    {{ $user->address }}
                                  </textarea>
                                </div>

                                <div class="reset button">
                                  <button type="submit" class="btn btn-success">Update</button>
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

  <div class="modal fade" id="adduser">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="col-sm-12" method="POST" action="{{ url('/storeuser') }}">
              {{ csrf_field() }}
              <div class="form-group">
                <label>Name of Attendant</label>
                <input type="text" class="form-control" name="name" required>
              </div>

              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" required>
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required="">
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required="">
              </div>

              <div class="form-group">
                <label>Phone</label>
                <input type="tel" class="form-control" name="phone" required>
              </div>

              <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" name="address" required></textarea>
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