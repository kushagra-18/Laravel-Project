  <!-- USER and GLOBAL SECTION STARTS -->

  <style>
    .row {
      padding: 2%;

    }

    /* remove blue link from a on hover*/
    a:hover {
      text-decoration: none;
    }

    a {
      color: black;
      text-decoration: none;
    }
  </style>
  <img src="..\images\banner_seller.gif" id="banner">
  <hr>
  <h4>
    <center>Checkout Our Services</center>
  </h4>

  <div class="row">

    <div class="col-sm-6">
  
      <a href = "{{route('sellerProduct')}}">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Sell your Products</h5>
            <p class="card-text">Sell your products at Shopwayy.</p>
          </div>
        </div>
      </a>
    </div>


    <div class="col-sm-6">
      <div class="card">
        <a href="#">
          <div class="card-body">
            <h5 class="card-title">Checkout your Sales</h5>
            <p class="card-text">Checkout detailed statistics your sales happening at Shopwayy.</p>
          </div>
      </div>
      </a>
    </div>
  </div>
  <center>
    <div class="text-muted">Looking to buy something?? Login using customer's account.</div>
  </center>
  <br>