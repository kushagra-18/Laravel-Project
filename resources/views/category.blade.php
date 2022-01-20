<html>

<head>
    <title>
        Shopwayy | Search
    </title>
</head>

<style>
    body{
        height: 100%;
    }
    </style>

<!-- link style_postsCategory -->
<link rel="stylesheet" href="{{ URL::asset('css/style_postsCategory.css') }}">

<body>

    @include('essentials.navbar')

    <!-- sorting functions -->

    @if(!$isEmpty)
    <div class="sorting">
        <a class="text-decoration-none" href="#">
            <h6><i class="fas fa-sort"></i> &nbsp; Sort By</h6>
        </a>

        <a class="text-decoration-none" href="{{route('categorySort', ['category' => $posts[0]->category, 'sort' => 'newest'])}}">
            <h6>Newest</h6>
        </a>

        <a class="text-decoration-none" href="{{route('categorySort', ['category' => $posts[0]->category, 'sort' => 'oldest'])}}">
            <h6>Oldest</h6>
        </a>

        <a class="text-decoration-none" href="{{route('categorySort', ['category' => $posts[0]->category, 'sort' => 'price_low_high'])}}">
            <h6>Price: Low to High</h6>
        </a>

        <a class="text-decoration-none" href="{{route('categorySort', ['category' => $posts[0]->category, 'sort' => 'price_high_low'])}}">
            <h6>Price: High to Low</h6>
        </a>

        <a class="text-decoration-none" href="{{route('categorySort', ['category' => $posts[0]->category, 'sort' => 'rating_high_low'])}}">
            <h6>Rating: High to Low</h6>
        </a>
    </div>

    <br>



    <div class="row row-product">
        @foreach($posts as $post)
        

        <div class="card mb-3" style="width: 45%;" >
        <a class="pluslink" target="_blank" href="{{route('products',[$post->id])}}">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="{{URL::asset($post->thumbnail)}}"  height = '170px' width="150px" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text"><b> ₹ {{$post->price_revised}} </b>
                            <font class="text-muted"> &nbsp; <strike>₹ {{$post->price_original}}</strike></font>
                            <font size=1 color="red"><b>{{(ceil(($post->price_original - $post->price_revised)/$post->price_original*100))}}% off</b></font></p>
                            <p class="card-text desc-text">{{$post->description}}
                        <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                    </div>
                </div>
            </div>
        </div>
        </a>
   
        &nbsp;&nbsp;
        &nbsp;&nbsp;
        &nbsp;&nbsp;
        &nbsp;&nbsp;


        
        @endforeach
    </div>

    {{$posts->links(("pagination::bootstrap-4"))}}
    @else
    
    <!-- not found -->
    <center>
    <div class="not-found">
        <h1>Oops!</h1>
        <h3>No items found</h3>
    </div>
    </center>

    @endif

</body>
@include('essentials.footer')

</html>

<script type="text/javascript">
    $(function() {
        $(".desc-text").each(function(i) {
            len = $(this).text().length;
            if (len > 60) {
                $(this).text($(this).text().substr(0, 60) + '...');
            }
        });
    });
    
    </script>