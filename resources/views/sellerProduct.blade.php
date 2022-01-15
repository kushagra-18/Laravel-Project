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

<div class="product-info">

    <h4 class="mb-3">Add product information</h4>
    <form id='checkout-form' action="{{route('addProduct')}}" method='post' class="needs-validation" novalidate>


        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstName">Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="" required>
                <div class="invalid-feedback">
                    Valid Name is required.
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="address">Description</label>
            <textarea class="form-control" id="desc" name="desc" placeholder="Description (Min 50 words)" required></textarea>

            <div class="invalid-feedback">
                Please enter your descriptions
            </div>
        </div>


        <div class="row">
            <div class="col-md-5 mb-3">
                <label for="price_original">MRP Original <span class="text-muted"></span></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">&#8377; </span>
                    </div>
                    <input type="text" id="price_original" name="price_original" class="form-control" aria-label="Amount (to the nearest rupee)" required>
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                    <div class="invalid-feedback">
                        Enter a valid amount (in rupees).
                    </div>
                </div>
            </div>

            <div class="col-md-5 mb-3">
                <label for="price_original">MRP Revised <span class="text-muted"></span></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">&#8377; </span>
                    </div>
                    <input type="text" id="price_revised" name="price_revised" class="form-control" aria-label="Amount (to the nearest rupee)" required>
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                    <div class="invalid-feedback">
                        Enter a valid amount (in rupees).
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-5 mb-3">
                <label for="country">Category</label>
                <select class="custom-select d-block w-100" id="category" name="category" required>
                    <option value="" selected disabled>Choose...</option>
                    <option value="Mobiles">Mobiles</option>
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
                <div class="invalid-feedback">
                    Please select a valid category
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="zip">Discount valid till:</label>
                <input type="date" name="calender" class="form-control" name="date" id="date" placeholder="" required>
                <div class="invalid-feedback">
                    Add discount valid till
                </div>
            </div>

        </div>
        <div class="mb-3">
            <label for="address">Key points</label>
            <textarea class="form-control" id="desc" name="desc" placeholder="Add minimum of three points for the product seprated by ;" required></textarea>

            <div class="invalid-feedback">
                Add minimum of three points for the product seprated by ;
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
        <hr class="mb-4">


        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Add Product</button>
    </form>
</div>

<script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("calender")[0].setAttribute('min', today);

    (function() {
        'use strict';

        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');

            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>