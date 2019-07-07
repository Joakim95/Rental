<?php
include_once '../Database/dbcon.php';
Class Location{
	public static function addLocation($county, $constituencies, $warsInTheCounty){
		//Add county to database
		if(!Location::recordAdded("counties",$county)){
			Location::addCounty($county);
		}else{
			echo "ATEMPTING_TO_ADD_ALREADY_EXISTING_RECORD ".$county;
		}
		//Array of words in each constituency
		$countyWardsArray=explode("|",$warsInTheCounty);
		$i=0;
		while($i<sizeof($constituencies)){
			//Get the constituency
			$constituency=$constituencies[$i]; 
			//Add the constituency to database
			if(!Location::recordAdded("constituencies",$constituency)){
			Location::addConstituency(Location::getCountyID($county),$constituency);
			}else{
			echo "ATEMPTING_TO_ADD_ALREADY_EXISTING_RECORD ".$constituency;
			}
			//Array of wards in this constituency			
			$wordsInConstituency=explode(",", $countyWardsArray[$i]);
			$j=0;
			while($j <sizeof($wordsInConstituency)) { 
					$ward=$wordsInConstituency[$j];
					//Add the ward now
					if(!Location::recordAdded("wards",$ward)){
					Location::addWard(Location::getCountyID($county),Location::getConstituencyID($constituency),$ward);
					}else{
					echo "ATEMPTING_TO_ADD_ALREADY_EXISTING_RECORD ".$ward;
					}
					$j++;
			}
			$i++;
		}
		return "ADDED";

	}
	private static function addCounty($county){
		$conn=DBcon::connect();
		$sql=$conn->prepare("INSERT into counties(name) Values(:county)");
		$sql->bindParam(':county',$county);
		$sql->execute();
		$conn=null;
	}
	private static function addConstituency($county_id,$constituency){
		$conn=DBcon::connect();
		$sql=$conn->prepare("INSERT INTO `constituencies`(`county_id`, `name`) VALUES (:county_id,:name)");
		$sql->bindParam(':county_id',$county_id);
		$sql->bindParam(':name',$constituency);
		$sql->execute();
		$conn=null;
	}
		private static function addWard($county_id,$constituency_id,$ward){
		$conn=DBcon::connect();
		$sql=$conn->prepare("INSERT INTO `wards`( `county_id`, `constituency_id`, `name`) VALUES (:county_id,:constituency_id,:ward)");
		$sql->bindParam(':county_id',$county_id);
		$sql->bindParam(':constituency_id',$constituency_id);
		$sql->bindParam(':ward',$ward);
		$sql->execute();
		$conn=null;

	}
	public static function getCountyID($county){
		$conn=DBcon::connect();
		$sql=$conn->prepare("SELECT * from counties where name=:county");
		$sql->bindParam(':county',$county);
		$sql->execute();
		$row=$sql->fetch(PDO::FETCH_ASSOC);
		return $row['id'];
		$conn=null;
	}
	public static function getConstituencyID($constituency){
		$conn=DBcon::connect();
		$sql=$conn->prepare("SELECT * from constituencies where name=:constituency");
		$sql->bindParam(':constituency',$constituency);
		$sql->execute();
		$row=$sql->fetch(PDO::FETCH_ASSOC);
		return $row['id'];

		$conn=null;

	}
		public static function getWardID($ward){
		$conn=DBcon::connect();
		$sql=$conn->prepare("SELECT * from wards where name=:ward");
		$sql->bindParam(':ward',$ward);
		$sql->execute();
		$row=$sql->fetch(PDO::FETCH_ASSOC);
		return $row['id'];

		$conn=null;

	}
	private static function recordAdded($table,$name){
		$conn=DBcon::connect();

		
		if($table=="counties"){
			$sql=$conn->prepare("SELECT * FROM counties where name=:name");
		}else if($table=="constituencies"){
			$sql=$conn->prepare("SELECT * FROM constituencies where name=:name");
		}else if ($table=="wards"){
			$sql=$conn->prepare("SELECT * FROM wards where name=:name");
		}else{
			echo "UNKNOWN_TABLE";
		}
		$sql->bindParam(':name',$name);
		$sql->execute();
		if ($sql->rowCount()>0) {
			return true;
		} else {
			return false;
		}
	}

public static function getCounties(){
		$conn=DBcon::connect();
		$sql=$conn->prepare("SELECT * from counties");
		$sql->execute();
		$rows = array();
		while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
			array_push($rows, $row);
		}
		return $rows;

		$conn=null;

}

public static function getConstituencies($county){
		$county_id=Location::getCountyID($county);
		$conn=DBcon::connect();
		$sql=$conn->prepare("SELECT * from constituencies where county_id=:county_id");
		$sql->bindParam(':county_id',$county_id);
		$sql->execute();
		$rows = array();
		while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
			array_push($rows, $row);
		}
		return $rows;

		$conn=null;

}
public static function getWards($constituency){
	$constituency_id=Location::getConstituencyID($constituency);

		$conn=DBcon::connect();
		$sql=$conn->prepare("SELECT * from wards where constituency_id=:constituency_id");
		$sql->bindParam(':constituency_id',$constituency_id);
		$sql->execute();
		$rows = array();
		while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
			array_push($rows, $row);
		}
		return $rows;

		$conn=null;

}



//End of class
}
//print_r(Location::getCounties());
//echo json_encode(Location::getCounties());
//echo json_encode(Location::getConstituencies("Mombasa"));
//echo json_encode(Location::getWards("nyando"));

  ?>
