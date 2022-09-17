<!--
=========================================================
* Material Dashboard 2 - v=3.0.2
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
      <link rel="icon" type="image/png" href="{{asset('admin/assets/img/favicon.png')}}">
      <title>
            @yield('title', 'dashboard')
      </title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!--     Fonts and icons     -->
      <link rel="stylesheet" type="text/css"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
      <!-- Nucleo Icons -->
      <link href="{{asset('admin/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
      <link href="{{asset('admin/assets/css/nucleo-svg.css" rel="stylesheet" />
      <!-- Font Awesome Icons -->
      <script src="https://kit.fontawesome.com/42d5adcbca.js')}}" crossorigin="anonymous">
      </script>
      <!-- Material Icons -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
      <!-- CSS Files -->
      <link id="pagestyle" href="{{asset('admin/assets/css/material-dashboard.css?v=3.0.2')}}" rel="stylesheet" />
      @yield('style')
</head>

<body class="g-sidenav-show  bg-gray-200">
      @include('admin.layouts.sidebar')
      <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            @include('admin.layouts.navbar')
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                  <div class="row">
                        @yield('content') 
                  </div>
                 
                  <footer class="footer py-4  ">
                        <div class="container-fluid">
                              <div class="row align-items-center justify-content-lg-between">
                                    <div class="col-lg-6 mb-lg-0 mb-4">
                                          <div class="copyright text-center text-sm text-muted text-lg-start">
                                                © <script>
                                                document.write(new Date().getFullYear())
                                                </script>,
                                                made with <i class="fa fa-heart"></i> by
                                                <a href="https://www.creative-tim.com" class="font-weight-bold"
                                                      target="_blank">Creative Tim</a>
                                                for a better web.
                                          </div>
                                    </div>
                                    <div class="col-lg-6">
                                          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                                <li class="nav-item">
                                                      <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                                            target="_blank">Creative Tim</a>
                                                </li>
                                                <li class="nav-item">
                                                      <a href="https://www.creative-tim.com/presentation"
                                                            class="nav-link text-muted" target="_blank">About Us</a>
                                                </li>
                                                <li class="nav-item">
                                                      <a href="https://www.creative-tim.com/blog"
                                                            class="nav-link text-muted" target="_blank">Blog</a>
                                                </li>
                                                <li class="nav-item">
                                                      <a href="https://www.creative-tim.com/license"
                                                            class="nav-link pe-0 text-muted" target="_blank">License</a>
                                                </li>
                                          </ul>
                                    </div>
                              </div>
                        </div>
                  </footer>
            </div>
      </main>
      @include('admin.layouts.plugin')
      <!--   Core JS Files   -->
      @include('admin.layouts.javascript')
</body>

</html>