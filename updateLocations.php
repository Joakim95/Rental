<?php include_once("Includes/header.php")?>
<body>
	
<center><a href="index.php"><h1 class="brandtitle">KenyaRentals</h1></a></center>

<div class="container">
  <div class="jumbotron">
<div class="mx-auto form-folder">


  <form >
<div class="form-group">
  <input type="text" name="county" placeholder="Enter county name" id="county" class="form-control">
</div>

<div class="form-group">
  <textarea class="form-control" placeholder="Enter constituencies separated by commas" name="constituencies" id="constituencies"></textarea>
  
</div>

<div class="dynamic">
  
</div>
<button type="submit" class="btn btn-primary hide" id="submitEntry">Submit</button>
</form>
</div>
	
</div>
	
</div>

	<?php include_once("Includes/footer.php")?>

	<script>
		$(document).ready(function() {
	$("#constituencies").focusout(function(){
  
    if ($("#constituencies").val()!="" && $("#county").val()!="") {
      $(".dynamic").empty();
      var constituencies=$("#constituencies").val().split(",");
      //alert(constituencies.length);
      for(var i=0; i<constituencies.length;i++){
         $(".dynamic").append('<div class="form-group"><label><b>'+constituencies[i]+'</b></label><textarea class="form-control '+constituencies[i].replace(/\s/g, "")+'" placeholder="Enter wards separated by commas"></textarea></div>');
      }
     
     $("#submitEntry").fadeIn(300);
    }


//Manage adding of details now
   $("#submitEntry").click(function(event){
    event.preventDefault();
    //alert("iuhuh");
   var constituencies=$("#constituencies").val().split(",");
   var wardsInTheCounty="";
    for(var i=0; i<constituencies.length;i++){
     var cl="."+constituencies[i].replace(/\s/g, "")+"";
     var value=$(cl).val();
     wardsInTheCounty=wardsInTheCounty+value+"|";
    }
  

  $.ajax({
    type:'POST',
    url:'http://127.0.0.1/Projects/Rental%20Kenya/Database/operations.php',
    data:{locations:1,county:$('#county').val(),constituencies:constituencies,wardsInTheCounty:wardsInTheCounty},
    success:function(data){
      alert(data);
    },
    error:function (data) {
     alert("Error! see console");
     console.log(data);
    }

  });
   });
  });


		});
	</script>
</body>
</html>
