<?php 
include_once('../Classes/landlord.php');
include_once('../Classes/location.php');
include_once('../Classes/house.php');

//Registretion
if (isset($_POST['reg'])) {

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$id=$_POST['id'];
	$password=$_POST['password'];

	$person=new Landlord($fname,$lname,$email,$id,$phone,$password);
	echo $person->registerLandlord();
	exit();
	} 

if(isset($_POST['locations'])){
	$county=$_POST['county'];
	$constituencies=$_POST['constituencies'];
	$warsInTheCounty=$_POST['wardsInTheCounty'];
	//echo Location::addLocation($county, $constituencies, $warsInTheCounty);
	echo "Sorry we are not adding new locations at the moment";
 exit();
}
if (isset($_POST['getCounties'])) {
	echo json_encode(Location::getCounties());
	exit();
}
if (isset($_POST['getConstituencies'])) {
	// data:{getConstituencies:1,getConstCounty:county},
	// url:'http://localhost/Projects/Rental Kenya/Database/operations.php',
	echo  json_encode(Location::getConstituencies($_POST['getConstCounty']));

	exit();
}


if (isset($_POST['getWards'])) {
	# data:{getWards:1,getwardConst:constituency},
	echo json_encode(Location::getWards($_POST['getwardConst']));
		exit();
}

if (isset($_POST['login'])) {
	# code...
	echo Landlord::Login($_POST['LoginEmail'],$_POST['LoginPassword']);
	exit();
}
// data:{addHouse:1,county:county, constituency:constituency,ward:ward,vacancies:vacancies,numRooms:numRooms,numBedRooms:numBedRooms,inHousToilet:inHousToilet,inHouseBathroom:inHouseBathroom,initDep:initDep,rentAmt:rentAmt,pathToPic:"./images/house.png"},
   // data:{addHouse:1,county:county, constituency:constituency,ward:ward,vacancies:vacancies,numRooms:numRooms,numBedRooms:numBedRooms,inHousToilet:inHousToilet,inHouseBathroom:inHouseBathroom,initDep:initDep,rentAmt:rentAmt,pathToPic:"./images/house.png",landmark:landmark,userId:userId},
//function __construct($location,$rentamount,$inhousetoilet,$inhousebathroom,$numrooms,$pathtopic,$vacancies,$numbedrooms,$ownerid,$nearestlandmark,$initialdeposit)
if (isset($_POST['addHouse'])) {
	# code...
	$county_id=Location::getCountyID($_POST['county']);
	$constituency_id=Location::getConstituencyID($_POST['constituency']);
	$ward_id=Location::getWardID($_POST['ward']);
	$rentamount=$_POST['rentAmt'];
	$inhousetoilet=$_POST['inHousToilet'];
	$inhousebathroom=$_POST['inHouseBathroom'];
	$numrooms=$_POST['numRooms'];
	$pathtopic=$_POST['pathToPic'];
	$vacancies=$_POST['vacancies'];
	$numbedrooms=$_POST['numBedRooms'];
	$ownerid=$_POST['userId'];
	$nearestlandmark=$_POST['landmark'];
	$initialdeposit=$_POST['initDep'];
	$house=new House($county_id,$constituency_id,$ward_id,$rentamount,$inhousetoilet,$inhousebathroom,$numrooms,$pathtopic,$vacancies,$numbedrooms,$ownerid,$nearestlandmark,$initialdeposit);
	echo $house->AddHouseRecord();
	exit();
}
 if (isset($_POST['checkSession'])) {
 	if (isset($_SESSION["id"])) {
 		echo '1';
 		exit();
 	}else{
 		echo '0';
 		exit();
 	}

 }
 ?>
