<html>

<head>
    <title>Error 404</title>
</head>

<body>

    @include('essentials.navbar')

    <style>

    body{
        margin-top: 5%;
    }
        </style>

    <center>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
            
    
                        <img src="../images/404.png" alt="404" width="300" height="300">
        
                        <h1 class="mt-5">Error 404</h1>
                        <p class="lead">The page you are looking for was not found.</p>
                        <p>
                            <a href="{{ url('/') }}">Return to Homepage</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <center>
</body>

</html>