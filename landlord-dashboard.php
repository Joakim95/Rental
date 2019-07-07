<?php include_once("Includes/header.php");
//include_once('Classes/landlord.php');
session_start();
if (!isset($_SESSION["id"]) || !isset($_SESSION["email"]) ) {
 header("Location:login.php");
 
}

?>

<body>
	
<center><a href="index.php"><h1 class="brandtitle">KenyaRentals</h1></a></center>

<div class="container">
<div class="row" style="margin-bottom: 10px;">
  <h1>Landlord Dashboard</h1>

  <div class="col " >
    <div class="adminpic"> <img src="pexels-photo-1619311.jpeg" width="100%" height="100%"></div>
 
  
</div>
</div>
</div>


<nav class="nav nav-pills" style="width: 100%; background-color: gray;">
  <a class="nav-item nav-link" href="#">Edit profile</a>

  <a class="nav-link" href="#">Add new records</a>
  <a class="nav-item nav-link" href="#">Update House Records</a>
   <a class="nav-item nav-link" href="#contactus">Contact RentalKenya</a>
  <a class="nav-link" href="#">View bookings</a>
  <a class="nav-item nav-link" href="logout.php" style="float: right;"><button class="btn-lgn">Logout</button></a>
 
</nav>

<div class="container">
  
<div class="mx-auto">
    <h2>Peersonal Information</h2>
  <div class="row">
    <div class="col-6">
      <label>Name:</label><span class="rght">Joakim Adeny</span><br>
      <label>Email:</label><span class="rght">princejoachime@gmail.com</span><br>
      <label>Phone:</label><span class="rght">0717474676</span><br>
      <label>ID number:</label><span class="rght">7777777</span>
    </div>
  </div>
    <h2>Rental house Uploaded</h2>

    <div class="row">
      <div class="col-6">
        <div style="height:350px;" >
          <img src="pexels-photo-1619311.jpeg" width="100%" height="100%">
          
        </div>
        <label><b>Edit Details</b></label>
        <form>
          <label><b>Number of rooms:</b></label><span class="rght">5&nbsp;<button>Edit</button></span>
          <input type="number" name="edit-rooms" min="1" class="form-control">
         <label><b>Number of bedrooms:</b></label><span class="rght">5&nbsp;<button>Edit</button></span>
          <input type="number" name="edit-rooms" min="1" class="form-control">
          <label><b>Inhouse batheroom:</b></label> <span class="rght">Yes&nbsp;<button>Edit</button></span>
          <select class="form-control">
            <option>...</option>
            <option>Yes</option>
            <option>No</option>
          </select>
          <label><b>Inhouse toilet:</b></label> <span class="rght">Yes&nbsp;<button>Edit</button></span>
          <select class="form-control">
            <option>...</option>
            <option>Yes</option>
            <option>No</option>
          </select>

          <label><b>Location:</b></label> <span class="rght">Kisumu, Nyando, Ahero&nbsp;<button>Edit</button></span>
            <div class="row">
    <div class="col">
      <label>County</label>
      <select class="form-control">
      <option>Kisumu</option>
      <option>Nairobi</option>
      <option>Mombasa</option>
      <option>Nakuru</option>
      <option>Eldoret</option>
      </select>
    </div>

        <div class="col">
      <label> Subcounty</label>
      <select class="form-control">
      <option>Nyando</option>
      <option>Nyakach</option>
      <option>Kisumu East</option>
      <option>Kisumu West</option>
      <option>Seme</option>
      </select>
    </div>

        <div class="col">
      <label>Ward</label>
      <select class="form-control">
      <option>Ahero</option>
      <option>Kobura</option>
      <option>Ogenya</option>
      <option>Magina</option>
      <option>Korowe</option>
      </select>
    </div>

  </div>

         <label><b>Vacancies available:</b></label><span class="rght">5&nbsp;<button>Edit</button></span>
          <input type="number" name="edit-rooms" min="1" class="form-control">

          <label><b>Price:</b></label><span class="rght">1500&nbsp;<button>Edit</button></span>
          <input type="number" name="edit-rooms" min="1" class="form-control">
        </form>
      </div>
      
    </div>
  
