<html>

@include('essentials.navbar')

<head>
    <title>Products | {{$posts[0]->title}}</title>

    <!-- style_productPage css -->
    <link rel="stylesheet" href="{{ URL::asset('css/style_productPage.css') }}">
</head>

<body>


    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{$posts[0]->title}}</h3>
                <h6 class="card-subtitle">{{$posts[0]->category}}</h6>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        <div id="main">
                            <div class="white-box text-center"><img class="zoom" src="{{$posts[0]->thumbnail}}" alt="product image"></div>
                        </div>
                        <div id="show">
                            <div class="btn-group">
                                <button class="btn buy btn-warning btn-rounded mr-1" id="buy" data-toggle="tooltip" title="" data-original-title="Add to cart">
                                    <i class="fa add fa-shopping-cart"></i>&nbsp; Add to Cart
                                </button>
                                <button class="btn buy btn-primary btn-rounded" id="buy"><i class="fas fa-gift"></i> &nbsp; Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6">
                        <h4 class="box-title mt-5">Product description</h4>
                        <p>Lorem Ipsum available,but the majority have suffered alteration in some form,by injected humour,or randomised words which don't look even slightly believable.but the majority have suffered alteration in some form,by injected humour</p>
                        <h2 class="mt-5">
                            ₹ {{$posts[0]->price_revised}}&nbsp;<small class="text-success">{{(ceil(($posts[0]->price_original - $posts[0]->price_revised)/$posts[0]->price_original*100))}}% off</small>
                        </h2>
                        <font class="text-muted"> &nbsp; <strike>₹ {{$posts[0]->price_original}}</strike></font>
                        <h3 class="box-title mt-3">Key Highlights</h3>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-check text-success"></i>Sturdy structure</li>
                            <li><i class="fa fa-check text-success"></i>Designed to foster easy portability</li>
                            <li><i class="fa fa-check text-success"></i>Perfect furniture to flaunt your wonderful collectibles</li>
                        </ul>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title mt-5">General Info</h3>

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
</body>



</html>