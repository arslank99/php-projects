
      <div class="custom-color">
      <div class="container custom-color text-white">
        <div class="row">
          <div class="col-md-12 text-center py-1">
          <small>Copyright.2023 || Designed Project by E-learning.
            <a href="" class="" data-bs-toggle="modal" data-bs-target="#AdminLoginModal">Admin login</a></small>
          </div>
        </div>
      </div>
      </div>
<!-- Javascript -->
<script src="js/jquery.min.js"></script>
<!-- Owl Slider  -->
<script src="js/owl.carousel.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/all.min.js"></script>
<script src="js/style.js"></script>
<script src="js/ajaxcode.js"></script>


<!-- Sign up Registration Modal -->
<?php include"signup.php"; ?>
<!-- Sign up Registration Modal end-->

<!-- Login User Modal Start -->
<!-- Modal -->
<div class="modal fade" id="LoginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LoginModalLabel">
         Student Login Form
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" id="Loginform">
        <div class="mb-3">
        <strong>
          <i class="fas fa-envelope"></i>
          <label for="Email" class="form-label">Email address</label>
        </strong>
        <input type="email" class="form-control" id="loginemail" name="loginemail" placeholder="Email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
      <div class="mb-3">
      <strong>
        <i class="fas fa-key"></i>
        <label for="Password" class="form-label">Password</label>
      </strong>
      <input type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="Password">
      </div>
      </div>
      <div class="modal-footer">
      <small id="statuslog1"></small>
      <button type="button" class="btn btn-primary" id="loginbtn">
       Login
     </button>
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> 
        Close
      </button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Login User Modal end-->

<!-- AdminLogin Modal Start -->
<!-- Modal -->
<div class="modal fade" id="AdminLoginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AdminLoginLabel">
        Admin Login Form
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" id="AdminLoginForm">
        <div class="mb-3">
          <strong>
          <i class="fas fa-envelope"></i>
          <label for="AdminEmail" class="form-label">Email address</label>
          </strong>
          <input type="email" class="form-control" id="AdminLoginEmail" name="AdminLoginEmail" placeholder="Email">
        </div>
      <div class="mb-3">
        <strong>
        <i class="fas fa-key"></i>
        <label for="AdminPassword" class="form-label">Password</label>
        </strong>
       <input type="password" class="form-control" id="AdminLoginPassword" name="AdminLoginPassword" placeholder="Password">
      </div>
      </div>
      <div class="modal-footer">
            <small id="adminstatus"></small>
            <button type="button" class="btn btn-primary" id="AdminBtn">Login</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
      </div>
      </form>
    </div>
  </div>
</div>
<!-- AdminLogin Modal end-->
</body>
</html>