<html>

@include('essentials.navbar')

<head>

    <style>
        .product-info {
            padding: 5%;
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
        <div
            class="col-md-12 col-lg-12 col-sm-12 col-xs-12 product-info">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Product Category</th>
                            <th>Product Discount Till</th>
                            <th>Product Key Points</th>
                            <th>Product Price</th>
                            <th>Product Price Revised</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->discount_till}}</td>
                            <td>{{$product->product_key_points}}</td>
                            <td>{{$product->price_original}}</td>
                            <td>{{$product->price_revised}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@include('essentials.footer')
</html>

<script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("product_discount_till")[0].setAttribute('min', today);

    // (function() {
    //     'use strict';

    //     window.addEventListener('load', function() {
    //         var forms = document.getElementsByClassName('needs-validation');

    //         var validation = Array.prototype.filter.call(forms, function(form) {
    //             form.addEventListener('submit', function(event) {
    //                 if (form.checkValidity() === false) {
    //                     event.preventDefault();
    //                     event.stopPropagation();
    //                 }
    //                 form.classList.add('was-validated');
    //             }, false);
    //         });
    //     }, false);
    // })();

</script>