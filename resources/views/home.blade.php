@extends('layouts.app')

@section('title', 'Home')

@section('content')

  <!-- START CAROUSEL -->
  <section class="container-fluid d-none d-sm-block">
    <div id="carouselExampleIndicators" class="carousel slide container py-3" data-bs-ride="carousel">
      <div class="carousel-indicators d-none d-lg-flex">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/img/5.png" class="d-block w-100" alt="Slide 1">
          <div class="carousel-caption d-none d-md-block">
            <h5>COMPANY ID</h5>
            <p>Looking for cheaper option yet great quality PVC ID's? <br> We've got you ! </p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="assets/img/1.png" class="d-block w-100" alt="Slide 2">
          <div class="carousel-caption d-none d-md-block">
            <h5>BUSINESS CARD</h5>
            <p>Wanna connect with people who might need  <br>your products and or services?</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/img/3.png" class="d-block w-100" alt="Slide 3">
          <div class="carousel-caption d-none d-md-block">
            <h5>PERSONALIZED NOTEBOOK</h5>
            <p>Things didn't go as you planned?
              <br>Rise and remember : We are all a work in progress</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="assets/img/4.png" class="d-block w-100" alt="Slide 4">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="text-dark">CUSTOMIZED DESK CALENDAR</h5>
            <p class="text-dark">Perfect gift for your loved ones or personal use</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/img/2.png" class="d-block w-100" alt="Slide 5">
          <div class="carousel-caption d-none d-sm-block">
            <h5>MINIMALIST PERSONALIZED MUG</h5>
            <p>Perfect gift for your loved ones</p>
          </div>
        </div>
     </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>

    </div>
  </section>
  <!-- END CAROUSEL -->

   <!-- START CAROUSEL -->
   <section class="container-fluid d-block d-sm-none">
    <div id="carouselExampleIndicators2" class="carousel slide container py-3" data-bs-ride="carousel">
      <div class="carousel-indicators d-none d-lg-flex">
        <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="4" aria-label="Slide 5"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/img/sm-5.png" class="d-block w-100" alt="Slide 1">
          <!-- <div class="carousel-caption">
            <h5>COMPANY ID</h5>
            <p>Looking for cheaper option yet great quality PVC ID's? <br> We've got you ! </p>
          </div> -->
        </div>

        <div class="carousel-item">
          <img src="assets/img/sm-1.png" class="d-block w-100" alt="Slide 2">
          <!-- <div class="carousel-caption">
            <h5>BUSINESS CARD</h5>
            <p>Wanna connect with people who might need  <br>your products and or services?</p>
          </div> -->
        </div>
        <div class="carousel-item">
          <img src="assets/img/sm-3.png" class="d-block w-100" alt="Slide 3">
          <!-- <div class="carousel-caption">
            <h5>PERSONALIZED NOTEBOOK</h5>
            <p>Things didn't go as you planned?
              <br>Rise and remember : We are all a work in progress</p>
          </div> -->
        </div>

        <div class="carousel-item">
          <img src="assets/img/sm-4.png" class="d-block w-100" alt="Slide 4">
          <!-- <div class="carousel-caption">
            <h5 class="text-dark">CUSTOMIZED DESK CALENDAR</h5>
            <p class="text-dark">Perfect gift for your loved ones or personal use</p>
          </div> -->
        </div>
        <div class="carousel-item">
          <img src="assets/img/sm-2.png" class="d-block w-100" alt="Slide 5">
          <!-- <div class="carousel-caption">
            <h5>MINIMALIST PERSONALIZED MUG</h5>
            <p>Perfect gift for your loved ones</p>
          </div> -->
        </div>
     </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>

    </div>
  </section>
  <!-- END CAROUSEL -->
  <section id="service" class="container-fluid" >
    <div class="container py-3">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="display-6 text-blue"><b><BR>TOP PRINT PRODUCTS</b></h2>
            </div>

            </div>

            <div class="row py-5" id="products">
              @foreach ($products as $product)
              <div class="col-md-4 col-sm-6 col-xs-6 col-12 col-lg-4 mb-4">
                  <div class="card card-shadow border p-3 btn-outline-secondary">
                  <div class="text-center">
                      <img src="assets/img/products/2.jpg" class="card-img-top" alt="">
                  </div><br>
                  <div class="text-center">
                      <h5 class="text-uppercase py-2 fw-bold text-secondary">{{$product->name}}</h5>
                      <p class="fs-5">
                      {{$product->specs}}<br> {{$product->lead_time}}
                      </p>
                      <p>
                          <!-- @if (Route::has('login'))
                              <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                  @auth
                                      <a href="{{ url('/') }}" class="btn btn-secondary p-2">Home</a>
                                  @else
                                      <a data-bs-toggle="modal" data-bs-target="#logInform" class="btn btn-secondary p-2">Buy Now</a>
                                      @if (Route::has('register'))
                                      
                                      @endif
                                  @endauth
                              </div>
                          @endif -->
                          

                      </p>
                  </div>
                  </div>
              </div>
              @endforeach
          </div>
    </div>
</section>
@endsection