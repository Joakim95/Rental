<?php include_once("Includes/header.php");
session_start();
if (isset($_SESSION['id'])) {
  # code...
  header("Location:landlord-dashboard.php");
}
//print_r($_SESSION);
?>
<body>
	
<center><a href="index.php"><h1 class="brandtitle">KenyaRentals</h1></a></center>

<div class="container">
	<div class="mx-auto form-folder">

<form id="registerForm">
	<div class="form-group">
    <label for="registeremail">First name <span class="star">*</span></label> 
    <input type="text" class="form-control" id="fname" aria-describedby="emailHelp" placeholder="Enter your first name" name="fname">
    <small id="reg-fname-help" class="form-text text-muted"></small>
  </div>

  	<div class="form-group">
    <label for="registeremail">Last name <span class="star">*</span></label>
    <input type="text" class="form-control" id="lname" aria-describedby="emailHelp" placeholder="Enter your last name" name="lname">
    <small id="reg-lname-help" class="form-text text-muted "></small>
  </div>

    <div class="form-group">
    <label for="registeremail">National ID number <span class="star">*</span></label>
    <input type="number" class="form-control" id="id" aria-describedby="emailHelp" placeholder="Enter your ID" name="id">
    <small id="reg-id-help" class="form-text text-muted"></small>
  </div>

  <div class="form-group">
    <label for="registeremail">Email address</label>
    <input type="email" class="form-control" id="registeremail" aria-describedby="emailHelp" placeholder="Enter email" name="registeremail">
    <small id="reg-email-help" class="form-text text-muted ">We'll never share your email with anyone else.</small>
  </div>

    <div class="form-group">
    <label for="registeremail">Phone number<span class="star">*</span></label>
    <input type="text" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter phone number  in the formart 07XXXXXXXX" name="phone">
    <small id="reg-phone-help" class="form-text text-muted"></small>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password<span class="star">*</span></label>
    <input type="password" class="form-control" id="regpassword" placeholder="Password" name="regpassword">
     <small id="reg-pwd-help" class="form-text text-muted"></small>
  </div>

    <div class="form-group">
    <label for="exampleInputPassword1"> Confirm Password<span class="star">*</span></label>
    <input type="password" class="form-control" id="conregpassword" placeholder="Password" name="conregpassword">
    <small id="reg-conpwd-help" class="form-text text-muted"></small>
  </div>

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="agreetc" name="agreetc">
    <label class="form-check-label" for="exampleCheck1">I have read and understood the terms and conditions and I agree with them.</label>
  </div>
  <div class="form-control info hide" id="info" >
    
  </div>

  <button type="submit" class="btn btn-primary" id="btnRegister" onclick="return false">Register now</button>
  <a href="login.php">Have an account already?</a>

</form>
	
</div>
	
</div>

	<?php include_once("Includes/footer.php")?>

	<script>
		$(document).ready(function() {
      
			function validateInputs(){
        var register=false;
        var fname=$('#fname').val();
        var lname=$('#lname').val();
        var id=$('#id').val();
        var email=$('#registeremail').val();
        var phone=$('#phone').val();
        var password=$('#regpassword').val();
        var conregpassword=$('#conregpassword').val();

        if (fname=="") {

          $('#reg-fname-help').addClass("text-danger");
          $('#reg-fname-help').text("Please enter your first name");
       
          $('#fname').addClass("border-danger");
          register=false;
        }else{
          $('#reg-fname-help').text("");
          $('#fname').removeClass("border-danger");
          register=true;
        }
        if (lname=="") {
           $('#reg-fname-help').addClass("text-danger");
          $('#reg-lname-help').text("Please enter your last name");
         
          $('#lname').addClass("border-danger");
          register=false;
        }else{
          $('#reg-lname-help').text("");
          $('#lname').removeClass("border-danger");
          register=true;
        }
        if (id=="") {
          $('#id').addClass("border-danger");
           $('#reg-id-help').addClass("text-danger");
          $('#reg-id-help').text("Please enter your ID number");
         
          
          register=false;
        }else{
          $('#reg-id-help').text("");
          $('#id').removeClass("border-danger");
          register=true;
        }

        if (email=="") {
             $('#reg-email-help').addClass("text-danger");
          $('#reg-email-help').text("Please enter your email address");
       
          $('#registeremail').addClass("border-danger");
          register=false;
        }else{
          $('#reg-email-help').text("");
          $('#registeremail').removeClass("border-danger");
          register=true;
        }
         if (phone=="") {
          $('#reg-phone-help').addClass("text-danger");
          $('#reg-phone-help').text("Please enter your phone number");
          
          $('#phone').addClass("border-danger");
          register=false;
        }else if(phone.length<10 || phone.length>10){
          $('#reg-phone-help').addClass("red");
         $('#reg-phone-help').text("Phone number must be 10 digits");
         
          $('#phone').addClass("border-danger");
          register=false;

        }else{
          $('#reg-phone-help').text("");
          $('#phone').removeClass("border-danger");
          register=true;
        }
        $('#reg-pwd-help').addClass("text-danger");
          if (password.length<6 || password !=conregpassword) {
          $('#reg-pwd-help').text("Verrify passwords and try again. Use a minimum of 6 characters");
          
          $('#regpassword').addClass("border-danger");
          register=false;
        }else{
          $('#reg-pwd-help').text("");
          $('#regpassword').removeClass("border-danger");
        //  register=true;
        }
        return register;

      }


      //On clicking the register now button
      $('#btnRegister').click(function(event){
        event.preventDefault();
        if (validateInputs()) {
         // $('#registerForm').reset();
         $("#info").removeClass("text-danger");
         $("#info").addClass("success");
         $("#info").text("Registering...");
         $("#info").fadeIn(600);
        $('#btnRegister').addClass("hide");
        //Details
       // var register=false;
        var fname=$('#fname').val();
        var lname=$('#lname').val();
        var id=$('#id').val();
        var email=$('#registeremail').val();
        var phone=$('#phone').val();
        var password=$('#regpassword').val();
        var conregpassword=$('#conregpassword').val();

        $.ajax({
          type:'post',
          url:'http://localhost/Projects/Rental%20Kenya/Database/operations.php',
          data:{reg:1,fname:fname,lname:lname,id:id,email:email,password:password,phone:phone},
          success:function(response){
        if (response=="DUPLECATE_CREDENTIALS") {
         $("#info").addClass("text-danger");
        // $("#info").addClass("success");
         $("#info").text("The email/ID/phone seems to have been used to register another account!");
         $("#info").fadeIn(600);
          }else if(response=="REGISTERED"){
         $("#info").removeClass("text-danger");
        // $("#info").addClass("success");
         $("#info").text("REGISTRETION SUCCESSFULL! Please wait while we direct you to login page...");
         $("#info").fadeIn(600);

            setTimeout(function () { window.location.href = "login.php";},1000);
            
          }else{
            console.log(response);
            alert(response);
          }
          },
          error: function(response){
            console.log(response);
          }

         });


        }else{
           $("#info").addClass("text-danger");
          $("#info").text("Correct the errors and try again");
          $("#info").fadeIn(600);
        }
      });
		});
	</script>
</body>
</html>