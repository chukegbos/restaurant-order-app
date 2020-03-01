@extends('layouts.app2')
@section('pageTitle', 'Dashboard')
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
            <div class="col-md-12"> 
              @include('component.usersidebar')  
              <div class="content">
                <div class="swin-sc swin-sc-contact-form light mtl" style="padding: 30px">
                  <p>Hello {{ Auth::user()->name }}</p> 

                  <p>From your account dashboard you can view your recent orders, manage your shopping and billing addresses, and edit your password and Accountt details.</p>
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