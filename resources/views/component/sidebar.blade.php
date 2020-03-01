<style type="text/css">
  .nav-item
  {
    font-size: 15px;
    color: #f0c332
  }

  .nav-link
  {
    color: #f0c332
  }
</style>      
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/') }}">
    <img src="{{ asset('storage') }}/{{ $setting->logo }}" class="brand-image img-circle elevation-3 img-responsive img-fluid" style="opacity: .9; height: 100px; width: 200px">
    <!--<span class="brand-text font-weight-light">{{ $setting->sitename }}</span>-->
  </a>
  <hr style="color: #f0c332">
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a  class="nav-link" href="{{ url('/dashboard') }}" style="color: #f0c332;">
            <i class="nav-icon fa fa-home"></i>
            <p  style="color: #fff;">
              Dashboard
            </p>
          </a>
        </li>

        @if(Auth::user()->role=="Attendant")
          <li class="nav-item">
            <a href="{{ url('/store') }}/?bar=bar" class="nav-link" style="color: #f0c332;">
              <i class="nav-icon fa fa-beer"></i>
              <p  style="color: #fff;">
                Inventory
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/orders') }}/?attendant=attendant" class="nav-link" style="color: #f0c332;">
              <i class="nav-icon fa fa-cart-arrow-down"></i>
              <p  style="color: #fff;">
                Sales Report
              </p>
            </a>
          </li>
        @else
          <li class="nav-item">
            <a href="{{ url('/bar') }}" class="nav-link" style="color: #f0c332;">
              <i class="nav-icon fa fa-beer"></i>
              <p  style="color: #fff;">
                Outlets
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/category') }}" class="nav-link" style="color: #f0c332;">
              <i class="nav-icon fa fa-box"></i>
              <p  style="color: #fff;">
                Categories
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/product') }}" class="nav-link" style="color: #f0c332;">
              <i class="nav-icon fa fa-credit-card"></i>
              <p  style="color: #fff;">
                Menu
              </p>
            </a>
          </li>

          <!--<li class="nav-item">
            <a href="{{ url('/supplier') }}" class="nav-link" style="color: #f0c332;">
              <i class="nav-icon fa fa-biking"></i>
              <p  style="color: #fff;">
                Suppliers
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/purchase') }}/?debt=debt" class="nav-link" style="color: #f0c332;">
              <i class="nav-icon fa fa-clock"></i>
              <p  style="color: #fff;">
                Suppliers' Debt
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/purchase') }}" class="nav-link" style="color: #f0c332;">
              <i class="nav-icon fa fa-address-book"></i>
              <p  style="color: #fff;">
                Purchase Report
              </p>
            </a>
          </li>-->

          <li class="nav-item">
            <a href="{{ url('/orders') }}" class="nav-link" style="color: #f0c332;">
              <i class="nav-icon fa fa-cart-arrow-down"></i>
              <p  style="color: #fff;">
                Sales Report
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/attendants') }}" class="nav-link" style="color: #f0c332;">
              <i class="nav-icon fa fa-users"></i>
              <p  style="color: #fff;">
                Staff
              </p>
            </a>
          </li>
        @endif

        <!--<li class="nav-item">
            <a href="" class="nav-link" style="color: #f0c332;">
              <i class="nav-icon fa fa-user"></i>
              <p  style="color: #fff;">
                Profile
              </p>
            </a>
          </li>-->
          
          <li class="nav-item">
            <a href="{{ url('/password') }}" class="nav-link" style="color: #f0c332;">
              <i class="nav-icon fa fa-key"></i>
              <p  style="color: #fff;">
                Change Password
              </p>
            </a>
          </li>

        <li class="nav-item">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link" style="color: #f0c332;">
              <i class="nav-icon fas fa-lock"></i>
              <p  style="color: #fff;">Logout</p>        
          </a>
          <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </nav>
  </div>
</aside>