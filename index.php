<?php include_once("Includes/header.php")?>
<body>

<!--<center><h1 class="brandtitle">Welcome to KenyaRentals</h1></center>
<div class="topcontainer" style="background-image: url('pexels-photo-1619311.jpeg'); ">
<nav class="nav nav-pills" style="width: 100%;">
  <a class="nav-item nav-link" href="house-booking.php">Houses for renting</a>
  <a class="nav-item nav-link" href="#">About Us</a>
   <a class="nav-item nav-link" href="#contactus">Contact Us</a>

  <a class="nav-link" href="#clientfeedback">Our Happy Clients</a>
    <a class="nav-item nav-link" href="landlord-register.php" style="float: right;"><button class="btn-reg">Register as landlord </button></a>
    <a class="nav-item nav-link" href="login.php" style="float: right;"><button class="btn-lgn">Login</button></a>





<center><div style="color: white;"><p><q>Best conection for rental houses all over the nation. No more being desperate kutafta nyumba</q></p></div></center>
</div>-->

<!--Large Screens-->

<nav class="nav nav-pills flex-column flex-sm-row" id="largeScreenNav">
  <a class="flex-sm-fill text-sm-center nav-link active" href="#"><h1>KenyaRentals</h1></a>
  <a class="flex-sm-fill text-sm-center nav-link" href="house-booking.php">Find a House</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="login.php">Login</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="landlord-register.php">Register</a>
    <a class="flex-sm-fill text-sm-center nav-link" href="#">Contact us</a>
      <a class="flex-sm-fill text-sm-center nav-link" href="#">Our Happy Clients</a>
        <a class="flex-sm-fill text-sm-center nav-link" href="#">About us</a>
</nav>
    <!--Small Screen-->
 
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="smallScreenNav">
  <a class="navbar-brand" href="#"><h1>KenyaRentals</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item navLi">
        <a class="nav-link" href="house-booking.php">Find a House</a>
      </li>
      <li class="nav-item navLi">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item navLi">
        <a class="nav-link" href="landlord-register.php">Register</a>
      </li>
       <li class="nav-item navLi">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
        <li class="nav-item navLi">
        <a class="nav-link" href="#">About Us</a>
      </li>
            <li class="nav-item navLi">
        <a class="nav-link" href="#">Our Happy Clients</a>
      </li>
    </ul>
  </div>
</nav>

<div class="topImage">
<div class="imageDivButtonHolder"><center>
	<button>Prev</button>
	<button>1</button>
	<button>2</button>
	<button>3</button>
	<button>Next</button>
</center></div>
	
</div>
<div class="container" style="margin-top: 25px;padding-right: 10px;">
	<center><h2>Our Best</h2></center>
	<div class="row">
		<div class="col">
			<img src="./images/500_F_120649007_jFpvow7jjNpPxnGCabOJdDtXX7By8gQi.jpg" alt="Image">
		</div>
			<div class="col">
		<h3>Information</h3>
		<p>Understanding the grid classes ( col-sm-# and col-lg-# ) in Bootstrap 3. ... Here you have a very good tutorial, that explains, how to use the new grid classes in Bootstrap 3. It also covers mixins etc. share | improve this answer. edited Jun 24 '15 at 9:18. trejder. 8,980 19 93 185.</p>
		<center><button>Book</button></center>
	</div>
	</div>
	
</div>

<div class="container" id="clientfeedback">
	<center><h2 style="color: #4198B5;">Our happy clients</h2></center>
	<div class="row">
		<div class="col client">
			<label><b>Joakim Adeny</b></label>
			<p>
				Kenya rentals helped me find a good house when I was strunded and I needed to get a place for my attachment 
			</p>
		</div>

				<div class="col client">
			<label><b>Zack Ogoma</b></label>
			<p>
				An akia pingo Kenya Rentals. Hawa watu walinisaidia sana.
			</p>
		</div>
		
	</div>
	
</div>

	<div class="container">
		
		
	</div>




<?php include_once("Includes/footer.php")?>

	<script>
		function shiftNav(width){
			if (width>950) {
				$("#smallScreenNav").hide();
				$("#largeScreenNav").show();
			}else{
				$("#smallScreenNav").show();
				$("#largeScreenNav").hide();
			}
		}
		//On screen adjust
		$(window).resize(function() {
			shiftNav($(window).width());  
		});
		//On complete load
		$(document).ready(function() {
		shiftNav($(window).width());
		});
	</script>

</body>
</html>