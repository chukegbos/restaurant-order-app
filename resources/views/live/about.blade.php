@extends('layouts.app2')
@section('pageTitle', 'About')
@section('content')
  <div class="page-container">
    <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-about">
      <div class="container">
        <div class="title-wrapper">
          <div data-top="transform: translateY(0px);opacity:1;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">About Us</div>
          <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
         
        </div>
      </div>
    </div>
    <div class="page-content-wrapper">
      <section class="ab-timeline-section padding-top-100 padding-bottom-100">
        <div class="container">
         
          <div data-item="6" class="swin-sc swin-sc-timeline-2">
          
            <div class="timeline-content-item">
              <div class="timeline-content-detail">
                <p style="text-align: justify;">{{ strip_tags($setting->about) }}</p>
              </div>
            </div>         
          </div>
        </div>
      </section>
      <section data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -150px;" class="ab-testimonial-section padding-top-100 padding-bottom-100">
        <div class="container"><img src="assets/images/background/ab_team_01.png" alt="" class="img-left img-bg img-deco img-responsive">
          <div class="row">
            <div class="col-md-8 col-md-offset-4">
              <div class="swin-sc swin-sc-testimonial style-2 option-2">
                
                <div class="testi-item item"><i class="testi-icon fa fa-quote-left"></i>
                  <div class="testi-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                  </div><img src="assets/images/testi/testi-signal.png" alt="" class="testi-signal">
                  <div class="testi-info"><span class="name">Eze, Onyedichi Anthony</span> <span class="position">CEO</span></div>
                </div>
              
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="featured-section padding-top-100 padding-bottom-100">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="swin-sc swin-sc-title">
                <p class="top-title"><span>Our Special</span></p>
                <h3 class="title">Amazing Featured</h3>
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="swin-sc sc-featured-box item wow fadeInUp"><img src="assets/images/featured-box-bg-1.jpg" alt="fooday" class="box-bg">
                    <div class="box-inner">
                      <h4 class="box-title">FRESH MENU</h4>
                      <div class="box-content">Lorem ipsum dolor sit amet, consec adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</div>
                      <div class="btn-wrap text-center"><a href="javascript:void(0)" class="btn swin-btn"><span>Read More</span></a></div>
                      <div class="showcase"><img src="assets/images/feature-box-bg.jpg" alt="" class="img-responsive img-showcase">
                        <div class="title-showcase">FRESH MENU</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div data-wow-delay="0.5s" class="swin-sc sc-featured-box item wow fadeInUp"><img src="assets/images/featured-box-bg-1.jpg" alt="fooday" class="box-bg">
                    <div class="box-inner">
                      <h4 class="box-title">VARIOUS DRINK</h4>
                      <div class="box-content">Lorem ipsum dolor sit amet, consec adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</div>
                      <div class="btn-wrap text-center"><a href="javascript:void(0)" class="btn swin-btn"><span>Read More</span></a></div>
                      <div class="showcase"><img src="assets/images/feature-box-bg-2.jpg" alt="" class="img-responsive img-showcase">
                        <div class="title-showcase">VARIOUS DRINK</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div data-wow-delay="1s" class="swin-sc sc-featured-box item wow fadeInUp"><img src="assets/images/featured-box-bg-1.jpg" alt="fooday" class="box-bg">
                    <div class="box-inner">
                      <h4 class="box-title">EXCLUSIVE DISHES</h4>
                      <div class="box-content">Lorem ipsum dolor sit amet, consec adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</div>
                      <div class="btn-wrap text-center"><a href="javascript:void(0)" class="btn swin-btn"><span>Read More</span></a></div>
                      <div class="showcase"><img src="assets/images/feature-box-bg-3.jpg" alt="" class="img-responsive img-showcase">
                        <div class="title-showcase">EXCLUSIVE DISHES</div>
                      </div>
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