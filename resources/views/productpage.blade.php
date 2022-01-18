<html>

@include('essentials.navbar')

<head>
    <title>Products | {{$posts[0]->title}}</title>

    <!-- style_productPage css -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/style_productPage.css') }}">
</head>

<body>
    <div class="container">
        <div class="card shadow p-3">
            <div class="card-body">
                <h3 class="card-title">{{$posts[0]->title}}</h3>
                <h6 class="card-subtitle">{{$posts[0]->category}}</h6>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-4">
                        <div id="main">
                            <div class="white-box text-center"><img class="zoom" src="{{$posts[0]->thumbnail}}" alt="product image"></div>
                        </div>
                        <div id="show">
                            <div class="btn-group">
                                <form action="{{route('cart')}}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                    <input type="hidden" name="itemId" value="{{ $posts[0]->id }}">
                                    <button class="btn buy btn-warning btn-rounded mr-1" id="buy" data-toggle="tooltip" title="" data-original-title="Add to cart">
                                        <i class="fa add fa-shopping-cart"></i>&nbsp; Add to Cart
                                    </button>
                                </form>
                                <form action="{{route('checkout',[$posts[0]->id])}}">
                                    <button class="btn buy btn-primary btn-rounded" id="buy"><i class="fas fa-gift"></i>&nbsp; Buy Now</a></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-4 col-sm-4 product-info">
                        <h4 class="box-title mt-0">Product description</h4>
                        <p>{{$posts[0]->description}}</p>
                        <h2 class="mt-5">
                            ₹ {{$posts[0]->price_revised}}&nbsp;<small class="text-success">{{(ceil(($posts[0]->price_original - $posts[0]->price_revised)/$posts[0]->price_original*100))}}% off</small>
                        </h2>

                        <font class="text-muted"> &nbsp; <strike>₹ {{$posts[0]->price_original}}</strike></font>
                        <h3 class="box-title mt-3">Key Highlights</h3>
                        <ul class="list-unstyled">

                            <!-- get data from database and split by ; -->
                            @foreach(explode(';',$posts[0]->product_key_points) as $key_points)
                            <li><i class="fa fa-check text-success"></i>&nbsp;{{$key_points}}</li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- THIS CONTENT WILL BE SHOWN ONLY IF THE USER HAS BOUGHT THE PRODUCT -->
                   @if($checkBought)
                    <div class="user-rating">
                    <div class="col">
                    <hr>

                    <h3 class="box-title mt-1">Your Rating</h3>
                        <form action = {{route('rating')}} name = "ratingForm" method = "post" id = "ratingForm" class="rating">
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">
                            <input type="hidden" name="itemId" value="{{ $posts[0]->id }}">
                            <label>
                                <input type="radio" name="stars" value="1" />
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="stars" value="2" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="stars" value="3" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="stars" value="4" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="stars" value="5" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                        </form>
                    </div>

                    </div>
                    @endif
                     <!-- ENDS STATEMENT -->


                    <div class="col-lg-10">
                        <h3 class="box-title mt-0">General Info</h3>

                        <span class="heading">User Rating</span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <p>4.1 average based on 254 reviews.</p>
                        <hr style="border:3px solid #f1f1f1">

                        <div class="row">
                            @for ($i = 5; $i > 0; $i--)
                            <div class="side">
                                <div>{{$i}} star</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-{{$i}}"></div>
                                </div>
                            </div>
                            <div class="side right">
                                <div>{{$i}}</div>
                            </div>
                            @endfor

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('essentials.footer')
</body>

<script>

    $(':radio').change(function() {
//   console.log('New star rating: ' + this.value);
});

//submit form on change
$('#ratingForm').on('change', function() {
    this.submit();
});

    

// submit form-rating without refreshing the page

    // $('#ratingForm').submit(function(e){
    //    e.preventDefault();
    //     var form = $(this);
    //     var url = form.attr('action');
    //     console.log(url);
    //     console.log(form.serialize());
    //     var data = form.serialize();
    //     $.ajax({
    //         type: "POST",
    //         url: url,
    //         data: data,
    //         success: function(data){
    //             console.log(data);
    //             if(data.success){
    //                 alert('Rating submitted successfully');
    //             }else(
    //                 alert('Rating not submitted')
    //             )
    //         }
    //     });
    // });

</script>

</html>