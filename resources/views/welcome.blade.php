<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blogwayy</title>

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
    <h5><div class="mb-1 text-muted">&nbsp;&nbsp; Trending on Blogwayy !!!</div></h5>
    <hr>
    <div class="row mb-3">
    <!-- get data from PostController using loop in bootstrap -->
    @foreach($posts as $post)
        <div class="col-md-4">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-240 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-success">{{$post->username}}</strong>
                    <!-- get title of post -->
                    <h3 class="mb-0"> {{ $post->title }}</h3>
                    <div class="mb-1 text-muted">{{$post->created_at}}</div>
                    <p class="mb-auto">{{$post->body}}</p>
                    <a href="#" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>

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

<script type="text/javascript">
$(function(){
  $(".mb-auto").each(function(i){
    len=$(this).text().length;
    if(len>120)
    {
      $(this).text($(this).text().substr(0,120)+'...');
    }
  });
});
</script>

</html>