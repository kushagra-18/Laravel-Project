@include('essentials.navbar')

<title>Shopwayy | Register</title>

<style>
    /* container padding from top aligned center*/
    .container {
        padding-top: 8%;
        float: right;
        width: 70%;
    }

    /* add jumbotron to the left side of container */
    .jumbotron {
        float: left;
        background: #ffc1cc;
        color: ;
        width: 25%;
        margin-top: 10%;
        border-radius: 0;
        border: 1px solid #ddd;
        margin-bottom: 0;
    }

    .btn-lgn {
        /* width similar to parent */
        width: 70%;
    }

    .select {
        margin-left: 15px;
        width: 46%;
    }
</style>

<body>
    <div class="jumbotron">
        <h1 class="display-5">Hello, Guest!</h1>
        <h3> Get access to your Orders, Wishlist and Recommendations.
            <br>Sign up now!!
        </h3>
        <hr class="my-4">
        <h4>It is super easy and free.</h4>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">


                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{csrf_field()}}



                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Full Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('user') ? ' has-error':'' }}" id = 'user'>
                                <label for="user" class="col-md-4 control-label">User Type</label>
                                <select class="form-control select" id="user" name = "user" required onchange="yesNoCheck(this);">
                                    <option value = "" selected disabled>Choose User Type</option>
                                    <option value="customer">Customer</option>
                                    <option value="seller">Seller</option>
                                </select>
                            </div>

                            <div class="form-group{{ $errors->has('companyName') ? ' has-error' : '' }}" id = 'companyName'>
                                <label for="companyName" class="col-md-4 control-label">Company Name</label>
                                <div class="col-md-6">
                                    <input id="companyName" type="text" class="form-control" name="companyName" value="{{ old('companyName') }}"  autofocus>

                                    @if ($errors->has('companyName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('companyName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                    <br><br>
                                    <a class="btn btn-link" href="{{ route('login') }}">
                                        Already have an account? Sign in...!!
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>

//show and hide company name field if user type is seller

    //hide company name field

    $('#companyName').hide();

    function yesNoCheck(that) {
        if (that.value == "seller") {
            document.getElementById("companyName").style.display = "block";
        } else {
            document.getElementById("companyName").style.display = "none";
        }
    }



</script>