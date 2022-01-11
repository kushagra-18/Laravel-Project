<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shopwayy</title>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- import welcome_css -->
    <link rel="stylesheet" href="{{ URL::asset('css/style_welcome.css') }}">
</head>

<body>

    @include('essentials.navbar')

    <img src="..\images\banner.gif" id="banner">

    <!-- <div id = 'trending'>
        Trending
    </div> -->

    <hr>
    <!-- TREDING TOPICS -->
    <h5>
        <div class="mb-1 text-muted">&nbsp;&nbsp; Trending on Shopwayy !!!</div>
    </h5>
    <hr>
    <div class="row mb-3">
        <!-- get data from PostController using loop in bootstrap -->
        @foreach($posts as $post)
        <div class="col-md-2">
            <div class="row no-gutters rounded overflow-hidden flex-md-row mb-1 shadow-sm h-md-220 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <center>
                        <strong class="d-inline-block mb-1 text-success">{{$post->category}}</strong>
                    </center>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" src='{{ $post->thumbnail}}' width="100%" height="120vh">
                    </div>
                    <br>
                    <!-- get title of post -->
                    <h4 class="mb-1"> {{ $post->title }}</h4>

                    <div class="starRating">3.9 <span>&#9733;</span> (1,000,00)</div>

                    <p class="mb-auto"> <b> ₹ {{$post->price_revised}} </b>
                        <font class="text-muted"> &nbsp; <strike>₹ {{$post->price_original}}</strike></font>
                        <font size=1 color="red"><b>{{(ceil(($post->price_original - $post->price_revised)/$post->price_original*100))}}% off</b></font>
                    </p>
                    <font size=1 class="text-muted"> Sale ends in {{$post->created_at}}</font>
                </div>
            </div>
        </div>
        <!-- end loop -->
        @endforeach
    </div>


    <!-- TRENDING TOPICS END -->

    <!-- <div class="flex-center position-ref full-height">
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
</body>


</html>