@extends('layouts.admin')
@section('pageTitle', 'Meal')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Meals</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Meals</li>
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
                <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#addproduct"> 
                  <i class="fa fa-plus"></i> Add Meal
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
                      <th>Meal ID</th>
                      <th>Meal Name</th>
                      <th>Featured Image</th>
                      <th>Category</th>
                      <th>Price(<span>&#8358;</span>)</th>
                      <th>Action</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($products as $product)
                      <tr>
                        <td>{{ $product->stock_id }}</td>
                        <td>{{ $product->stock_name }}</td>
                        <td><img src="{{ asset('storage') }}/{{ $product->image }}" class="center img-responsive img-fluid" style="height: 70px; width: 70px"></td>
                        <td>
                          @if($product->category=="General")
                            General
                          @else
                            @forelse($categories as $category)
                              @if($category->id==$product->category)
                                {{ $category->name }}
                              @endif
                            @empty
                            @endforelse
                          @endif
                        </td>
                        <td>{{ $product->selling_price}}</td>
                        <th>
                          <a class="btn btn-warning btn-xs" href="#" data-toggle="modal" data-target="#editproduct{{ $product->id }}"><i class="fa fa-edit"></i> Edit</a> 
                          
                          <a href="{{ url('/addcart') }}/{{$product->id}}" class="btn btn-info btn-xs">Add to Cart</a>
                        </th>

                        <td>
                          <form action="{{ url('/deleteproduct') }}/{{$product->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ Method_field('DELETE') }}
                            
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                          </form>
                        </td>
                      </tr>


                      <div class="modal fade" id="editproduct{{ $product->id }}">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Meal</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="col-sm-12" method="POST" action="{{ url('/updateproduct') }}" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                  <div class="form-group">
                                    <label>Name of Meal</label>
                                    <input type="text" class="form-control" name="stock_name" required value="{{ $product->stock_name }}">
                                  </div>

                                  <div class="form-group">
                                    <label>Meal ID</label>
                                    <input type="text" class="form-control" name="stock_id" value="{{ $product->stock_id }}" readonly="true">
                                  </div>

                                  <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                        <option value="General">General</option>
                                      @forelse($categories as $category)
                                        <option value="{{ $category->id }}"  @if($product->category==$category->id) selected @endif>{{ $category->name }}</option>
                                      @empty
                                      @endforelse
                                    </select>
                                  </div>
                                  <!--<div class="form-group">
                                    <label>Cost Price (<span>&#8358;</span>)</label>
                                    <input type="number" class="form-control" name="cost_price" required="" value="{{ $product->cost_price }}">
                                  </div>-->

                                  <div class="form-group">
                                    <label>Selling Price (<span>&#8358;</span>)</label>
                                    <input type="number" class="form-control" name="selling_price" value="{{ $product->selling_price }}" required="">
                                  </div>

                                  <div class="form-group">
                                    <label>Featured Image</label>
                                    <input type="file" class="form-control" name="image">
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

  <div class="modal fade" id="addproduct">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Meal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="col-sm-12" method="POST" action="{{ url('/product') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <label>Name of Meal</label>
                <input type="text" class="form-control" name="stock_name" required>
              </div>

              <div class="form-group">
                <label>Meal ID</label>
                <input type="text" class="form-control" name="stock_id" value="{{ $random_number }}" readonly="true">
              </div>

              <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category">
                    <option selected="" value="General">General</option>
                  @forelse($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @empty
                  @endforelse
                </select>
              </div>
              <!--<div class="form-group">
                <label>Cost Price (<span>&#8358;</span>)</label>
                <input type="number" class="form-control" name="cost_price" required="">
              </div>-->

              <div class="form-group">
                <label>Selling Price (<span>&#8358;</span>)</label>
                <input type="number" class="form-control" name="selling_price" required="">
              </div>

              <div class="form-group">
                <label>Featured Image</label>
                <input type="file" class="form-control" name="image" required="">
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