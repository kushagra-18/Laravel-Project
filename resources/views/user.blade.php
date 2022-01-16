<html>

@include('essentials.navbar')

<head>

    <style>
        .product-info {
            padding: 5%;
        }

        .rating {
            display: inline-block;
            position: relative;
            height: 50px;
            line-height: 50px;
            font-size: 50px;
        }

        .rating label {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            cursor: pointer;
        }

        .rating label:last-child {
            position: static;
        }

        .rating label:nth-child(1) {
            z-index: 5;
        }

        .rating label:nth-child(2) {
            z-index: 4;
        }

        .rating label:nth-child(3) {
            z-index: 3;
        }

        .rating label:nth-child(4) {
            z-index: 2;
        }

        .rating label:nth-child(5) {
            z-index: 1;
        }

        .rating label input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .rating label .icon {
            float: left;
            color: transparent;
        }

        .rating label:last-child .icon {
            color: #000;
        }

        .rating:not(:hover) label input:checked~.icon,
        .rating:hover label:hover input~.icon {
            color: #09f;
        }

        .rating label input:focus:not(:checked)~.icon:last-child {
            color: #000;
            text-shadow: 0 0 5px #09f;
        }
    </style>
    <title>Shopwayy</title>

    <!-- style_productPage css -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>


<br>

<!-- table to show all the products of the seller coming from database -->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 product-info">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Product Category</th>
                            <th>Product Price</th>
                            <th>Product Price Discounted</th>
                            <!-- <th>Rating </th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userMeta as $userMeta)


                        <tr>
                            <td><img src="{{$userMeta->thumbnail}}" alt="image" width="100" height="100"></td>
                            <td>{{$userMeta->title}}</td>
                            <td>{{$userMeta->description}}</td>
                            <td>{{$userMeta->category}}</td>
                            <td>{{$userMeta->price_original}}</td>
                            <td>{{$userMeta->price_revised}}</td>
                        </tr>
                        </a>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@include('essentials.footer')

</html>