
<?php 

include"header.php"; 

?>

<!-- start jumbotron header -->
<div class="p-4 Jumbotron" id="custom-bg">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">
               <div class="col-md-4"></div>
               <div class="col-md-4 text-center custom-margin" id="showed">
                    <h1 class="text-uppercase text-danger"> <Strong>Welcome to OSMS</Strong></h1>
                    <p style=""><em>Customer's Happiness is Our Aim</em></p>
                    <a href="Requester/requester-login.php" class="btn btn-success">Login</a>
                    <a href="#Register" class="btn btn-danger">Sign Up</a>
               </div>
               <div class="col-md-4"></div>
          </div>
     </div>
</div>
<!-- start jumbotron header end -->

<!-- services section -->
               
<div class="container" id="Services">
     <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
               <div class="mt-4 p-5 bg-secondary text-white rounded text-center">
                    <h3 class="text-center">OSMS Services</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt aspernatur, iure. Dicta exercitationem nostrum necessitatibus reiciendis aliquam officiis eligendi tempora, sequi ratione consequatur unde adipisci quos saepe ut fugit minima!Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                         consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
               </div>
          </div>
          <div class="col-md-1"></div>
     </div>
</div>
<!-- services section end -->

<!-- our Services -->
<div class="container mt-5 text-center" style="font-family: 'Ubuntu', sans-serif;">
     <div class="row">
          <div class="col-md-12">
               <h2>Our Services</h2>
          </div>
     </div>
</div>
<div class="container mt-5 text-center border-bottom">
     <div class="row">
          <div class="col-md-4">
               <a href="" class=""><i class="fa fa-tv fa-8x text-success"></i></a>
               <h4 class="mt-3">Application Appliances</h4>
          </div>
          <div class="col-md-4">
               <a href="" class=""><i class="fa fa-sliders-h fa-8x text-primary"></i></a>
               <h4 class="mt-3">Preventive Maintenance</h4>
          </div>
          <div class="col-md-4">
               <a href="" class=""><i class="fa fa-cogs fa-8x text-info"></i></a>
               <h4 class="mt-3">Fault Repair</h4>
          </div>
     </div>
</div>
<!-- our Services end -->


<!-- Start Registration form -->
     <?php include"user-register.php";?>
<!-- Start Registration form  end-->

<!-- Happy customer section -->
<div class="container-fluid mt-5 p-5 bg-danger">
     <div class="my-4 text-white rounded text-center">
          <h1>Happy Customers</h1>
     </div>
     <div class="row">
          <div class="col-lg-3 col-sm-6">
               <div class="card shadow-lg mb-2">
                    <div class="card-body text-center">
                         <img src="images/1.jpg" alt="" class="img-fluid rounded">
                         <div class="mt-2">
                              <h4 class="card-title">Amelia John</h4>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi necessitatibus in facere similique.Lorem ipsum dolor sit amet.</p>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-lg-3 col-sm-6">
               <div class="card shadow-lg mb-2">
                    <div class="card-body text-center">
                         <img src="images/2.jpg" alt="" class="img-fluid rounded">
                         <div class="mt-2">
                              <h4 class="card-title">Gary Willsom</h4>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi necessitatibus in facere similique.Lorem ipsum dolor sit amet.</p>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-lg-3 col-sm-6">
               <div class="card shadow-lg mb-2">
                    <div class="card-body text-center">
                         <img src="images/3.jpg" alt="" class="img-fluid rounded">
                         <div class="mt-2">
                              <h4 class="card-title">Paul Heyman</h4>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi necessitatibus in facere similique.Lorem ipsum dolor sit amet.</p>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-lg-3 col-sm-6">
               <div class="card shadow-lg mb-2">
                    <div class="card-body text-center">
                         <img src="images/4.jpg" alt="" class="img-fluid rounded">
                         <div class="mt-2">
                              <h4 class="card-title">john Doe</h4>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi necessitatibus in facere similique.Lorem ipsum dolor sit amet.</p>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     </div><!-- Happy customer section end -->

     
<!-- Contact Us -->
 <?php include"contact.php";?>
<!-- Contact us end -->


<!-- Footer -->
<?php include"footer.php";?>
<!-- Footer end -->

