<?php 
include"includes/header.php";
include"../database.php";
session_start();
if($_SESSION['is_login']){
     $email = $_SESSION['email'];
}else{
  header('location: requester-login.php');
}
?>

<?php 

$sql = "SELECT * FROM submit_request WHERE s_id = {$_SESSION['myid']}";
$result = mysqli_query($conn,$sql) or die('connection_aborted');

if (mysqli_num_rows($result) == 1) {
   $row = mysqli_fetch_assoc($result);
echo "<div class='col-md-6 mt-2 mx-4'>

           <table class='table'>
              <tbody>
              <tr>
                  <th>Request ID</th>
                  <td>".$row['s_id']."</td>
               </tr>
               <tr>
                  <th>Name</th>
                  <td>".$row['s_name']."</td>
               </tr>
               <tr>
                  <th>Email ID</th>
                  <td>".$row['s_email']."</td>
               </tr>
                <tr>
                  <th>Request Information</th>
                  <td>".$row['s_information']."</td>
               </tr>
               <tr>
                  <th>Request Description</th>
                  <td>".$row['s_description']."</td>
               </tr>
                <tr>
                  <td>
                   <form class='d-print-none'>
                     <input class='btn btn-danger' type='submit' value='print' onClick ='window.print()'>
                   </form>
                  </td>
               </tr>   
              </tbody>
           </table>

 	      </div>";
 }else{
 	echo"connection failed";
 }
 
 include'includes/footer.php';

 ?>