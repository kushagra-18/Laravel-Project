<html>

@include('essentials.navbar')

<head>

    <style>
        .product-info {
         padding: 1px;
        }

        table {
            width: 100%;
            border: 1px solid #000;
        }

        th.description {
            width: 55%;
        }
    </style>
    <title>Shopwayy</title>
</head>
<br>

<!-- table to show all the products of the seller coming from database -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 product-info">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th> Product ID </th>
                            <th>Product Image </th>
                            <th>Product Name</th>
                            <th class="description">Product Description</th>
                            <th>Product Category</th>
                            <th>Product Discount Till</th>
                            <th>Product Key Points</th>
                            <th>Product Price</th>
                            <th>Product Price Revised</th>
                            <th>Items Bought</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td> {{$product->id}} </td>
                            <td>
                                <img src="{{ asset('products/'.$product->thumbnail) }}" alt="product" style="width:100px;height:100px;">
                            </td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->discount_till}}</td>
                            <td>{{$product->product_key_points}}</td>
                            <td>{{$product->price_original}}</td>
                            <td>{{$product->price_revised}}</td>
                            <td>{{$product->bought}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- pagination with bootstrap-->
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="text-center">
            {{$products->links(("pagination::bootstrap-4"))}}
            <a href = "" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</div>






@include('essentials.footer')

</html>