</div>
<div class="mx-auto" style="width: 75%;">
  <h2>Add new house records</h2>
  <form onsubmit="return false">
      <div class="form-group">
    <label for="registeremail">Location</label>
                <div class="row">
    <div class="col">
      <label>County</label>
      <select class="form-control" id="addHouseCounty">
      </select>
      <small class="form-text text-muted red" id="addHouseCountyCheck"></small>
    </div>

        <div class="col">
      <label> Subcounty</label>
      <select class="form-control" id="addHouseConst">
      <option value="">Please Select County first</option>
      </select>
        <small class="form-text text-muted red" id="addHouseConstCheck"></small>
    </div>

        <div class="col">
      <label>Ward</label>
      <select class="form-control" id="addHouseWard">
      <option value="">Please select sub-county first</option>

      </select>
        <small class="form-text text-muted red" id="addHouseWardCheck"></small>
    </div>
    <div class="form-group">
      <label>Nearest landmark<span class="star">*</span></label>
      <input type="text" class="form-control" id="addHouseLandMark" placeholder="Add nearest landmark">
      <small class="form-text text-muted" id="addHouseLandMarkCheck"></small>
      
    </div>

  </div>
    <small id="lgn-emailHelp" class="form-text text-muted"></small>
  </div>
     <div class="form-group">
    <label >Vacansies Available<span class="star">*</span></label>
    <input type="number" class="form-control" aria-describedby="emailHelp" id="addHouseVac" placeholder="Enter number of Vacansies">
    <small id="addHouseVacCheck" class="form-text text-muted"></small>
  </div>
    <div class="form-group">
    <label>Number of rooms<span class="star">*</span></label>
    <input type="number" class="form-control" id="addHouseNumRooms" aria-describedby="emailHelp" placeholder="Enter number of rooms">
    <small id="addHouseNumRoomsCheck" class="form-text text-muted"></small>
  </div>

      <div class="form-group">
    <label >Number of bed rooms<span class="star">*</span></label>
    <input type="number" min="1"  class="form-control" id="addHouseNumBedRooms" aria-describedby="emailHelp" placeholder="Enter number of rooms">
    <small id="addHouseNumBedRoomsCheck" class="form-text text-muted"></small>
  </div>

  <div class="form-group">
    <label>In-house toilet</label>
    <select class="form-control" id="addHouseToilet">
      <option value="">...</option>
      <option value="1">Yes</option>
      <option value="0">No</option>
    </select>
    <small class="form-text text-muted" id="addHouseToiletCheck"></small>
  </div>

    <div class="form-group">
    <label>In-house bathroom</label>
    <select class="form-control" id="addHouseBathroom">
      <option value="">...</option>
      <option value="1">Yes</option>
      <option value="0">No</option>
    </select>
    <small class="form-text text-muted" id="addHouseBathroomCheck"></small>
  </div>

      <div class="form-group">
    <label>Initil deposit</label>
    <select class="form-control" id="addHouseInitDep">
      <option value="">...</option>
      <option value="1">Yes</option>
      <option value="0">No</option>
    </select>
    <small class="form-text text-muted" id="addHouseInitDepCheck"></small>
  </div>

  <div class="form-group">
    <label>Rent Amount<span class="star">*</span></label>
    <input type="number" min="1" max="1000000" class="form-control" id="addHouseRentAmt" aria-describedby="emailHelp" placeholder="Enter rent amout">
    <small id="addHouseRentAmtCheck" class="form-text text-muted"></small>
  </div>

  <div class="form-group">
    <label>Select an Image of the house</label>
    <input type="file" id="addHouseImage" class="form-control">
    <small class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <center><button class="btn btn-primary" id="addHouseBtn">Add Record</button></center>
  </div>


  </form>
</div>
    
</div>

	<?php include_once("Includes/footer.php")?>

	<script>
    //Get counties
    function fetchCounties(){
     $.ajax({
    type:'POST',
    url:'http://localhost/Projects/Rental%20Kenya/Database/operations.php',
    data:{getCounties:1},
    success:function(data){
    var counties=JSON.parse(data);
    $("#addHouseCounty").empty();
    for(var i=0;i<counties.length;i++){
       $("#addHouseCounty").append("<option value='"+counties[i].name+"'>"+counties[i].name+"</option>");
    }
    },
    error:function (data) {
     alert("Error logged into console");
     console.log(data);
    }

  });
      }

