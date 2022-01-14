<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shopwayy</title>

    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- import welcome_css -->
    <link rel="stylesheet" href="{{ URL::asset('css/style_welcome.css') }}">
</head>

<body>

    @include('essentials.navbar')

    <!-- Different layouts for different profile -->
    @if(Auth::guest())
        @include('essentials.userPage')
    <!--check if user is authenticated and with customer profile -->
    @elseif(Auth::check() && !Auth::user()->user=='seller')
        @include('essentials.userPage')
    @elseif(Auth::check() && Auth::user()->user=='seller')
        @include('essentials.sellerPage')
    @endif
<!-- Footer -->
<style>

.footer-color{
    background: #ffc1cc;
}
</style>

@include('essentials.footer')
</body>

<script type="text/javascript">
    // <![CDATA[
    $(function() {
        $(".post-title").each(function(i) {
            len = $(this).text().length;
            if (len > 15) {
                $(this).text($(this).text().substr(0, 15) + '...');
            }
        });
    });
    // ]]>


    //fade div id shop-categories on scroll    
    $(document).ready(function() {
        $("#shop-categories").fadeIn();
    });
</script>

</html>