<!-- header.php -->
<?php include"header.php"; ?>
<!-- header.php -->

<!-- video -->
<div class="container-fluid over p-0">
     <div class="vid-parent">
         <video autoplay muted loop>
           <source src="video/school.mp4">
         </video>
         <div class="overlay"></div>
     </div>
     <div class="video-content">
        <h1>Welcome To Ischool</h1>
        <h5>Learn and Implement</h5>
        <?php 
            if (isset($_SESSION['is_login'])) {
            echo'<a href="student/student-profile.php" class="btn btn-outline-primary mt-1">My Profile</a>';
             }else {
                echo '<a href="" class="btn btn-outline-danger mt-1" data-bs-toggle="modal" data-bs-target="#RegistrationModal">Get Started</a>';
              }

         ?>
        
         <!-- Button trigger modal -->
     </div>
</div> <!-- video -->
<!-- text banner -->
<div class="container-fluid bg-danger text-center text-white mydisplay py-2 custom-hover">
 <div class="row">
   <div class="col-md-3 main-div">
    <h5><i class="fa fa-address-book mx-2"></i>100+ online courses</h5>
   </div>
   <div class="col-md-3 main-div">
   <h5><i class="fa fa-users mx-2"></i>Expert Instructors</h5>
   </div>
   <div class="col-md-3 main-div">
   <h5><i class="fa fa-keyboard mx-2"></i>Lifetime Access</h5>
   </div>
   <div class="col-md-3 main-div">
   <h5><i class="fa fa-rupee-sign mx-2"></i>Money back Gaurantee</h5>
   </div>
 </div>
</div><!-- end text banner -->
<!-- Popular Course Section -->
<div class="container my-5">
  <!-- Course heading row -->
  <div class="row">
    <div class="col-md-12 text-center">
       <h1 class="">Popular Course</h1>
    </div>
  </div>
  <!-- course card 1st row -->
<div class="row">
<?php 
   $select_dynamic = "SELECT * FROM course_tb";
   $result_dynamic = mysqli_query($conn,$select_dynamic) or die("connection failed");
   if(mysqli_num_rows($result_dynamic) > 0 ){
     while($row_dynamic = mysqli_fetch_assoc($result_dynamic)){
  ?>
<div class="col-md-4">
  <div class="card mt-3">
    <img src="<?php echo $row_dynamic["course_img"];?>" class="card-img-top img-fluid" alt="image">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row_dynamic["course_name"];?></h5>
      <p class="card-text"><?php echo $row_dynamic["course_desc"];?></p>
    </div>
    <div class="card-footer d-flex justify-content-between">
      <p class="card-text d-inline">Price: <small><del><?php echo $row_dynamic["course_price"];?></del><span class="ms-2"><b><?php echo $row_dynamic["course_original_price"];?></b></span></small></p>
      <a href="course-detail.php?id=<?php echo $row_dynamic['course_id'];?>" class="btn btn-outline-primary ">Enroll</a>
    </div>
  </div>
</div>
<?php
     }
    } 
   ?>
</div>
  <div class="row text-center mt-4">
    <div class="col-md-12">
      <a href="courses.php" class="btn btn-outline-danger">View All Course</a>
    </div>
  </div>
</div><!-- Popular Course Section End -->
   <!-- Contact us  -->
   <?php include"contact.php"; ?>
   <!-- Contact us  -->
    <!-- Carousel Slider Start-->
        <div class="container-fluid mt-5 custom-color" id="feedback">
          <h1 class="text-center text-white p-5">Student's Feedback</h1>
          <div class="row">
            <div class="col-md-12 text-white p-3">
            <div class="owl-carousel owl-theme owl-carousel-responsive">
            <?php 
              $select_dynamic = "SELECT stu_name,stu_occ,stu_img,f_content FROM student JOIN feedback ON student.stu_id = feedback.stu_id";
              $result_dynamic = mysqli_query($conn,$select_dynamic) or die("connection failed");
              if(mysqli_num_rows($result_dynamic) > 0 ){
              while($row_dynamic = mysqli_fetch_assoc($result_dynamic)){
               ?>
                  <div class="item">
                    <p class="slider-p"><?php echo $row_dynamic['f_content']; ?></p>
                     <div class="pic">
                      <img src="<?php echo $row_dynamic['stu_img'];?>" class="img-fluid" alt="">
                     </div>
                     <div class="testimonial-prof">
                        <h4 class="text-warning"><?php echo $row_dynamic['stu_name'];?></h4>
                        <small><?php echo $row_dynamic['stu_occ'];?></small>
                     </div>
                    </div>
                    <?php
                       }
                     } 
                     ?>
               </div> 
            </div>
          </div>
        </div><!-- Carousel Slider Start End-->
        <!-- social icons -->
      <div class="container-fluid bg-danger text-white py-2 text-center custom-hover">
        <div class="row">
          <div class="col-md-3 main-div">
            <h5><i class="fab fa-facebook-f mx-2"></i>Facebook</h5>
          </div>
          <div class="col-md-3 main-div">
            <h5><i class="fab fa-twitter mx-2"></i>Twitter</h5>
          </div>
          <div class="col-md-3 main-div">
            <h5><i class="fab fa-whatsapp mx-2"></i>WhatsApp</h5>
          </div>
          <div class="col-md-3 main-div">
            <h5><i class="fab fa-instagram mx-2"></i>Instagram</h5>
          </div>
        </div>
      </div> <!-- end social icons -->
      <div class="container mt-5 text-center">
        <div class="row">
          <div class="col-md-4">
              <h4>About Us</h4>
              <p>Ischool provide universal access to the world best education,partnering with top universities and organizations to offer course online.</p>  
          </div>
          <div class="col-md-4">
            <h4>Category</h4>
             <p>Web development<br> Web design <br>Andriod App development <br>IOS development<br> Data analysis</p>
          </div>
          <div class="col-md-4">
            <h4>Contact Us</h4>
            <p>Ischool pvt Ltd</p>
            <p>Near Shalimar plaza Road Lahore.</p>
            <p>Ph: +92333-444-555</p>
          </div>
        </div>
      </div>

      <!-- footer.php -->
      <?php include"footer.php";?>
      <!-- footer.php -->