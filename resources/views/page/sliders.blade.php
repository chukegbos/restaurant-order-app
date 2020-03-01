@extends('layouts.admin')
@section('pageTitle', 'Sliders')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sliders</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Sliders</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#addslidermodal"> 
                <i class="fa fa-plus"></i> Add Slider
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
              <h4>  <i class="icon fa fa-times"></i> Error!</h4>
                {{ $error}}
            </div>
          @endif
          <div class="card-body">
            <div class="table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Short Descripton</th>
                    <th>Image</th>
                    <!--<th>Edit</th>-->
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($sliders as $slider)
                  <tr>
                    <td>{{ $slider->title }}</td>
                    <th>{{ substr(strip_tags($slider->description) , 0, 90) }} ...</th>
                    <th><img class="img-thumbnail" src="{{ asset('storage') }}/{{ $slider->image }}" width="70px"></th>
                    <!--<a href=""><i class="fa fa-edit btn btn-info"></i> </a>
                     <td> 
                      <a 
                        class="open-AddBookDialog btn btn-info" 
                        href="#" 
                        data-toggle="modal" 
                        data-target="#editmodal" 

                        data-id="{{ $slider->id }}"
                        data-title="{{ $slider->title }}"
                        data-description="{{ strip_tags($slider->description) }}">
                        
                        <i class="fa fa-edit"></i> 
                        </a>
                    </td>-->
                    <td>
                      <form action="{{ url('/admin/destroyslider') }}/{{$slider->id}}" method="POST">
                        {{ csrf_field() }}
                        {{ Method_field('DELETE') }}
                         <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                  @empty
                  @endforelse
                </tbody>                     
              </table>
            </div>
          </div>
        </div>
      </div>  
    </div>      
  </section>
  <div 
    class="modal fade" 
    id="addslidermodal" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="myModalLabel" 
    aria-hidden="true" s
    tyle="display: none;">
    <div class="modal-dialog" style="background:white">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"> Add Slider</h4>
        </div>
        <div class="modal-body">
          <form method="post" class="profile-wrapper" enctype="multipart/form-data" action="{{ url('admin/slider') }}" >
             {{ csrf_field() }}
              
              <div class="form-group">
                  <label for="fname">Title</label>                     
                  <input class="form-control" type="text" name="title" required autofocus>
              </div> 

              <div class="form-group">
                  <label for="fname">Short Description</label>
                  <textarea  class="form-control"  cols="50" name="description">
                  </textarea>
              </div>

              <div class="form-group">
                  <label for="fname">Featured Image</label>
                  <input class="form-control" type="file" name="image" required autofocus>  
              </div>   

              <button type="submit" class="btn btn-success pull-right">Add <i class="fa fa-save"></i></button>                              
          </form>
        </div>
        
        <div class="modal-footer">
         
        </div>
      </div><!-- /.modal-content -->                     
    </div>
  </div>
  <div 
    class="modal fade" 
    id="editmodal" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="myModalLabel" 
    aria-hidden="true" 
    style="display: none;">
      <div class="modal-dialog" style="background:white">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"> Edit slider</h4>
          </div>
          <div class="modal-body">
            <form method="post" class="profile-wrapper" enctype="multipart/form-data" action="{{ url('admin/editslider') }}" >
               {{ csrf_field() }}
               {{ method_field('PUT') }}
                <span id="mainname"></span>
                <div class="form-group">
                    <label for="fname">Title</label>   
                    <input type="hidden" name="id" id="mainid">                   
                    <input class="form-control" type="text" name="name" id="mainname" Required>                     
                </div>

                
                <div class="form-group">
                    <label for="fname">Description</label>  
                    <textarea class="form-control" id="maincode" name="description" required autofocus></textarea>                   
                </div>

                <div class="form-group">
                    <label for="fname">Featured Image</label>

                    <input class="form-control" type="file" name="image" required autofocus>  
                </div>  
                <button type="submit" class="btn btn-success pull-right">Save <i class="fa fa-save"></i></button>                              
            </form>
          </div>
          
          <div class="modal-footer">
           
          </div>
        </div><!-- /.modal-content -->                     
    </div>
  </div>
  <script>
    //result modal
    $(document).on("click", ".open-AddBookDialog", function () {
       var facultyId = $(this).data('id');
       var facultyname = $(this).data('title');
       var facultycode = $(this).data('description');

       $(".modal-body #mainid").val( facultyId );
       $(".modal-body #mainname").val( facultyname );
       $(".modal-body #maincode").val( facultycode );
      $('#editmodal').modal('show');
    });
  </script>
</div>
@endsection
