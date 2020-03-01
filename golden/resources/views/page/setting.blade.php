@extends('layouts.admin')
@section('pageTitle', 'Site Setting')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Site Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Site Settings</li>
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
            <div class="card-body">
              <form method="POST" action="{{ url('setting') }}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                  <label>Site Name</label>
                  <input type="text" class="form-control" value="{{ $setting->sitename }}" required name="sitename">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control"  value="{{ $setting->email }}" required name="email">
                </div>

                <div class="form-group">
                  <label>Mobile Number</label>
                  <input type="tel" name="phone" class="form-control" value="{{ $setting->phone }}">
                </div>

                <div class="form-group">
                  <label>Address</label>
                  <textarea id="some-textarea" name="address" class="form-control">{{ $setting->address }}
                  </textarea>
                </div>


                <div class="form-group">
                  <label>About</label>
                  <textarea  class="form-control" id="editor1" rows="50" cols="10" name="about">{{ $setting->about }}
                  </textarea>
                  <script>
                      // Replace the <textarea id="editor1"> with a CKEditor
                      // instance, using default configuration.
                      CKEDITOR.replace( 'editor1' );
                  </script>
                </div>

                <div class="form-group">
                  <label>Facebook Link</label>
                  <input type="text" class="form-control" value="{{ $setting->facebook }}" name="facebook">
                </div>

                <div class="form-group">
                  <label>Twitter Link</label>
                  <input type="text" class="form-control" value="{{ $setting->twitter }}" name="twitter">
                </div>

                <div class="form-group">
                  <label>Instagram Link</label>
                  <input type="text" class="form-control" value="{{ $setting->instagram }}" name="instagram">
                </div>

                <div class="form-group">
                  <label>LinkedIn Link</label>
                  <input type="text" class="form-control" value="{{ $setting->linkedin }}" name="linkedin">
                </div>


                <div class="form-group">
                  <label>Upload Logo</label>
                  <input type="file" name="logo" class="form-control">
                </div>

                <div class="form-group">
                  <button class="btn btn-success" type="submit">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection