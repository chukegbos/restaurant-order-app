@extends('layouts.app2')
@section('pageTitle', 'My Acccont')
@section('content')
<div class="page-container">
    <div class="page-content-wrapper">
        <section class="section-reservation-form" style="padding: 20px">
            <div class="container">
                <div class="section-content">
                    <div class="swin-sc swin-sc-title style-2">
                        <h3 class="title"><span>My Account</span></h3>
                    </div>
                  
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <div class="reservation-form">
                                <div class="swin-sc swin-sc-contact-form light mtl">
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
                                    <div class="swin-sc swin-sc-title style-2">
                                        <h3 class="title"><span>Login</span></h3>
                                    </div>
                                   
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!--<div class="form-group{{ $errors->has('bar') ? ' has-error' : '' }}">
                                            <label for="bar" class="col-md-4 control-label">Select Bar</label>

                                            <div class="col-md-6">
                                                <select class="form-control" name="bar">
                                                    <option value="Admin">Super Admin</option>
                                                    @forelse($bars as $bar)
                                                        <option value="{{ $bar->id }}">{{ $bar->bar_name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>

                                                @if ($errors->has('bar'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('bar') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>-->


                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="remember" value="{{ old('remember') ? 'checked' : '' }}"> Remember Me
                                                    </label>
                                                </div>
                                                <a class="forgot-pwd" href="{{ route('password.request') }}">
                                                    Forgot Your Password?
                                                </a><br>
                                                No Account? <a href="{{ route('register') }}" class="already-have">Signup here</a>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Login
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
