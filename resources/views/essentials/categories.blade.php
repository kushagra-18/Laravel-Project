
<style>
   #shop-categories {
  
}

    .card-image {

        height: 10px;
    }
</style>

<div id="shop-categories">
    <div class="row mb-2">
        <div class="col-md-1">
            <a class="pluslink" target="_blank" href="{{route('category','mobile')}}">
                <div class="card">
                    <center>
                        <strong class="d-inline-block mb-1 text-success">Mobiles</strong>
                    </center>
                    <div class="col-auto d-none d-lg-block">
                        <!-- image from url:assest -->
                        <img class="bd-placeholder-img" src="{{asset('../category/electronic.png')}}" width="80vh" height="50vh">

                    </div>
                    <br>
                    <!-- get title of post -->
                </div>
            </a>
        </div>

        <div class="col-md-1">
            <a class="pluslink" target="_blank" href="#">
                <div class="card">
                    <div class="col p-0 d-flex flex-column position-static">
                        <center>
                            <strong class="d-inline-block mb-1 text-success">Fashion</strong>
                        </center>
                        <div class="col-auto d-none d-lg-block">
                            <img class="bd-placeholder-img" src="{{asset('../category/fashion.png')}}" width="80vh" height="50vh">
                        </div>
                        <br>
                        <!-- get title of post -->
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-1">
            <a class="pluslink" target="_blank" href="#">
                <div class="card">
                    <div class="col p-0 d-flex flex-column position-static">
                        <center>
                            <strong class="d-inline-block mb-1 text-success">Home Decor</strong>
                        </center>
                        <div class="col-auto d-none d-lg-block">
                            <img class="bd-placeholder-img" src="{{asset('../category/home.jpg')}}" width="80vh" height="50vh">
                        </div>
                        <br>
                        <!-- get title of post -->
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-1">
            <a class="pluslink" target="_blank" href="#">
                <div class="card">
                    <div class="col p-0 d-flex flex-column position-static">
                        <center>
                            <strong class="d-inline-block mb-1 text-success">Grocery</strong>
                        </center>
                        <div class="col-auto d-none d-lg-block">
                            <img class="bd-placeholder-img" src="{{asset('../category/grocery.png')}}" width="80vh" height="50vh">
                        </div>
                        <br>
                        <!-- get title of post -->
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-1">
            <a class="pluslink" target="_blank" href="#">
                <div class="card">
                    <div class="col p-0 d-flex flex-column position-static">
                        <center>
                            <strong class="d-inline-block mb-1 text-success">Kids</strong>
                        </center>
                        <div class="col-auto d-none d-lg-block">
                            <img class="bd-placeholder-img" src="{{asset('../category/toys.png')}}" width="80vh" height="50vh">
                        </div>
                        <br>
                        <!-- get title of post -->
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-1">
            <a class="pluslink" target="_blank" href="#">
                <div class="card">
                    <div class="col p-0 d-flex flex-column position-static">
                        <center>
                            <strong class="d-inline-block mb-1 text-success">Electronics</strong>
                        </center>
                        <div class="col-auto d-none d-lg-block">
                            <img class="bd-placeholder-img" src="{{asset('../category/electronics.png')}}" width="80vh" height="50vh">
                        </div>

                        <!-- get title of post -->
                    </div>
                </div>
            </a>
        </div>

        <!-- end loop -->
    </div>
</div>