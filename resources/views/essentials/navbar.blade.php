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

 .nav-item{
   margin-right: 10px;
 }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<nav class="navbar navbar-default navbar-expand-lg fixed-top navbar-light">
  <a class="navbar-brand" href="{{route('post')}}"> <img src="{{URL::asset('..\images\logo.png')}}" class="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <form class="form-inline my-2 my-lg-0 my-lg-0">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" style="width: 600px;">
    <button class="btn my-2 my-sm-0 btn-primary" type="submit">Search</button>
  </form>

  &nbsp;
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <b>
          <a class="navbar-brand" href="{{ url('/login') }}">
            <font color="#00128b"> Sign in </font>
          </a>
          <a class="navbar-brand" href="#">
            <font color="#00128b">Cart </font>
          </a>
          <!-- <a class="navbar-brand" href="#"><font color="#00128b">More</font></a> -->
        </b>
      </li>
    </ul>
  </div>
</nav>


<!--     <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
            </div>
        </div>
    </div> -->