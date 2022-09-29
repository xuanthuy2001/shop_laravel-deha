<html lang="en"><head>
    <meta charset="utf-8">
    <title>shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta name="csrf-token" content="hGMtTjtqWxpCexuYSYU56IeL0FZYjMHQ2kmkqDii">
    <link href="http://127.0.0.1:8000/client/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="http://127.0.0.1:8000/client/css/style.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <style>
        .parent_eye{
        position: relative;
        display: inline-block;
        }
        .parent_eye input {
            padding-right: 2.4em;
            height: 2em;
          }

          .parent_eye  input::-ms-reveal {
            display: none;
          }
         .parent_eye span {
            position: absolute;
            right: 14px;
            top: 45%;
            transform: translateY(-50%);
            z-index: 100;
          }
         .parent_eye span svg {
            display: block;
            padding: .2em;
            width: 1.3em;
            height: 1.3em;
          }
    </style>
<body>
   <div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8" style="padding: 0">
          <div class="card">
              <div class="card-header">Login</div>

              <div class="card-body">
                  <form method="POST" action="http://127.0.0.1:8000/login">
                      <input type="hidden" name="_token" value="hGMtTjtqWxpCexuYSYU56IeL0FZYjMHQ2kmkqDii">
                      <div class="row mb-3">
                          <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control " name="email" value="" required="" autocomplete="email" autofocus=""></div>
                      </div>

                      <div class="row mb-3">
                          <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                          <div class="col-md-6 parent_eye" >
                              <input id="password" type="password" class="form-control " name="password" required="" autocomplete="current-password">
                              <span>
                                <svg id="togglePassword"   style="cursor: pointer"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.209 0-4 1.792-4 4 0 2.209 1.791 4 4 4s4-1.791 4-4c0-2.208-1.791-4-4-4z"/></svg>
                              </span>
                            </div>
                          
                      </div>
                      <div class="row mb-3">
                          <div class="col-md-6 offset-md-4">
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                  <label class="form-check-label" for="remember">
                                      Remember Me
                                  </label>
                              </div>
                          </div>
                      </div>

                      <div class="row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Login
                              </button><a class="btn btn-link" href="http://127.0.0.1:8000/forgot-password">Forgot Your Password?</a></div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
</body>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
        
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        // toggle the eye icon
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
        });
    </script>
</html>