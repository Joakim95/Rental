<?php include_once("Includes/header.php");
session_start();
if (isset($_SESSION["id"])) {
  # code...
   header("Location:landlord-dashboard.php");
}


?>
<body>
	
<center><a href="index.php"><h1 class="brandtitle">KenyaRentals</h1></a></center>

<div class="container">
	<div class="mx-auto form-folder">
<div class="jumbotron">
  <center><h3>Login</h3></center>
  <form>


  <div class="form-group">
    <label for="loginEmail">Email address</label>
    <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp" placeholder="Enter email" name="loginEmail">
    <small id="lgn-emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>



  <div class="form-group">
    <label for="exampleInputPassword1">Password<span class="star">*</span></label>
    <input type="password" class="form-control" id="loginPassword" placeholder="Password" name="loginPassword">
     <small id="loginPasswordCheck" class="form-text text-muted"></small>
  </div>


  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="keepmelogged" name="keepmelogged">
    <label class="form-check-label" for="exampleCheck1">Keep me signed in.</label>
  </div>


  <button type="submit" class="btn btn-primary" id="btnlgn">Login</button>
  <a href="landlord-register.php">Register as a landlord</a>
</form>
  
  
</div>

</div>
	
</div>

	<?php include_once("Includes/footer.php")?>

	<script>
		$(document).ready(function() {
		 $("#btnlgn").click(function(event){
      event.preventDefault();
      var email=$("#loginEmail").val();
      var password=$("#loginPassword").val();
      var login=false;

       if (email=="") {
        $("#loginEmail").addClass('border-danger');
        $("#lgn-emailHelp").text("Please Enter your email address");
        login=false;
       }else{
         $("#loginEmail").removeClass('border-danger');
        $("#lgn-emailHelp").text("");
        login=true;
       }
       if (password=="") {
          $("#loginPassword").addClass('border-danger');
          $("#loginPasswordCheck").text("Please enter password");
          $("#loginPasswordCheck").show();
          login=false;
       }else{
          $("#loginPassword").removeClass('border-danger');
          $("#loginPasswordCheck").text("");
          $("#loginPasswordCheck").hide();
         // login=false;

       }
       if (login) {
    $.ajax({
    type:'POST',
      url:'http://localhost/Projects/Rental Kenya/Database/operations.php',
    data:{login:1,LoginEmail:email,LoginPassword:password},
    success:function(data){
     // alert(data);
     if (data=="USER_NOT_REGISTERED") {
      $("#lgn-emailHelp").text(data);
      $("#lgn-emailHelp").show();
     }else if (data=="INCORECT_PASSWORD") {
      $("#loginPasswordCheck").text(data);
      $("#loginPasswordCheck").show();
     }else if(data=="SUCCESS"){
     // window.location="landlord-dashboard.php";
      setTimeout(function () { window.location.href = "landlord-dashboard.php";},1000);
     }else{
      alert("Unknown response!");
      console.log(data);
     }

    },
    error:function (data) {
     alert("Error! see console");
     console.log(data);
    }

  });
       }
     });
		});
	</script>
</body>
</html>