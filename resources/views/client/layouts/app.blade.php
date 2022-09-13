<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <title>@yield('title','shop')</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="Free HTML Templates" name="keywords">
      <meta content="Free HTML Templates" name="description">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Favicon -->
      <link href="{{asset('client/img/favicon.ico')}}" rel="icon">

      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet">

      <!-- Font Awesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

      <!-- Libraries Stylesheet -->
      <link href="{{asset('client/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


      <!-- Customized Bootstrap Stylesheet -->
      <link href="{{asset('client/css/style.css')}}" rel="stylesheet">
      <script type="text/javascript">
            function myFunction() {
                  var input, filter, ul, li, a, i;
                  input = document.getElementById('searchInput');
                  filter = input.value.toUpperCase();
                  listPro = document.getElementById("product_list");
                  li = document.getElementById("product_item");
                  console.log(li);
              }
         </script>
      <style>
                 .limit-text{
                  color: blue
                 }
      </style>
            
</head>

<body>
      <!-- Topbar Start -->
      <div class="container-fluid">
            <div class="row bg-secondary py-2 px-xl-5">
                  <div class="col-lg-6 d-none d-lg-block">
                        <div class="d-inline-flex align-items-center">
                              <a class="text-dark" href="">FAQs</a>
                              <span class="text-muted px-2">|</span>
                              <a class="text-dark" href="">Help</a>
                              <span class="text-muted px-2">|</span>
                              <a class="text-dark" href="">Support</a>
                        </div>
                  </div>
                  <div class="col-lg-6 text-center text-lg-right">
                        <div class="d-inline-flex align-items-center">
                              <a class="text-dark px-2" href="">
                                    <i class="fab fa-facebook-f"></i>
                              </a>
                              <a class="text-dark px-2" href="">
                                    <i class="fab fa-twitter"></i>
                              </a>
                              <a class="text-dark px-2" href="">
                                    <i class="fab fa-linkedin-in"></i>
                              </a>
                              <a class="text-dark px-2" href="">
                                    <i class="fab fa-instagram"></i>
                              </a>
                              <a class="text-dark pl-2" href="">
                                    <i class="fab fa-youtube"></i>
                              </a>
                        </div>
                  </div>
            </div>
            <div class="row align-items-center py-3 px-xl-5">
                  <div class="col-lg-3 d-none d-lg-block">
                        <a href="{{ route('client.home') }}" class="text-decoration-none">
                              <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                          class="text-primary font-weight-bold border px-3 mr-1">B</span>BookStore</h1>
                        </a>
                  </div>
                  <div class="col-lg-6 col-6 text-left">
                        <form action="">
                              <div class="input-group">
                                    <input onkeyup="myFunction()" type="text" class="form-control " id ="searchInput" placeholder="Search for products">
                                    <div class="input-group-append">
                                          <span class="input-group-text bg-transparent text-primary">
                                                <i class="fa fa-search"></i>
                                          </span>
                                    </div>
                              </div>
                        </form>
                  </div>
                  <div class="col-lg-3 col-6 text-right">
                        <a href="" class="btn border">
                              <i class="fas fa-heart text-primary"></i>
                              <span class="badge">0</span>
                        </a>
                        <a href="{{ route('client.carts.index') }}" class="btn border">
                              <i class="fas fa-shopping-cart text-primary"></i>
                              <span class="badge" id="productCountCart">{{ $countProductInCart }}</span>
                        </a>
                  </div>
            </div>
      </div>
      <div class="container-fluid mb-5">
            <div class="row border-top px-xl-5">
                  <div class="col-lg-3 d-none d-lg-block">
                        <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                              data-toggle="collapse" href="#navbar-vertical"
                              style="height: 65px; margin-top: -1px; padding: 0 30px;">
                              <h6 class="m-0">Categories</h6>
                              <i class="fa fa-angle-down text-dark"></i>
                        </a>
                        <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                              @foreach($categories as $item)
                                       @if($item->childrent -> count() > 0)
                                             <div class="nav-item dropdown">
                                                   <a href="" class="nav-link" data-toggle="dropdown">{{ $item -> name }} <i
                                                         class="fa fa-angle-down float-right mt-1"></i>
                                                   </a>
                                                   <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                                         @foreach($item->childrent as $childCategory)
                                                            <a href="{{ route('client.products.index',[
                                                                  'product_id' => $childCategory ->id
                                                               ]) }}" class="dropdown-item">{{ $childCategory->name }}</a>
                                                         @endforeach
                                                   </div>
                                              </div>                                              
                                          @else()
                                                <a href="" class="dropdown-item p-0" >{{ $item->name }}</a>
                                                
                                          @endif
                                         
                              @endforeach
                           </div>
                  </div>
                  <div class="col-lg-9">
                        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                              <a href="" class="text-decoration-none d-block d-lg-none">
                                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                                class="text-primary font-weight-bold border px-3 mr-1">B</span>BookStore
                                    </h1>
                              </a>
                              <button type="button" class="navbar-toggler" data-toggle="collapse"
                                    data-target="#navbarCollapse">
                                    <span class="navbar-toggler-icon"></span>
                              </button>
                              <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                    <div class="navbar-nav mr-auto py-0">
                                          <a href="{{ route('client.home') }}" class="nav-item nav-link   {{ request() -> routeIs('client.home')? 'active' : '' }}">Home</a>
                                          <a href="{{ route('client.orders.index') }}" class="nav-item nav-link {{ request() -> routeIs('client.orders.index')? 'active' : '' }}">Order</a>
                                       
                                          
                                    </div>
                                    <div class="navbar-nav ml-auto py-0">
                                        @if(auth() -> check() )
                                          <a class="dropdown-item" href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                              {{ __('Logout') }}
                                          </a>
      
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                              @csrf
                                          </form>
                                        @else
                                        <a href="/login" class="nav-item nav-link">Login</a>
                                        <a href="" class="nav-item nav-link">Register</a>
                                        @endif
                                    </div>
                              </div>
                        </nav>
                        <div id="header-carousel" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner">
                                    <div class="carousel-item active" style="height: 410px;">
                                          <img class="img-fluid" src="{{asset('client/img/95517.jpg')}}"
                                                alt="Image">
                                          <div
                                                class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                                <div class="p-3" style="max-width: 700px;">
                                                      <h4 class="text-light text-uppercase font-weight-medium mb-3">10%
                                                            Off Your First Order</h4>
                                                      <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                                                            Fashionable Dress</h3>
                                                      <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="carousel-item" style="height: 410px;">
                                          <img class="img-fluid" src="{{asset('client/img/95510.jpg')}}"
                                                alt="Image">
                                          <div
                                                class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                                <div class="p-3" style="max-width: 700px;">
                                                      <h4 class="text-light text-uppercase font-weight-medium mb-3">10%
                                                            Off Your First Order</h4>
                                                      <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                                                            Reasonable Price</h3>
                                                      <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="carousel-item" style="height: 410px;">
                                          <img class="img-fluid" src="{{asset('client/img/130981.jpg')}}"
                                                alt="Image">
                                          <div
                                                class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                                <div class="p-3" style="max-width: 700px;">
                                                      <h4 class="text-light text-uppercase font-weight-medium mb-3">10%
                                                            Off Your First Order</h4>
                                                      <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                                                            Reasonable Price</h3>
                                                      <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                                          <span class="carousel-control-prev-icon mb-n2"></span>
                                    </div>
                              </a>
                              <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                                          <span class="carousel-control-next-icon mb-n2"></span>
                                    </div>
                              </a>
                        </div>
                  </div>
            </div>
      </div>
      <!-- Navbar End -->


      


      <!-- Products Start -->
     @yield('content')

      @include('client.layouts.footer')


      <!-- Back to Top -->
      <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


      <!-- JavaScript Libraries -->
      <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


      <!-- JavaScript Libraries -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
      <script src="{{ asset('client/lib/easing/easing.min.js') }}"></script>
      <script src="{{ asset('client/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  
      <!-- Contact Javascript File -->
      <script src="{{ asset('client/mail/jqBootstrapValidation.min.js') }}"></script>
      <script src="{{ asset('client/mail/contact.js') }}"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
          integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!-- Template Javascript -->
      <script src="{{ asset('client/js/main.js') }}"></script>
      <script type="text/javascript">
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
      </script>
      <script src="{{ asset('admin/assets/base/base.js') }}"></script>
      @yield('js')
</body>

</html>