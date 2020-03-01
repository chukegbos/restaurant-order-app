<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
	<head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Home</title>
	    <!-- Bootstrap CSS-->
	    <link href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	    <!-- Font Awesome-->
	    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
	 
	    <link rel="stylesheet" href="{{ asset('assets/vendors/flexslider/flexslider.min.css') }}">
	    <link rel="stylesheet" href="{{ asset('assets/vendors/swipebox/css/swipebox.min.css') }}">
	    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick.min.css') }}">
	    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick-theme.min.css') }}">
	    <link rel="stylesheet" href="{{ asset('assets/vendors/animate.min.css') }}">
	    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
	    <link rel="stylesheet" href="{{ asset('assets/vendors/pageloading/css/component.min.css') }}">
	    <!-- Font-icon-->
	    <link rel="stylesheet" href="{{ asset('assets/fonts/font-icon/style.css') }}">
	    <!-- Style-->
	    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/layout.css') }}">
	    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/elements.css') }}">
	    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/extra.css') }}">
	    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/widget.css') }}">
	    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/live-settings.css') }}">
	    <link id="colorpattern" rel="stylesheet" type="text/css" href="{{ asset('assets/css/color/colordefault.css') }}">
	    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
	    <!-- Google Font-->
	    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,700i" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Rancho" rel="stylesheet">
	    <!-- Script Loading Page-->
	    <script src="{{ asset('assets/vendors/html5shiv.js') }}"></script>
	    <script src="{{ asset('assets/vendors/respond.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/pageloading/js/snap.svg-min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/pageloading/sidebartransition/js/modernizr.custom.js') }}"></script>
	    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	    <style type="text/css">
		    @media screen and (min-width: 400px) {
		      .logom {
		        height: 50px;
		      }
		    }

		    @media screen and (min-width: 300px) {
		      .logom {
		        height: 50px;
		      }
		    }

		    @media screen and (min-width: 800px) {
		      .logom {
		        height: 60px; 
		        width: 150px
		      }
		    }
		</style>
	</head>
	<body>
	    <div id="pagewrap" class="pagewrap">
	      	<div id="html-content" class="wrapper-content">
		        <header>
		          	<div class="header-top top-layout-02 hidden-xs">
			            <div class="container">
			            	<div class="row">
				              	<div class="col-md-6 pull-left">
					                <div class="topbar-content">
					                  	<div class="item"> 
					                    	<div class="wg-contact">
					                    		<i class="fa fa-map-marker"></i>
					                    		<span>{{ $setting->address }}</span>
					                    	</div>
						                </div>
						                <div class="item"> 
					                    	<div class="wg-contact">
					                    		<i class="fa fa-phone"></i>
					                    		<span>{{ $setting->phone }}</span>
					                    	</div>
					                  	</div>

					                  
					                </div>
				              	</div>
				              	<div class="col-md-6 pull-right">
					                <div class="topbar-content" style="float: right;">
						                <div class="item">
						                    <ul class="socials-nb list-inline wg-social">
						                      <li><a href="{{ $setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
						                      <li><a href="{{ $setting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
						                      <li><a href="{{ $setting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
						                      <li><a href="{{ $setting->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						                    </ul>
						                </div>
					                  
					                  	<div class="item">
						                    <div class="wg-social">
						                    	<i class="fa fa-user"></i>
						                    	<a href="{{ url('shop/dashboard') }}">My Account</a>
						                    </div>
						                </div>
					                </div>
				              	</div>
			              	</div>
			            </div>
		          	</div>
		          	<div class="header-main">
			            <div class="container">
			              	<div class="open-offcanvas">&#9776;</div>
			              	<div class="utility-nav" style="margin-top: 30px;">
			                	<div class="dropdown">
						            <a href="{{ url('shop/shoppingcart') }}">
						                <i class="fa fa-shopping-cart" style="color: #f15f2a; font-size: 25px;"></i>
						                <span class="badge badge-danger" style="margin-top: -40px;">
						                  {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}
						                </span>
						            </a>
			                	</div>
			              	</div>

			              	<div class="header-logo">
			              		<a href="{{ url('/') }}" class="logo">
			              			<img src="{{ asset('storage') }}/{{ $setting->logo }}" alt="logo" class="logo-img logom">
			              		</a>
			              	</div>
			              	<nav id="main-nav-offcanvas" class="main-nav-wrapper">
				                <div class="close-offcanvas-wrapper">
				                	<span class="close-offcanvas">x</span>
				                </div>
				                <div class="main-nav">
				                  	<ul id="main-nav" class="nav nav-pills">
					                  	<li><a href="{{ url('/menu') }}">Menu</a></li>
					                  	<!--<li><a href="#">Reservations</a></li>-->
					                  	<li><a href="#">Our Outlet</a></li>
					                  	<li><a href="#">Our App</a></li>
					                  	<li><a href="{{ url('orders') }}">Track Order</a></li>
					                  	@guest
						                  	<li><a href="{{ url('shop/dashboard') }}">My Account</a></li>
						                @else
						                  	<li><a href="{{ url('shop/dashboard') }}">My Account</a></li>
						                  	<li>
						                  		<a href="{{ route('logout') }}"
		                                            onclick="event.preventDefault();
		                                                     document.getElementById('logout-form').submit();">
		                                            Logout
		                                        </a>

		                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                                            {{ csrf_field() }}
		                                        </form>
		                                    </li>
		                                @endguest
				                  	</ul>
				                </div>
			              	</nav>
			            </div>
		          	</div>
		        </header>


	        	@yield('content')


		        <footer>
		          <div class="subscribe-section"><img src="{{ asset('assets/images/background/bg5.png') }}" alt="" class="img-subscribe">
		            <div class="container">
		              <div class="subscribe-wrapper">
		                <div class="row">
		                  <div class="col-lg-8 col-lg-offset-2">
		                    <div class="subscribe-heading">
		                      <h3 class="title">Subcribe Us Now</h3>
		                      <div class="des">Get more news and delicious dishes everyday from us</div>
		                    </div>
		                    <form class="widget-newsletter">
		                      <input placeholder="Email" class="form-control"><span class="submit"><i class="fa fa-paper-plane"></i></span>
		                    </form>
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		          <div class="footer-main">
		            <div class="container">
		              <div class="ft-widget-area">
		                <div class="row">
		                  <div class="col-md-3 col-sm-6">
		                    <div class="ft-area1">
		                      <div class="swin-widget swin-widget-about">
		                        <div class="clearfix"><a class="wget-logo"><img src="{{ asset('storage') }}/{{ $setting->logo }}" alt="" class="img img-responsive logom"></a></div>
		                        <div class="wget-about-content">
		                          	<p style="text-align: justify;">{{ substr(strip_tags($setting->about) , 0, 150) }}</p>
		                          	<ul class="socials socials-about list-unstyled list-inline pull-left mtm">
		                              <li><a href="{{ $setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
				                      <li><a href="{{ $setting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
				                      <li><a href="{{ $setting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
				                      <li><a href="{{ $setting->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
		                          	</ul>
		                        </div>
		                      </div>
		                    </div>
		                  </div>
		                  <div class="col-md-3 col-sm-6">
		                    <div class="ft-area1">
		                      <div class="swin-widget widget-about">
		                        <div class="title-widget">Contact Us</div>
		                        <div class="widget-body widget-content clearfix">
		                          <div class="about-contact-info clearfix">
		                            <div class="info-content address-content">
		                              <div class="info-icon"><i class="fa fa-map-marker"></i></div>
		                              <div class="info-text">
		                                <p>{{ $setting->address }}</p>
		                              </div>
		                            </div>
		                            <div class="info-content phone-content">
		                              <div class="info-icon"><i class="fa fa-phone"></i></div>
		                              <div class="info-text">
		                                <p>{{ $setting->phone }}</p>
		                                <p>.</p>
		                                
		                              </div>
		                            </div>
		                            <div class="info-content email-content">
		                              <div class="info-icon"><i class="fa fa-envelope"></i></div>
		                              <div class="info-text">
		                                <p>{{ $setting->email }}</p>
		                                <p>.</p>
		                              </div>
		                            </div>
		                          </div>
		                        </div>
		                      </div>
		                    </div>
		                  </div>
		                  <div class="col-md-3 col-sm-6">
		                    <div class="ft-area1">
		                      <div class="swin-widget widget-pages">
		                        <div class="title-widget">Useful Link</div>
		                        <div class="widget-body widget-content">
		                          <ul class="list-unstyled">
		                            <li><a href="{{ url('/about') }}" class="link"><span class="text">About Us</span></a></li>
		                            <li><a href="#" class="link"><span class="text">Customer Service</span></a></li>
		                            <li><a href="{{ url('/contact') }}" class="link"><span class="text">Contact Us</span></a></li>
		                            <li><a href="#" class="link"><span class="text">Latest News</span></a></li>
		                            <li><a href="#" class="link"><span class="text">FAQs</span></a></li>
		                            <li><a href="#" class="link"><span class="text">Product Support</span></a></li>
		                          </ul>
		                        </div>
		                      </div>
		                    </div>
		                  </div>
		                  <div class="col-md-3 col-sm-6">
		                    <div class="ft-area1">
		                      <div class="swin-widget widget-open-hour">
		                        <div class="title-widget">Open Hour</div>
		                        <div class="widget-body widget-content">
		                          <div class="open-date-time">
		                            <div class="open-date-time-item">
		                              <div class="open-date">
		                                <div class="open-date-item">
		                                  <div class="open-date-text">
		                                    <p>Tuesday:</p>
		                                  </div>
		                                  <div class="open-date-dot">.......................................</div>
		                                </div>
		                              </div>
		                              <div class="open-time">
		                                <div class="open-time-item">
		                                  <p>7AM - 9PM</p>
		                                </div>
		                              </div>
		                            </div>
		                            <div class="open-date-time-item">
		                              <div class="open-date">
		                                <div class="open-date-item">
		                                  <div class="open-date-text">
		                                    <p>Wednesday:</p>
		                                  </div>
		                                  <div class="open-date-dot">.......................................</div>
		                                </div>
		                              </div>
		                              <div class="open-time">
		                                <div class="open-time-item">
		                                  <p>7AM - 9PM</p>
		                                </div>
		                              </div>
		                            </div>
		                            <div class="open-date-time-item">
		                              <div class="open-date">
		                                <div class="open-date-item">
		                                  <div class="open-date-text">
		                                    <p>Thursday:</p>
		                                  </div>
		                                  <div class="open-date-dot">.......................................</div>
		                                </div>
		                              </div>
		                              <div class="open-time">
		                                <div class="open-time-item">
		                                  <p>7AM - 9PM</p>
		                                </div>
		                              </div>
		                            </div>
		                            <div class="open-date-time-item">
		                              <div class="open-date">
		                                <div class="open-date-item">
		                                  <div class="open-date-text">
		                                    <p>Friday:</p>
		                                  </div>
		                                  <div class="open-date-dot">.......................................</div>
		                                </div>
		                              </div>
		                              <div class="open-time">
		                                <div class="open-time-item">
		                                  <p>7AM - 9PM</p>
		                                </div>
		                              </div>
		                            </div>
		                            <div class="open-date-time-item">
		                              <div class="open-date">
		                                <div class="open-date-item">
		                                  <div class="open-date-text">
		                                    <p>Saturday:</p>
		                                  </div>
		                                  <div class="open-date-dot">.......................................</div>
		                                </div>
		                              </div>
		                              <div class="open-time">
		                                <div class="open-time-item">
		                                  <p>7AM - 9PM</p>
		                                </div>
		                              </div>
		                            </div>
		                            <div class="open-date-time-item">
		                              <div class="open-date">
		                                <div class="open-date-item">
		                                  <div class="open-date-text">
		                                    <p>Sunday:</p>
		                                  </div>
		                                  <div class="open-date-dot">.......................................</div>
		                                </div>
		                              </div>
		                              <div class="open-time">
		                                <div class="open-time-item">
		                                  <p>7AM - 9PM</p>
		                                </div>
		                              </div>
		                            </div>
		                            <div class="open-date-time-item">
		                              <div class="open-date">
		                                <div class="open-date-item">
		                                  <div class="open-date-text">
		                                    <p>Monday:</p>
		                                  </div>
		                                  <div class="open-date-dot">.......................................</div>
		                                </div>
		                              </div>
		                              <div class="open-time">
		                                <div class="open-time-item">
		                                  <p>7AM - 9PM</p>
		                                </div>
		                              </div>
		                            </div>
		                          </div>
		                        </div>
		                      </div>
		                    </div>
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		        </footer>
		        <a id="totop" href="#" class="animated"><i class="fa fa-angle-double-up"></i></a>
	      	</div>
	      	<div 
	      		id="loader" 
	      		data-opening="m -5,-5 0,70 90,0 0,-70 z m 5,35 c 0,0 15,20 40,0 25,-20 40,0 40,0 l 0,0 C 80,30 65,10 40,30 15,50 0,30 0,30 z" class="pageload-overlay">
		        <div class="loader-wrapper">
			        <svg 
			        	xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 80 60" preserveaspectratio="none">
			            <path d="m -5,-5 0,70 90,0 0,-70 z m 5,5 c 0,0 7.9843788,0 40,0 35,0 40,0 40,0 l 0,60 c 0,0 -3.944487,0 -40,0 -30,0 -40,0 -40,0 z"></path>
			        </svg>
			        <div class="sk-circle">
			            <div class="sk-circle1 sk-child"></div>
			            <div class="sk-circle2 sk-child"></div>
			            <div class="sk-circle3 sk-child"></div>
			            <div class="sk-circle4 sk-child"></div>
			            <div class="sk-circle5 sk-child"></div>
			            <div class="sk-circle6 sk-child"></div>
			            <div class="sk-circle7 sk-child"></div>
			            <div class="sk-circle8 sk-child"></div>
			            <div class="sk-circle9 sk-child"></div>
			            <div class="sk-circle10 sk-child"></div>
			            <div class="sk-circle11 sk-child"></div>
			            <div class="sk-circle12 sk-child"></div>
			        </div>
			        <div class="sk-circle sk-circle-out">
			            <div class="sk-circle1 sk-child"></div>
			            <div class="sk-circle2 sk-child"></div>
			            <div class="sk-circle3 sk-child"></div>
			            <div class="sk-circle4 sk-child"></div>
			            <div class="sk-circle5 sk-child"></div>
			            <div class="sk-circle6 sk-child"></div>
			            <div class="sk-circle7 sk-child"></div>
			            <div class="sk-circle8 sk-child"></div>
			            <div class="sk-circle9 sk-child"></div>
			            <div class="sk-circle10 sk-child"></div>
			            <div class="sk-circle11 sk-child"></div>
			            <div class="sk-circle12 sk-child"></div>
			        </div>
			    </div>
	      	</div>
	      
	    </div>
	    <!-- jQuery-->
	    <script src="{{ asset('assets/vendors/jquery-1.10.2.min.js') }}"></script>
	    <!-- Bootstrap JavaScript-->
	    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
	    <!-- Vendors-->
	    <script src="{{ asset('assets/vendors/flexslider/jquery.flexslider-min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/swipebox/js/jquery.swipebox.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/slick/slick.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/isotope/isotope.pkgd.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/jquery-countTo/jquery.countTo.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/parallax/parallax.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/gmaps/gmaps.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/audiojs/audio.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/vide/jquery.vide.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/pageloading/js/svgLoader.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/pageloading/js/classie.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/pageloading/sidebartransition/js/sidebarEffects.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/nicescroll/jquery.nicescroll.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/wowjs/wow.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/skrollr.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
	    <script src="{{ asset('assets/vendors/jquery-cookie/js.cookie.js') }}"></script>
	    <!-- Own script-->
	    <script src="{{ asset('assets/js/layout.js') }}"></script>
	    <script src="{{ asset('assets/js/elements.js') }}"></script>
	    <script src="{{ asset('assets/js/widget.js') }}"></script>
	</body>
</html>