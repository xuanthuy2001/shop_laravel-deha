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
      
      <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
      <script>
        var availableTags = '';
        $.ajax({
          method: "GET",
          url: '/product-list',
          success: function(response) {
                 startAutocomplete(response);
          }
        });
        function startAutocomplete(availableTags) {
            $( "#searchInput" ).autocomplete({
                source: availableTags
              });
        } 
      </script>

      <script type="text/javascript">
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
      </script>
      <script src="{{ asset('admin/assets/base/base.js') }}"></script>
      @yield('js')