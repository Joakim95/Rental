<?php include_once("Includes/header.php")?>
<body>
	
<center><a href="index.php"><h1 class="brandtitle">KenyaRentals</h1></a></center>

<div class="container">

<h1>House booking Page</h1>

<form>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Search...">
    </div>
    <div class="col">
     <select class="form-control" id="findby">
     	<option value="">Find by</option>
     	<option value="findbylocation">Location</option>
     	<option value="findbyprice">Prices</option>
     </select>
    </div>

<div class="container">
	  

  <div class="row hide" id="locationFilter">
    <center><label>Selct the location you want to find a house</label></center>
  	<div class="col-sm-4">
  		<label>County</label>
  		<select class="form-control" id="counties-select">
  		</select>
  	</div>

  	  	<div class="col-sm-4">
  		<label> Subcounty</label>
  		<select class="form-control" id="constituencies-select">
        <option value="">Please select county first</option>
  		</select>
    	</div>

  	  	<div class="col-sm-4">
  		<label>Ward</label>
  		<select class="form-control" id="Ward-select">
        <option value="">Please select subcounty first</option>
  		</select>
  	</div>
  	
  </div>
  
  <div class="row hide" id="priceFilter">
    <center><label>How much are you looking for a house at?</label></center>
  	<div class="col">
  		<label>Minimun Price</label>
  		<input type="number" name="" class="form-control" min="1">
  		
  	</div>
  	  	<div class="col">
  		<label>Maximum Price</label>
  		<input type="number" name="" class="form-control" min="1">
  		
  	</div>
  </div>
  </div>




</div>
</form>
<h1>House available for renting</h1>
<div style="padding-bottom: 20px">
	<div class="row house" style="background-color: gray; margin-top: 25px;">
		<div class="col housedetails" style="min-width: 300px;">
			<img src="pexels-photo-1838065.jpeg" alt="[]" width="100%" height="100%">
			
		</div>
		<div class="col housedetails">

			<h3>House Details</h3>
			<b>Location :</b><span class="rght">Kisumu, Nyando, Ahero</span><br>
			<b>Number of rooms :</b><span class="rght">4</span><br>
			<b>Bedrooms :</b><span class="rght">2</span><br>
			<b>Inhouse Toilet :</b><span class="rght">Yes</span><br>
			<b>Inhouse Bathroom :</b><span class="rght">Yes</span><br>
			<b>Number of houses vacant :</b><span class="rght">5</span>
			<h3>Rent amount: <span class="rght">3500</span></h3>
			<center><button>Book</button></center>

		</div>

			<div class="col housedetails">
			<h3>Landlord details</h3>
			<b>Phone :</b>0717474676<br>
			<b>Email :</b><a href="mailto:princejoachime@gmail.com">princejoachime@gmail.com</a><br>
			

		</div>

	</div>

		<div class="row house" style="background-color: gray; margin-top: 25px;">
		<div class="col housedetails" style="min-width: 300px;">
			<img src="pexels-photo-1838065.jpeg" alt="[]" width="100%" height="100%">
			
		</div>
		<div class="col housedetails">

			<h3>House Details</h3>
			<b>Location :</b><span class="rght">Kisumu, Nyando, Ahero</span><br>
			<b>Number of rooms :</b><span class="rght">4</span><br>
			<b>Bedrooms :</b><span class="rght">2</span><br>
			<b>Inhouse Toilet :</b><span class="rght">Yes</span><br>
			<b>Inhouse Bathroom :</b><span class="rght">Yes</span><br>
			<b>Number of houses vacant :</b><span class="rght">5</span>
			<h3>Rent amount: <span class="rght">3500</span></h3>
			<center><button>Book</button></center>

		</div>

			<div class="col housedetails">
			<h3>Landlord details</h3>
			<b>Phone :</b>0717474676<br>
			<b>Email :</b><a href="mailto:princejoachime@gmail.com">princejoachime@gmail.com</a><br>
			

		</div>

	</div>

</div>
</div>

	<?php include_once("Includes/footer.php")?>

	<script>
		$(document).ready(function() {
			//alert("");

      $("#findby").change(function(){
        var findby=$("#findby").val();
        if (findby=="findbylocation") {
          $("#priceFilter").fadeOut(300);
          $("#locationFilter").fadeIn(300);
        }else if (findby=="findbyprice") {
          $("#locationFilter").fadeOut(300);
           $("#priceFilter").fadeIn(300);
          
        }else{}
      });
      fetchCounties();




    function fetchCounties(){
     $.ajax({
    type:'POST',
    url:'http://localhost/Projects/Rental%20Kenya/Database/operations.php',
    data:{getCounties:1},
    success:function(data){
     // alert(data);
      //F:\Xampp\htdocs\Projects\Rental Kenya\Database\operations.php
    var counties=JSON.parse(data);
    $("#counties-select").empty();
    $("#counties-select").append("<option value=''>...</option>");
    for(var i=0;i<counties.length;i++){
       $("#counties-select").append("<option value='"+counties[i].name+"'>"+counties[i].name+"</option>");
    }
    },
    error:function (data) {
     alert("Error logged into console");
     console.log(data);
    }

  });
      }
      //Fetch costituencies
    function fetchConstituencies(county){
     $.ajax({
    type:'POST',
       url:'http://localhost/Projects/Rental%20Kenya/Database/operations.php',
    data:{getConstituencies:1,getConstCounty:county},
    success:function(data){
     var constituencies=JSON.parse(data);
    $("#constituencies-select").empty();
    $("#constituencies-select").append("<option value=''>...</option>");
    for(var i=0;i<constituencies.length;i++){
       $("#constituencies-select").append("<option value='"+constituencies[i].name+"'>"+constituencies[i].name+"</option>");
    }
    },
    error:function (data) {
     alert("Error! see console");
     console.log(data);
    }

  });
      }

          function fetchWards(constituency){
     $.ajax({
    type:'POST',
     url:'http://localhost/Projects/Rental%20Kenya/Database/operations.php',
    data:{getWards:1,getwardConst:constituency},
    success:function(data){
     var Wards=JSON.parse(data);
    $("#Ward-select").empty();
    $("#Ward-select").append("<option value=''>...</option>");
    for(var i=0;i<Wards.length;i++){
       $("#Ward-select").append("<option value='"+Wards[i].name+"'>"+Wards[i].name+"</option>");
    }
    },
    error:function (data) {
     alert("Error! see console");
     console.log(data);
    }

  });
      }
//Get Constituencies
$("#counties-select").change(function(event){
event.preventDefault();
var countySelected=$("#counties-select").val();
if (countySelected=="") {
      $("#constituencies-select").empty();
    $("#constituencies-select").append("<option value=''>Please Select county first</option>");
       $("#Ward-select").empty();
    $("#Ward-select").append("<option value=''>Please select subcounty first</option>");
}else{
  fetchConstituencies(countySelected);
    $("#Ward-select").empty();
    $("#Ward-select").append("<option value=''>Please select subcounty first</option>");
}
});

  //Get Wards
$("#constituencies-select").change(function(event){
event.preventDefault();
var costSelected=$('#constituencies-select').val();
if (costSelected=="") {
    $("#Ward-select").empty();
    $("#Ward-select").append("<option value=''>Please select subcounty first</option>");
}else{
  fetchWards(costSelected);
}
});


      //End of script''''''
		});
	</script>
</body>
</html>