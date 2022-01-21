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

    <style>
        .error {
            color: red;
        }

        .input-group .tooltip {

            width: 10px;
        }

    </style>

</head>


<br>



<div class="product-info">

<center>


    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif

</center>

    <h4 class="mb-3">Add product information</h4>
    <form id='checkout-form' action="{{route('addProduct')}}" method='post' enctype="multipart/form-data" class="needs-validation" novalidate>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="product_name">Enter Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name') }}" placeholder="Enter Product Name" required>
                @if($errors->has('product_name'))
                <div class="error">{{ $errors->first('product_name') }}</div>
                @endif

                <div class="invalid-feedback">
                    Valid Name is required.
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="product_description">Description</label>
            <textarea class="form-control" id="product_description" name="product_description" value="{{ old('product_description') }}" placeholder="Description (Min 50 words)" required></textarea>
            @if($errors->has('product_description'))
            <div class="error">{{ $errors->first('product_description') }}</div>
            @endif
            <div class="invalid-feedback">
                Please enter your descriptions
            </div>
        </div>


        <div class="row">
            <div class="col-md-5 mb-3">
                <label for="product_price_original">MRP Original <span class="text-muted"></span></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">&#8377; </span>
                    </div>
                    <input type="text" id="product_price_original" name="product_price_original" value="{{ old('product_price_original') }}" class="form-control" aria-label="Amount (to the nearest rupee)" required>
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>

                    <div class="invalid-feedback">
                        Enter a valid amount (in rupees).
                    </div>
                </div>
                @if($errors->has('product_price_original'))
                <div class="error">{{ $errors->first('product_price_original') }}</div>
                @endif
            </div>

            <div class="col-md-5 mb-3">
                <label for="product_price_revised">MRP Revised <span class="text-muted"></span></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">&#8377; </span>
                    </div>
                    <input type="text" id="product_price_revised" name="product_price_revised" class="form-control" aria-label="Amount (to the nearest rupee)" required>
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>

                    <div class="invalid-feedback">
                        Enter a valid amount (in rupees).
                    </div>
                </div>
                @if($errors->has('product_price_revised'))
                <div class="error">{{ $errors->first('product_price_revised') }}</div>
                @endif
            </div>
        </div>



        <div class="row">
            <div class="col-md-5 mb-3">
                <label for="product_category">Category</label>
                <select class="custom-select d-block w-100" id="product_category" name="product_category" required>
                    <option value="" selected disabled>Choose...</option>
                    <option value="Mobile">Mobiles</option>
                    <option value="Wearables">Wearables</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Home Decor">Home Decor</option>
                    <option value="Kids">Kids</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Footwear">Footwear</option>
                    <option value="Sports">Sports</option>
                    <option value="Books">Books</option>
                    <option value="Others">Others</option>
                </select>
                @if($errors->has('product_category'))
                <div class="error">{{ $errors->first('product_category') }}</div>
                @endif
                <div class="invalid-feedback">
                    Please select a valid category
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="product_discount_till">Discount valid till:</label>
                <input type="date" class="form-control" name="product_discount_till" id="product_discount_till" placeholder="" required>
                @if($errors->has('product_discount_till'))
                <div class="error">{{ $errors->first('product_discount_till') }}</div>
                @endif
                <div class="invalid-feedback">
                    Add discount valid till
                </div>
            </div>

            <div class="col-md-2 mb-3">
                <label for="product_discount_till">Quantity:</label>
                <input type="number" class="form-control" name="quantity" id=quantity" placeholder="Add Quantity" required>
                @if($errors->has('product_quantity'))
                <div class="error">{{ $errors->first('product_quantity') }}</div>
                @endif
                <div class="invalid-feedback">
                    Add Quantity
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-5 mb-3">
                <label for="product_key_points">Key points</label>
                <textarea class="form-control" id="product_key_points" name="product_key_points" placeholder="Add minimum of three points for the product seprated by ;" required></textarea>
                @if($errors->has('product_key_points'))
                <div class="error">{{ $errors->first('product_key_points') }}</div>
                @endif
                <div class="invalid-feedback">
                    Add minimum of three points for the product seprated by ;
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <label for="product_tags">Tags</label>
                <input type="text" class="form-control" id="tags" name="tags" placeholder="Add comma seprated tags for search" required></textarea>
                @if($errors->has('tags'))
                <div class="error">{{ $errors->first('tags') }}</div>
                @endif
                <div class="invalid-feedback">
                    Add comma seprated tags for search
                </div>
            </div>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name='product_image' id="product_image" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="product_image">Choose file</label>
            </div>

        </div>

        @if($errors->has('product_image'))
        <div class="error">{{ $errors->first('product_image') }}</div>
        @endif
        <hr class="mb-4">


        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Add Product</button>
    </form>
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