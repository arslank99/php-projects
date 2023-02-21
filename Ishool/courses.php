<?php include"header.php";?>
<div class="container-fluid p-0 over">
    <div class="row">
        <div class="col-md-12">
        <div class="img-custom">
           <img src="images/book.jpg" alt="books">
        </div>
        </div>
    </div>
</div>
<!-- Popular Course Section -->
<div class="container my-5">
  <!-- Course heading row -->
  <div class="row">
    <div class="col-md-12 text-center">
       <h1 class="">All Course</h1>
    </div>
  </div>
  <!-- course card 1st row -->
<div class="row">
<?php
    $course_select = "SELECT * FROM course_tb";
    $sql = mysqli_query($conn,$course_select) or die("failed");
    if(mysqli_num_rows($sql) > 0){
    while($crow = mysqli_fetch_assoc($sql)){ 
  ?>
<div class="col-md-6">
  <div class="card mt-3">
    <img src="<?php echo str_replace("..",".",$crow["course_img"]);?>" class="card-img-top img-fluid" alt="image">
    <div class="card-body">
      <h5 class="card-title"><?php echo $crow["course_name"];?></h5>
      <p class="card-text"><?php echo $crow["course_desc"];?></p>
    </div>
    <div class="card-footer d-flex justify-content-between">
      <p class="card-text d-inline">Price: <small><del><?php echo $crow["course_price"];?></del><span><b><?php echo $crow["course_original_price"];?></b></span></small></p>
      <a href="course-detail.php" class="btn btn-primary ">Enroll</a>
    </div>
  </div>
</div>
<?php    
    }
  }
  ?>
</div><!-- Popular Course Section End -->
<?php include"contact.php";?>
<?php include"footer.php";?>
<!-- footer end -->

