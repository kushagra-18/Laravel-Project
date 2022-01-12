<!-- Bootstrap CSS -->

<style>
  .logo {
    height: 60px;
    width: 220px;
    padding: 0;
  }

  .navbar-default {
    background: #ffc1cc;
  }

  .nav-item {
    margin-right: 10px;
  }

  .fa-shopping-cart {
    color: #00128b;
  }

  .fa-user {
    color: #00128b;
  }

  .fa-sign-in {
    color: #00128b;
  }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />



<nav class="navbar navbar-default navbar-expand-lg fixed-top navbar-light">
  <a class="navbar-brand" href="{{route('post')}}"> <img src="{{URL::asset('..\images\logo.png')}}" class="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <form class="form-inline my-2 my-lg-0 my-lg-0">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" style="width: 600px;">
    <button class="btn my-2 my-sm-0 btn-primary" type="submit">Search</button>
  </form>

  &nbsp;&nbsp;
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <b>
          @if (Auth::guest())
          <a class="navbar-brand" href="{{ url('/login') }}">
            <i class="fa fa-sign-in" aria-hidden="true"></i>
            <font color="#00128b"> Sign in </font>
          </a>
          @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
          <b><i class="fa fa-user" aria-hidden="true"></i>
            <font color="#00128b">
              {{ Auth::user()->name }}
            </font>
          </b>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ url('/login')}}">My Profile</a>
          <a class="dropdown-item" href="#">My Orders</a>
          <a class="dropdown-item" a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp; Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
      </li>
      @endif
      <a class="navbar-brand" href="#">
        <i class="fas fa-shopping-cart"></i>
        <font color="#00128b"> <a href = "{{ route('cart') }} ">Cart </font></a>
      </a>
      </b>
      </li>
    </ul>
  </div>
</nav>