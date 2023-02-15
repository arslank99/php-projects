<?php include"header.php"?>
<div class="container-fluid p-0 over">
    <div class="row">
        <div class="col-md-12">
        <div class="img-custom">
           <img src="images/book.jpg" alt="books">
        </div>
        </div>
    </div>
</div>
<div class="container my-4">
    <div class="row">
    <?php
    if(isset($_GET["id"])){
    $cid = $_GET["id"];
    $course_select = "SELECT * FROM course_tb WHERE course_id = '$cid'";
    $sql = mysqli_query($conn,$course_select) or die("failed");
    if(mysqli_num_rows($sql) > 0){
    while($crow = mysqli_fetch_assoc($sql)){ 
    ?>
        <div class="col-md-4">
            <img src="<?php echo $crow["course_img"];?>" alt="" class="card-img-top">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title mb-1 fw-bolder">Course Name : <?php echo $crow["course_name"];?></h5>
                <p class="card-text"><?php echo $crow["course_desc"];?></p>
                <p class="card-text fw-bolder">Duration : <?php echo $crow["course_duration"];?></p>
                <form action="" method="POST">
                 <p class="card-text d-inline fw-bolder">Price : <small>
                    <del><?php echo $crow["course_price"];?></del></small><span class="mx-2 fw-bolder"><?php echo $crow["course_original_price"];?></span>
                </p>
                <input type="submit" class="btn btn-primary text-white float-end"
                value="Buy Now">
                </form>
            </div>
        </div>
    <?php 
     }
    }
    }          
    ?>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Lesson.No</th>
                        <th>Lesson Name</th>
                    </tr>
                </thead>
                <tbody>
            <?php 
             $lesson_select = "SELECT * FROM lesson_tb";
             $lesson_query = mysqli_query($conn,$lesson_select) or die("failed");
             if(mysqli_num_rows($lesson_query) > 0){
            $count = 0;
             while($lesson_row = mysqli_fetch_assoc($lesson_query)){ 
             if($cid == $lesson_row['course_id']){
             $count++;
            ?>
                <tr>
                    <td><?php echo $count++;?></td>
                    <td><?php echo $lesson_row["lesson_name"];?></td>
                </tr>
            <?php 
             } 
                }  
             }
             ?>
                </tbody>
           </table>
        </div>
    </div>
</div>
<?php include"footer.php"?>