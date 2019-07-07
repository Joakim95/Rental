<?php 
include_once '../Database/dbcon.php';
class House
{
	private $county_id;
	private $constituency_id;
	private $ward_id;
	private $rentamount;
	private $inhousetoilet;
	private $numrooms;
	private $numbedrooms;
	private $inhousebathroom;
	private $vacancies;
	private $pathtopic;
	private $ownerid;
	private $nearestlandmark;
	private $initialdeposit;
	
	function __construct($county_id,$constituency_id,$ward_id,$rentamount,$inhousetoilet,$inhousebathroom,$numrooms,$pathtopic,$vacancies,$numbedrooms,$ownerid,$nearestlandmark,$initialdeposit)
	{
		$this->county_id=$county_id;
		$this->constituency_id=$constituency_id;
		$this->ward_id=$ward_id;
		$this->rentamount=$rentamount;
		$this->inhousetoilet=$inhousetoilet;
		$this->inhousebathroom=$inhousebathroom;
		$this->numrooms=$numrooms;
		$this->pathtopic=$pathtopic;
		$this->vacancies=$vacancies;
		$this->numbedrooms=$numbedrooms;
		$this->ownerid=$ownerid;
		$this->nearestlandmark=$nearestlandmark;
		$this->initialdeposit=$initialdeposit;

	}
	public  function AddHouseRecord(){
		$conn=DBcon::connect();
		$sql=$conn->prepare("INSERT INTO `houserecords`(`pathtopic`, `numrooms`, `numbedrooms`, `inhousetoilet`, `inhousebathroom`, `nearestlandmark`, `initialdeposit`, `rentamount`, `ownerid`,`vacancies`,`county_id`, `constituency_id`, `ward_id`) VALUES (:pathtopic,:numrooms,:numbedrooms,:inhousetoilet,:inhousebathroom,:nearestlandmark,:initialdeposit,:rentamount,:ownerid,:vacancies,:county_id,:constituency_id,:ward_id)");

		$sql->bindParam(':pathtopic',$this->pathtopic);
		
		$sql->bindParam(':numrooms',$this->numrooms);
		$sql->bindParam(':numbedrooms',$this->numbedrooms);
		$sql->bindParam(':inhousetoilet',$this->inhousetoilet);
		$sql->bindParam(':inhousebathroom',$this->inhousebathroom);
		$sql->bindParam(':nearestlandmark',$this->nearestlandmark);
		$sql->bindParam(':initialdeposit',$this->initialdeposit);
		$sql->bindParam(':rentamount',$this->rentamount);
		$sql->bindParam(':ownerid',$this->ownerid);
		$sql->bindParam(':vacancies',$this->vacancies);
		$sql->bindParam(':county_id',$this->county_id);
		$sql->bindParam(':constituency_id',$this->constituency_id);
		$sql->bindParam(':ward_id',$this->ward_id);
		if ($sql->execute()) {
			echo "ADDED";
		}else{
			echo "FAILED";
		}

		$conn=null;
	}

}
 ?>