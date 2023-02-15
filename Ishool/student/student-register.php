<?php 

include"../database.php";

// checking email for already exists\
 if (isset($_POST['checkemail']) && isset($_POST['stuemail'])) {
     $stuemail = $_POST['stuemail'];
     $sqlite = "SELECT stu_email FROM student WHERE stu_email = '{$stuemail}'";
     $conclusion = mysqli_query($conn,$sqlite) or die("connection_aborted");
     if ($conclusion == TRUE) {
         $row = mysqli_num_rows($conclusion);
         echo json_encode($row);
     }
 }



if(isset($_POST['sign_up']) && isset($_POST['student_name']) 
 && isset($_POST['student_email']) && isset($_POST['student_password'])){

    $studentname = $_POST['student_name'];
    $studentemail = $_POST['student_email'];
    $studentpassword = $_POST['student_password'];

    $sql = "INSERT INTO `student`(`stu_name`, `stu_email`, `stu_password`) 
    VALUES ('$studentname','$studentemail','$studentpassword')";
    $result = mysqli_query($conn,$sql) or die("connection aborted");

    if($result == TRUE){
        echo json_encode("OK");
    }else{
        echo json_encode("Failed");
    }


}

?>