@extends('layouts.app2')
@section('pageTitle', 'Contact')
@section('content')
  <div class="page-container">
    <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-contact">
      <div class="container">
        <div class="title-wrapper">
          <div data-top="transform: translateY(0px);opacity:1;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">Contact Us</div>
          <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
          <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">Let us know if you have any concern about our menu, service or other information you want to have</div>
        </div>
      </div>
    </div>
    <div class="page-content-wrapper">
      <section class="ct-info-section padding-top-100 padding-bottom-100">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-12">
              <div class="swin-sc swin-sc-title style-2 text-left">
                <p class="title"><span>Find Us</span></p>
              </div>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.676008620146!2d7.53754281443992!3d6.306228927401348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10435926bdc428ab%3A0xecafab1f557ced83!2sFaculty%20Of%20Environmental%20Sciences%2C%20Esut!5e0!3m2!1sen!2sng!4v1576528823381!5m2!1sen!2sng" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
            <div class="col-md-4">
              <div class="swin-sc swin-sc-title style-2 text-left">
                <p class="title"><span>Contact Info</span></p>
              </div>
              <div class="swin-sc swin-sc-contact">
                <div class="media item">
                  <div class="media-left">
                    <div class="wrapper-icon"><i class="icons fa fa-map-marker"></i></div>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading title">Address</h4>
                    <div class="description">{{ $setting->address }}</div>
                  </div>
                </div>
                <!--<div class="media item">
                  <div class="media-left">
                    <div class="wrapper-icon"><i class="icons fa fa-map-marker"></i></div>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading title">Restaurent 2</h4>
                    <div class="description">158 White Oak Drive Kansas City</div>
                  </div>
                </div>-->
                <div class="media item">
                  <div class="media-left">
                    <div class="wrapper-icon"><i class="icons fa fa-phone"></i></div>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading title">Phone Number</h4>
                    <div class="description">{{ $setting->phone }}</div>
                  </div>
                </div>
                <div class="media item">
                  <div class="media-left">
                    <div class="wrapper-icon"><i class="icons fa fa-envelope"></i></div>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading title">Mail</h4>
                    <div class="description">
                      <p>{{ $setting->email }}</p>
                    </div>
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