//Constituencies
     function fetchConstituencies(county){
     $.ajax({
    type:'POST',
       url:'http://localhost/Projects/Rental%20Kenya/Database/operations.php',
    data:{getConstituencies:1,getConstCounty:county},
    success:function(data){
     var constituencies=JSON.parse(data);
    $("#addHouseConst").empty();
    for(var i=0;i<constituencies.length;i++){
       $("#addHouseConst").append("<option value='"+constituencies[i].name+"'>"+constituencies[i].name+"</option>");
    }
    },
    error:function (data) {
     alert("Error! see console");
     console.log(data);
    }

  });
      }
      //wards
     function fetchWards(constituency){
     $.ajax({
    type:'POST',
     url:'http://localhost/Projects/Rental%20Kenya/Database/operations.php',
    data:{getWards:1,getwardConst:constituency},
    success:function(data){
     var Wards=JSON.parse(data);
    $("#addHouseWard").empty();
    for(var i=0;i<Wards.length;i++){
       $("#addHouseWard").append("<option value='"+Wards[i].name+"'>"+Wards[i].name+"</option>");
    }
    },
    error:function (data) {
     alert("Error! see console");
     console.log(data);
    }

  });
      }

		$(document).ready(function() {


      fetchCounties();

      
			//On county Selection
         $("#addHouseCounty").change(function(){
        if ($("#addHouseCounty").value=="") {
          $("#addHouseConst").empty();
          $("#addHouseWard").empty();
          $("#addHouseConst").append("<option value=''>Please choose county first</option>");
          $("#addHouseWard").append("<option value=''>Please choose constituency first</option>");
        }else{
          fetchConstituencies($("#addHouseCounty").val());
           $("#addHouseWard").empty();
              $("#addHouseWard").append("<option value=''>Please choose constituency first</option>");
        }
      });
    //On Constituency selection
          $("#addHouseConst").change(function(){
        if ($("#addHouseConst").value=="") {
          $("#addHouseWard").empty();
          $("#addHouseWard").append("<option value=''>Please choose constituency first</option>");
        }else{
          fetchWards($("#addHouseConst").val());
        }
      });
          //Check if image if of good extension
          function checkImageType(file){
            var extension=file.substr((file,lastIndexOf('.')+1));
            if (extension==='jpg' || extension==='jpeg' || extension==='png') {return true;}else{return false;}
          }

          $("#addHouseImage").change(function(event){
            var fileId=event.target.id;
            var fileNameArr=new Array();
            var pathToUrl='./images/';
            for(var i=0; i<$("#"+fileId).prop("files").length;i++){
              var formData=new FormData();
              var fileData=$("#"+fileId).prop("files")[i];
              fileData.append()
            }
          });
      //On click 
     // alert('<%=Session["id"] %>');

      $("#addHouseBtn").click(function(event){
        event.preventDefault();
       // alert($("#addHouseImage").val());
        var county=$("#addHouseCounty").val();
        var constituency=$("#addHouseConst").val();
        var ward=$("#addHouseWard").val();
        var vacancies=$("#addHouseVac").val();
        var numRooms=$("#addHouseNumRooms").val();
        var numBedRooms=$("#addHouseNumRooms").val();
        var inHousToilet=$("#addHouseToilet").val();
        var inHouseBathroom=$("#addHouseBathroom").val();
        var initDep=$("#addHouseInitDep").val();
        var rentAmt=$("#addHouseRentAmt").val();
        var landmark=$("#addHouseLandMark").val();
        var addHouse=false;
        var userId=<?php echo $_SESSION["id"];?>;
        //Validate county
        if (county=="") {
          $("#addHouseCounty").addClass('border-danger');
          $("#addHouseCountyCheck").text("Please select county");
          $("#addHouseCountyCheck").show();
          addHouse=false;
        }else{
          $("#addHouseCounty").removeClass('border-danger');
          $("#addHouseCountyCheck").text("");
          $("#addHouseCountyCheck").hide();
          addHouse=true;
        }
        //Validate consitituency
               if (constituency=="") {
          $("#addHouseConst").addClass('border-danger');
          $("#addHouseConstCheck").text("Please select sub-county");
          $("#addHouseConstCheck").show();
          addHouse=false;
        }else{
          $("#addHouseConst").removeClass('border-danger');
          $("#addHouseConstCheck").text("");
          $("#addHouseConstCheck").hide();
          addHouse=true;
        }
        //validate ward
        if (constituency=="") {
          $("#addHouseWard").addClass('border-danger');
          $("#addHouseWardCheck").text("Please select ward");
          $("#addHouseWardCheck").show();
          addHouse=false;
        }else{
          $("#addHouseWard").removeClass('border-danger');
          $("#addHouseWardCheck").text("");
          $("#addHouseWardCheck").hide();
          addHouse=true;
        }
        if (landmark=="") {
          $("#addHouseLandMark").addClass('border-danger');
          $("#addHouseLandMarkCheck").text('Please input nearest landmark');
           $("#addHouseLandMarkCheck").show();
           addHouse=false;
        }else{
           $("#addHouseLandMark").removeClass('border-danger');
           $("#addHouseLandMarkCheck").text("");
            $("#addHouseLandMarkCheck").hide();
            addHouse=true;
        }
        //Validate vacancies
          if (vacancies=="") {
          $("#addHouseVac").addClass('border-danger');
          $("#addHouseVacCheck").text("Please add number of vacancies");
          $("#addHouseVacCheck").show();
          addHouse=false;
        }else{
          $("#addHouseVac").removeClass('border-danger');
          $("#addHouseVacCheck").text("");
          $("#addHouseVacCheck").hide();
          addHouse=true;
        }
        //Validate number of rooms
                if (numRooms=="") {
          $("#addHouseNumRooms").addClass('border-danger');
          $("#addHouseNumRoomsCheck").text("Please add number of rooms");
          $("#addHouseNumRoomsCheck").show();
          addHouse=false;
        }else{
          $("#addHouseNumRooms").removeClass('border-danger');
          $("#addHouseNumRoomsCheck").text("");
          $("#addHouseNumRoomsCheck").hide();
          addHouse=true;
        }
        //Validating Number of bed rooms
           if (numBedRooms=="") {
          $("#addHouseNumBedRooms").addClass('border-danger');
          $("#addHouseNumBedRoomsCheck").text("Please add number of bed rooms");
          $("#addHouseNumBedRoomsCheck").show();
          addHouse=false;
        }else{
          $("#addHouseNumBedRooms").removeClass('border-danger');
          $("#addHouseNumBedRoomsCheck").text("");
          $("#addHouseNumBedRoomsCheck").hide();
          addHouse=true;
        }
        //Validating In-house Toilet
           if (inHousToilet=="") {
          $("#addHouseToilet").addClass('border-danger');
          $("#addHouseToiletCheck").text("This field can not be empty");
          $("#addHouseToiletCheck").show();
          addHouse=false;
        }else{
          $("#addHouseToilet").removeClass('border-danger');
          $("#addHouseToiletCheck").text("");
          $("#addHouseToiletCheck").hide();
          addHouse=true;
        }
        //Validate inhouse bathroom
         if (inHouseBathroom=="") {
          $("#addHouseBathroom").addClass('border-danger');
          $("#addHouseBathroomCheck").text("This field can not be empty");
          $("#addHouseBathroomCheck").show();
          addHouse=false;
        }else{
          $("#inHouseBathroom").removeClass('border-danger');
          $("#addHouseBathroomCheck").text("");
          $("#addHouseBathroomCheck").hide();
          addHouse=true;
        }
        //Validate Initial deposit
           if (initDep=="") {
          $("#addHouseInitDep").addClass('border-danger');
          $("#addHouseInitDepCheck").text("Please specify this field");
          $("#addHouseInitDepCheck").show();
          addHouse=false;
        }else{
          $("#addHouseInitDep").removeClass('border-danger');
          $("#addHouseInitDepCheck").text("");
          $("#addHouseInitDepCheck").hide();
          addHouse=true;
        }
        //Validating rent amount
         if (rentAmt=="") {
          $("#addHouseRentAmt").addClass('border-danger');
          $("#addHouseRentAmtCheck").text("Rent amount can not be empty");
          $("#addHouseRentAmtCheck").show();
          addHouse=false;
        }else if(rentAmt<1){
        $("#addHouseRentAmt").addClass('border-danger');
          $("#addHouseRentAmtCheck").text("Please Enter a valid amount for rent");
          $("#addHouseRentAmtCheck").show();
          addHouse=false;
        }
        else{
          $("#addHouseToilet").removeClass('border-danger');
          $("#addHouseRentAmtCheck").text("");
          $("#addHouseRentAmtCheck").hide();
          addHouse=true;
        }
        //Validate Landmark
        //Add house if evaerything is okay
        if (addHouse) {
     $.ajax({
    type:'POST',
     url:'http://localhost/Projects/Rental%20Kenya/Database/operations.php',
    data:{addHouse:1,county:county, constituency:constituency,ward:ward,vacancies:vacancies,numRooms:numRooms,numBedRooms:numBedRooms,inHousToilet:inHousToilet,inHouseBathroom:inHouseBathroom,initDep:initDep,rentAmt:rentAmt,pathToPic:"./images/house.png",landmark:landmark,userId:userId},
    success:function(data){

      alert(data);
    },
    error:function (data) {
     alert("Error! see console");
     console.log(data);
    }

  });
        }

      });



		});//End of script
	</script>
</body>
</html>