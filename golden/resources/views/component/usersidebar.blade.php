<style>
  .sidebar {
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #000;
    height: auto;
    overflow: auto;
    float: left;
  }

  .sidebar a {
    display: block;
    color: white;
    padding: 16px;
    text-decoration: none;
  }
   
  .sidebar a.active {
    background-color: #ffb600;
    color: white;
  }

  .sidebar a:hover:not(.active) {
    background-color: #ffb600;
    color: white;
  }

  div.content {
    margin-left: 200px;
    padding: 1px 16px;
    height: auto;
  }

  @media screen and (max-width: 700px) {
    .sidebar {
      width: 100%;
      height: auto;
      position: relative;
    }
    .sidebar a {float: left;}
    div.content {margin-left: 0;}
  }

  @media screen and (max-width: 400px) {
    .sidebar a {
      text-align: center;
      float: none;
    }
  }
</style>
<div class="sidebar">
  <a href="{{ url('store/dashboard') }}">Dashbaord</a>
  <a href="{{ url('orders') }}">My Orders</a>
  <a href="{{ url('store/dashboard') }}">Account Detail</a>
  <a href="{{ url('store/password') }}">Change Password</a>
  <a href="{{ url('logout') }}">Logout</a>
</div>