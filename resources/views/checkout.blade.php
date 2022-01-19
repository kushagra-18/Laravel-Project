<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Shopwayy | Checkout</title>
</head>

<style>
    body {
        padding-top: 8%;
    }
</style>
@include('essentials.navbar')

<body class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">1</span>
                </h4>




                @include('essentials.checkoutProduct')


            </div>



            <div class="col-md-8 order-md-1">

                @if($checkSavedAddress)
                <form id='saved-form' action="{{route('checkoutFinal')}}" method='post'>
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <input type="hidden" name="product_id" value="{{$cartItemsShow[0]->id}}">
                    <div class="custom-control custom-checkbox">

                        <input type="checkbox" class="custom-control-input" name="saved" id="saved">
                        <label class="custom-control-label" for="saved">Use Saved Address</label>
                    </div>
                    <br>

                    <!-- bootsrap card for saved address -->
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$getSavedAddress[0]->first_name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$getSavedAddress[0]->city}}</h6>
                            <p class="card-text">{{$getSavedAddress[0]->address}} &nbsp;
                            {{$getSavedAddress[0]->address2}}</p>
                        </div>
                    </div>

                    <br>

                    <button class="btn btn-primary btn-lg btn-block" id="saved-button" type="submit">Confirm Order</button>
                </form>
                @endif

                <div class="address-info">

                    <h4 class="mb-3">Billing address</h4>
                    <form id='checkout-form' action="{{route('checkoutFinal')}}" method='post' class="needs-validation" novalidate>

                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        <input type="hidden" name="product_id" value="{{$cartItemsShow[0]->id}}">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last name</label>
                                <input type="text" class="form-control" id="last_name" name='last_name' placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" name="address2" id="address2" placeholder="Address Line 2">
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Country</label>
                                <select class="custom-select d-block w-100" id="country" name="country" required>
                                    <option value="" selected disabled>Choose...</option>
                                    <option value="India">India</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <select class="custom-select d-block w-100" id="state" name="state" required>
                                    <option value="">Choose...</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                    <option value="Daman and Diu">Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Puducherry">Puducherry</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" name="zip" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="save-info" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div>
                        <hr class="mb-4">

                        <h4 class="mb-3">Payment</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                <label class="custom-control-label" for="credit"><i class="fas fa-credit-card"></i>&nbsp;Credit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="paypal"><i class="fas fa-money-bill-alt"></i>&nbsp;Cash on Delivery</label>
                            </div>
                        </div>

                        <div class="cardDetails">
                            <!-- <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cc-name">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cc-number">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            </div>
                        </div> -->
                            <div class="row">
                                <!-- <div class="col-md-3 mb-3">
                                <label for="cc-expiration">Expiration</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            </div> -->
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" id = "confirm" name = "confirm" type="submit">Confirm Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    @include('essentials.footer')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>




    <script>

        // if saved is check hide check-out form
        if ($('#saved').is(':checked')) {
            $('.address-info').hide();
        }


        $('#saved').click(function() {
            if ($('#saved').is(':checked')) {
                $('.address-info').hide();
                $('#saved-button').show();
            } else {
                $('.address-info').show();
                $('#saved-button').hide();
            }
        });

        $('#saved-button').hide();

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


        //spinner on confirm button
        $('#confirm').click(function() {
            $(this).html('<i class="fas fa-spinner fa-spin"></i> Confirming...');   
        });

        //spinner on saved-button
        $('#saved-button').click(function() {
            $(this).html('<i class="fas fa-spinner fa-spin"></i> Confirming..');   
        });
        
    </script>
</body>

</html>