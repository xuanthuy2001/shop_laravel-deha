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
            <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

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
      @include('client.layouts.topbar')
      <!-- Topbar End -->

      <!-- Navbar Start -->
      @include('client.layouts.navbar')
      <!-- Navbar End -->


      


      <!-- Products Start -->
     @yield('content')

      @include('client.layouts.footer')


      <!-- Back to Top -->
      @include('client.layouts.javascript')
   
</body>

</html>