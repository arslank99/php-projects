

$(document).ready(function(){

$("#stuemail").on("keypress blur",function(){
let stuemail = $("#stuemail").val();
let reg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
$.ajax({
url: "student/student-register.php",
method: "POST",
data: {
checkemail: "checkemail",
stuemail:stuemail,
},
success:function(data){
console.log(data);
  if (data == 0) {
  $("#statusmsg2").html("<small class='ms-1 text-success'>Email is Available!</small>");
  $("#btnsign").attr("disabled",false);
  }
  else if(data == 1){
    $("#statusmsg2").html("<small class='ms-1 text-danger'>Email is Already exists!</small>");
    $("#btnsign").attr("disabled",true);
  }
  else if(!reg.test(stuemail)){
  $("#statusmsg2").html("<small class='ms-1 text-danger'>please enter valid email e.g example@gmail.com!</small>");
  $("#btnsign").attr("disabled",true);
  }

 }

});

});

});




function addstu(){
let stuname = $("#stuname").val();
let stuemail = $("#stuemail").val();
let stupassword = $("#stupassword").val();
let reg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

// checking empty fields
if (stuname.trim() == "") {
$("#statusmsg1").html("<small class='ms-1 text-danger'>please fill name field !</small>");
$("#statusmsg1").focus();
return false;
}

else if (stuemail.trim() == "") {
$("#statusmsg2").html("<small class='ms-1 text-danger'>please fill email field !</small>");
$("#statusmsg2").focus();
return false;
}

else if (stuemail.trim() != "" && !reg.test(stuemail)){
$("#statusmsg2").html("<small class='ms-1 text-danger'>please enter valid email e.g example@gmail.com!</small>");
$("#statusmsg2").focus();
$("#btnsign").attr("disabled",true);
return false;
}

else if (stupassword.trim() == "") {
$("#statusmsg3").html("<small class='ms-1 text-danger'>please fill password field !</small>");
$("#statusmsg3").focus();
return false;
}
else{
// ajax code here
$.ajax({
url:"student/student-register.php",
method:"POST",
dataType:"json",
data:{
sign_up : "signup",
student_name :stuname,
student_email :stuemail,
student_password :stupassword
},
success:function(data){
console.log(data);
if (data == "OK" ) {
$("#successmsg").html("<small class='alert alert-success'>Registration Successfully</small>");
EmptyAllFields();
}else if(data == "Failed"){
$("#successmsg").html("<small class='alert alert-success'>Registration Failed</small>");
}
}
});
}

} // function end bracket
// empty fields function
function EmptyAllFields(){
$("#Registerform").trigger("reset");
$("#statusmsg1").html(" ");
$("#statusmsg2").html(" ");
$("#statusmsg3").html(" ");
}


// Login student data form code
$(document).ready(function(){
   $("#loginbtn").on("click", function(){
      console.log("clicked");
      let logemail = $("#loginemail").val();
      let logpassword = $("#loginpassword").val();
      $.ajax({
          url : "student/login-email.php",
          method : "POST",
          data:{
          checkemail : "checkemail",
          logemail : logemail,
          logpassword : logpassword
        },
         success:function(data){
            console.log(data);
            if (data == 1) {
              $("#statuslog1").html("<div class='spinner-border text-success me-2'></div>");
              setTimeout(window.location.href="../student/student-profile.php", 1000);
            }else if (data == 0) {
              $("#statuslog1").html("<small class='alert alert-danger'>Invalid Email or Password</small>");
            }
         },

      });
   }); 
});


// Admin Login Form Checking Code
$(document).ready(function(){
  // button clicked by id
 $("#AdminBtn").on("click",function(){
    console.log("button clicked");
    // getting Values
     let Adminemail = $("#AdminLoginEmail").val();
     let Adminpassword = $("#AdminLoginPassword").val();
    //  ajax code start here
     $.ajax({
       url:"Admin/adminlogin.php",
       method:"POST",
       data:{
        Adminemailcheck:"Adminemailcheck",
        adminloginemail :Adminemail,
        adminloginpassword :Adminpassword
      },
       success:function(data){
         console.log(data);
         if(data == 1 ){
          $("#adminstatus").html("<small class='alert alert-success'>Login SuccessFully</small>");
          setTimeout(window.location.href="Admin/dashboard.php", 1000);
         }else if (data == 0){
          $("#adminstatus").html("<small class='alert alert-danger'>Invalid Email or Password!</small>");
         }
        
       },
     });
     //  ajax code start here
    });
});