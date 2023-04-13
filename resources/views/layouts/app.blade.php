<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- <link rel="stylesheet" href="assets/assets/img/"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
      <!-- @once
      @stack('styles')
      @endonce -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/133d03ba7a.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
</head>
<body>
<header class="container-fluid">
    
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img width="60px" src="assets/img/printlogo.png" alt="">
        </a>
        <button class="navbar-toggler" style="background-color:#F7913E;" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item px-3">
              <a class="nav-link active text-dark fw-bold" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link text-dark fw-bold" aria-current="page" href="/products">Products</a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link text-dark fw-bold" data-bs-toggle="modal" data-bs-target="#howtoordermodal" aria-current="page" href="">How to order</a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link text-dark fw-bold" aria-current="page" href="faq.html">FAQs</a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link text-dark fw-bold" aria-current="page" href="getaquote.html">Get a Quote</a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link text-dark fw-bold" aria-current="page" href="contact.html">Contact Us</a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link text-dark fw-bold" aria-current="page" href="paymentmethod.html">Payment Method</a>
            </li>
          </ul>



            @guest
                @if (Route::has('login'))
                  <a data-bs-toggle="modal" data-bs-target="#logInform"  class="text-decoration-none aLogin mx-2">Login</a>|
                  <a data-bs-toggle="modal" data-bs-target="#signUp"  class="text-decoration-none aLogin mx-2">Signup</a>
                @endif
                
            @else
              <a class="text-decoration-none aLogin mx-2">{{ Auth::user()->name }}</a>
              <a href="{{ route('logout') }}"  class="text-decoration-none aLogin mx-2" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"><i class="fa-solid fa-arrow-right"></i></a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
                
            @endguest

        </div>
        

      </div>
    </nav>
  </header>
  


  
    @yield('content')
  


  <hr class="dashed-2">
  
   <!-- START FOOTER -->
   <footer class="py-5 text-secondary">
    <div class="container" >
      <div class="row pb-5">
        <div class="col-12 text-center">
          <a href="#top"><img width="40px" src="assets/img/top.png" alt=""></a>
        </div>
      </div>
      <div class="row m-2">
        <div class="col-xl-3 col-lg-4 col-md-6">
          <div>
            <h5 class="fw-bold">Contact Us</h5>
            <ul class="list-unstyled">
              <li>
                <a class="nav-link text-secondary">
                  Printing Services <br>
                  Business Hours: <br>
                  Monday - Saturday<br>
                  8:00 AM - 6:00 PM<br>
                  Online Shop - Business Hours: 24/7<br>
                  Main address : Brgy. Duterte, Davao City<br>
                  Contact no. : 0946 934 1998<br>
                  Email : account@gmail.com</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-2 offset-xl-1 col-lg-2 col-md-6">
          <div class="">
            <h5 class="fw-bold">Payment Option</h5>
            <ul class="list-unstyled">
              <li>
                <a class="nav-link text-secondary" aria-current="page" href="paymentmethod.html">Bank Transfer</a>
              </li>
              <li>
                <a class="nav-link text-secondary"  aria-current="page" href="paymentmethod.html">Gcash</a>
              </li>
              <li>
                <a class="nav-link text-secondary" aria-current="page" href="paymentmethod.html">Maya</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6">
          <div>
            <h5 class="fw-bold">Stay Connected</h5>
            <ul class="list-unstyled">
              <a href="https://www.facebook.com/printcraffiti" class="" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook text-secondary fs-2 m-1"></i></a> 
              <a href="https://www.m.me/printcraffiti" class="" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-messenger text-secondary fs-2 m-1"></i></a> 
              <a href="" class=""><i class="fa-brands fa-pinterest text-secondary fs-2 m-1"></i></a> 
              <a href="" class=""><i class="fa-brands fa-viber text-secondary fs-2 m-1"></i></a> 
            </ul>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6">
          <div>
            <h5 class="fw-bold">More</h5>
            <ul class="list-unstyled">
              <li>
                <a class="nav-link text-secondary" aria-current="page" href="faq.html">FAQs</a>
              </li>
              <li>
                <a class="nav-link text-secondary" data-bs-toggle="modal" data-bs-target="#howtoordermodal" aria-current="page" href="">How to order</a>
                <!--a class="nav-link text-secondary" onclick="howToOrder()" href="#">How to order</a-->
              </li>
              <li>
                <a class="nav-link text-secondary" aria-current="page" data-bs-toggle="modal" data-bs-target="#logInform" href="">Login</a>
              </li>
              <li>
                <a class="nav-link text-secondary" aria-current="page" data-bs-toggle="modal" data-bs-target="#signUp" href="">Signup</a>
              </li>
            </ul>
          </div>
        </div>
      </div><br>
      <div class="d-flex justify-content-center m-2">
        <div class="copyright "> 
          <p class="fw-bold">Copyright @ 2023 Printcraffiti Printing Services</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- END FOOTER -->

    <!-- STARTS Modal SIGNUP-->
    <div class="modal fade" id="signUp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  text-center" >
        <div class="modal-content">
          <button type="button" class="btn-close m-3 align-self-end" data-bs-dismiss="modal" aria-label="Close"></button>
          <form action="" class="col-11 align-self-center">
            <h5 class="display-6 text-gray text-center">
            <b>CREATE ACCOUNT</b></h5>
              <label>Please enter details to create account!</label>
            <div class="modal-body">
              
              <div class="row g-2">

                <div class="col-md">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputGrid"required>
                    <label for="floatingInputGrid">Firstname</label>
                  </div>
                </div>
                <div class="col-md">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputGrid"required>
                    <label for="floatingInputGrid">Lastname</label>
                  </div>
                </div>
                <div class="form-floating mb-3 ">
                  <input required type="text" class="form-control" id="floatingInput" placeholder="" required>
                  <label>Username</label>
                </div>
                <div class="form-floating mb-3 ">
                  <input required type="email" class="form-control" id="floatingInput" placeholder="" required>
                  <label>Email</label>
                </div>
                <div class="form-floating mb-3">
                  <input required type="password" class="form-control" id="floatingPassword" placeholder="" required>
                  <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                  <input required type="password" class="form-control" id="floatingPassword" placeholder="" required>
                  <label for="floatingPassword">Re-type password</label>
                </div>
                  
              </div>
              <button type="submit" class="myBtn myblue d-grid gap-2 col-6 mx-auto btn btn-md">Create Account</button><BR><BR>
              Already have an account? <a class="btn btn-sm rounded-pill fw-bold" data-bs-toggle="modal" data-bs-target="#logInform">Login</a><BR><BR>
  
              
            </div>
          </form>
        </div>
      </div>
    </div><!-- END Modal SIGNUP-->
    
  <!-- Modal LOGIN-->
  <div class="modal fade" id="logInform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  text-center" >
      <div class="modal-content">
        <button type="button" class="btn-close m-3 align-self-end" data-bs-dismiss="modal" aria-label="Close"></button>
        <form class="form w-100" id="user_signin_form">
          <h5 class="display-6 text-gray text-center">
          <b>LOGIN</b></h5>
          <div class="modal-body">
            <div class="form-floating mb-3 ">
              <input required type="email" id="email" name="email" class="form-control" placeholder="" autocomplete="email" autofocus>
              <label>Email</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" id="password" name="password" class="form-control" placeholder="" required autocomplete="current-password">
              <label for="floatingPassword">Password</label>
            </div>
            <!-- @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror -->
            <label class="text-danger d-none invalid-credentials">Invalid Email Or Password</label>
            <button type="submit" id="submit_credentials" class="d-grid gap-2 col-6 mx-auto btn btn-lg btn-secondary">Login</button><BR><BR>
            <div class="">Forgot Password?</div>  
            Don't have an account? <a class="btn btn-sm rounded-pill fw-bold" data-bs-toggle="modal" data-bs-target="#signUp">Create Account</a><BR><BR>

            <!-- <a href="https://www.facebook.com/printcraffiti" class="" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook text-secondary fs-4 m-1"></i></a> 
            <a href="https://www.m.me/printcraffiti" class="" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-messenger text-secondary fs-4 m-1"></i></a> 
            <a href="" class=""><i class="fa-brands fa-pinterest text-secondary fs-4 m-1"></i></a> 
            <a href="" class=""><i class="fa-brands fa-viber text-secondary fs-4 m-1"></i></a>  -->
          </div>
        </form>
      </div>
    </div>
  </div>
   <!-- END Modal LOGIN-->


  <!-- Start How to Order Modal -->
  <div class="modal fade" id="howtoordermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">How to order</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-floating mb-3">
              <p class="modal-title" id="exampleModalLabel">
                1. Login or register for an account
              </p>
              <p class="modal-title" id="exampleModalLabel">
                2. Choose type of product
              </p>
              <p class="modal-title" id="exampleModalLabel">
                3. Fill out the order information
              </p>
              <p class="modal-title" id="exampleModalLabel">
                4. Submit artwork by: <br>
                &nbsp;&nbsp;a. Uploading a design, or<br>
                &nbsp;&nbsp;b. Choosing a design from the browser, or<br>
                &nbsp;&nbsp;c. Create your own design using the online 
                &nbsp;&nbsp;editing tool (applicable in desktop only)
              </p>
              <p class="modal-title" id="exampleModalLabel">
                5. Verify order information and accept the Terms and Conditions (please read before proceeding)
              </p>
              <p class="modal-title" id="exampleModalLabel">
                6. Verify shipping and billing address
              </p> 
              <p class="modal-title" id="exampleModalLabel">
                7. Select shipping type
              </p>
              <p class="modal-title" id="exampleModalLabel">
                8. Confirm order and proceed to checkout
              </p>
              <p class="modal-title" id="exampleModalLabel">
                9. Payment
              </p>
              <p class="modal-title fst-italic" id="exampleModalLabel">
                Note: You will receive an email of your 
                order transaction.
              </p>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        
      </div>
    </div>
  </div>
  <!-- End How to Order Modal -->

  <!-- Bootstrap JS -->
  <script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
  crossorigin="anonymous"></script>
  <!--begin::Page Scripts(used by this page)-->
  <script src="{{ mix('/js/pages/login/login.js')}}"></script>
  <!--end::Page Scripts-->
</body>
</html>
