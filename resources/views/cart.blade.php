@include('essentials.navbar')


<head>
    <title> Cart | {{Auth()->user()->name}}</title>
    <meta name="csrf-token" content="{{csrf_token()}}" />
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="{{ URL::asset('css/style_cart.css') }}">

<body>
    <div id="ajaxReload">
        @if(!$isEmpty)
        <div class="card shadow p-3">
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col">
                                <h4><b>Shopping Cart</b></h4>
                            </div>

                        </div>
                    </div>

                    <!-- show product from cartItemsShow -->
                    <div class=blade-hide">
                    @php
                        $totPrice = 0;
                        $count = 0;
                        $totSaving = 0;
                    @endphp
                    </div>
                    @foreach($cartItemsShow as $cartItem)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid img-product" src="{{$cartItem->thumbnail}}"></div>
                            <div class="col">
                                <div class="row text-muted">{{$cartItem->category}}</div>
                                <div class="row">{{$cartItem->title}}</div>
                            </div>
                            <div class="col"> <a href="#"></a><a href="#" class="border">1</a><a href="#"></a> </div>
                            <div class="col">&#8377; {{$cartItem->price_revised}}<span class="close">
                                    <form id="deleteItems" action="" method="post">
                                        <input type="hidden" name="_method" value="delete" />
                                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                        <input type="hidden" name="itemId" value="{{ $cartItem->id}}">
                                        <button class="btn btn-warning"><span class="fa fa-trash" aria-hidden="true"></span></button>
                                    </form>
                                </span></div>
                        </div>
                    </div>

                    <div class=blade-hide">
                    @php
                        $totSaving = $totSaving + $cartItem->price_original - $cartItem->price_revised;
                        $totPrice = $totPrice + $cartItem->price_revised;
                        $count = $count + 1;
                    @endphp
                    </div>
                    @endforeach
                    <div class="row">

                    </div>
                    <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to Shopwayy</span></div>
                </div>
                <div class="col-md-4 summary">
                    <div>
                        <h5><b>Summary</b></h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">ITEMS {{$count}}</div>
                        <div class="col text-right">&#8377; {{$totPrice}}</div>
                    </div>
                    
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">&#8377; {{$totPrice}}</div>

                    </div>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL SAVING</div>
                        <div class="col text-right">&#8377; {{$totSaving}}</div>

                    </div>
                    <!-- <button class="btn btnCheck">CHECKOUT</button> -->
                </div>
            </div>
        </div>

        @else

        <!-- show message that the cart is empty using bootstrap -->
        <center>

            <div class="jumbotron">
                <!-- cart empty image -->
                <img src="{{ URL::asset('images/cart_empty.png') }}" class="img-fluid" height="250px" width="350px">
                <h1 class="display-4">Hello, {{Auth::user()->name }}</h1>
                <p class="lead">OOPS! Looks like you haven't added anything to your cart</p>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="#" role="button">Start Shopping</a>
            </div>

        </center>
    </div>

    @endif

</body>

@include('essentials.footer')
<script>
    $('.blade-hide').hide();

    //delete items using ajax on button click and reload withou refresh

    $('#deleteItems').click(function(e) {
        e.preventDefault();
        var itemId = $(this).parent().find('[name="itemId"]').val();
        var token = $(this).parent().find('[name="_token"]').val();
        $.ajax({
            url: '/cartItems',
            type: 'post',
            method: 'delete',
            data: {
                _token: token,
                itemId: itemId
            },
            success: function(data) {
                $("#ajaxReload").html(data);
            }
        });
    });
</script>