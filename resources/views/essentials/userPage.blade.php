  <!-- USER and GLOBAL SECTION STARTS -->
  @include('essentials.categories')
  <img src="..\images\banner.gif" id="banner">
  <hr>
  <h5>
      <div class="mb-1 text-muted">&nbsp;&nbsp;<i class="fas fa-percent"></i> Deals of the Dawn!!</div>
  </h5>
  <hr>
  <div class="row mb-3">
      <!-- get data from PostController using loop in bootstrap -->
      @foreach($topDeals as $post)

      <div class="col-md-2">

          <!-- discount as a star at top right of the card -->


          <a class="pluslink" target="_blank" href="{{route('products',[$post->id])}}">
              <div class="card" class="row no-gutters rounded overflow-hidden flex-md-row mb-1 shadow-sm h-md-220 position-relative">
                  <div class="discount-tag">
                      <span class="badge badge-danger">{{(ceil(($post->price_original - $post->price_revised)/$post->price_original*100))}}% off</span>
                  </div>
                  <div class="col p-4 d-flex flex-column position-static">
                      <center>
                          <strong class="d-inline-block mb-1 text-success">{{$post->category}}</strong>
                      </center>
                      <div class="col-auto d-none d-lg-block">
                          <img class="bd-placeholder-img" src='{{ $post->thumbnail}}' width="100%" height="120vh">
                      </div>
                      <br>
                      <!-- get title of post -->
                      <h5 class="mb-1 post-title"> {{ $post->title }}</h5>

                      <div class="starRating"> <span>&#9733;</span> (1,000,00)</div>

                      <p class="mb-auto"> <b> ₹ {{$post->price_revised}} </b>
                          <font class="text-muted"> &nbsp; <strike>₹ {{$post->price_original}}</strike></font>

                      </p>
                      <font size=1 class="text-muted"> Sale ends in {{$post->discount_till}}</font>
                  </div>
              </div>
          </a>
      </div>
      <!-- end loop -->
      @endforeach
  </div>
  <!-- TREDING TOPICS -->
  <h5>
      <div class="mb-1 text-muted">&nbsp;&nbsp;<i class="fas fa-chart-line"></i> Trending this Week!!!</div>
  </h5>
  <hr>
  <div class="row mb-3">
      <!-- get data from PostController using loop in bootstrap -->
      @foreach($posts as $post)

      <div class="col-md-2">

          <a class="pluslink" target="_blank" href="{{route('products',[$post->id])}}">
              <div class="card" class="row no-gutters rounded overflow-hidden flex-md-row mb-1 shadow-sm h-md-220 position-relative">
                  <div class="discount-tag">
                      <span class="badge badge-danger">{{(ceil(($post->price_original - $post->price_revised)/$post->price_original*100))}}% off</span>
                  </div>
                  <div class="col p-4 d-flex flex-column position-static">
                      <center>
                          <strong class="d-inline-block mb-1 text-success">{{$post->category}}</strong>
                      </center>
                      <div class="col-auto d-none d-lg-block">
                          <img class="bd-placeholder-img" src='{{ $post->thumbnail}}' width="100%" height="120vh">
                      </div>
                      <br>
                      <!-- get title of post -->
                      <h5 class="mb-1 post-title"> {{ $post->title }}</h5>

                      <div class="starRating">3.9 <span>&#9733;</span> (1,000,00)</div>

                      <p class="mb-auto"> <b> ₹ {{$post->price_revised}} </b>
                          <font class="text-muted"> &nbsp; <strike>₹ {{$post->price_original}}</strike></font>
                       
                      </p>
                      <font size=1 class="text-muted"> Sale ends in {{$post->discount_till}}</font>
                  </div>
              </div>
          </a>
      </div>
      <!-- end loop -->
      @endforeach
  </div>