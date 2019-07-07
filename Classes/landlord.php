<?php 
include_once("../Database/dbcon.php");


class Landlord
{
	private $fname;
	private $lname;
	private $email;
	private $id;
	private $phone;
	private $pwd;
	function __construct($fname,$lname,$email,$id,$phone,$pwd)
	{
		$this->fname=$fname;
		$this->lname=$lname;
		$this->email=$email;
		$this->id=$id;
		$this->phone=$phone;
		$this->pwd=$pwd;

	}
	private function userAlreadyRegistered(){
		$conn=DBcon::connect();
		$sql=$conn->prepare("SELECT * FROM `landlord` WHERE email=:email or id=:id or phone=:phone");
		$sql->bindParam(':email',$this->email);
		$sql->bindParam(':id',$this->id);
		$sql->bindParam(':phone',$this->phone);
		$sql->execute();
		if ($sql->rowCount()>0) {
			return true;
		} else {
			return false;
		}
		$conn=null;
	}
	public function registerLandlord(){
		if ($this->userAlreadyRegistered()) {
		return "DUPLECATE_CREDENTIALS";
		} else {
			
		$conn=DBcon::connect();
		$hashpwd=password_hash($this->pwd,PASSWORD_DEFAULT);
		//echo $hashpwd;
		$sql=$conn->prepare("INSERT INTO `landlord`(`fname`, `lname`, `email`, `nationalid`, `phone`, `datesigned`, `lastloged`, `verified`, `pwd`) VALUES (:fname,:lname,:email,:nationalid,:phone,:datesigned,:lastloged,:verified,:pwd)");
		$date= date("Y-m-d h:m:s");
		$verified=0;
		//Bind Parameters
		$sql->bindParam(':fname',$this->fname);
		$sql->bindParam(':lname',$this->lname);
		$sql->bindParam(':email',$this->email);
		$sql->bindParam(':nationalid',$this->id);
		$sql->bindParam(':phone',$this->phone);
		$sql->bindParam(':datesigned',$date);
		$sql->bindParam(':lastloged',$date);
		$sql->bindParam(':verified',$verified);
		$sql->bindParam(':pwd',$hashpwd);
		//Excecute now
		$sql->execute();
		$conn=null;
		return "REGISTERED";
		}
		

	}
	public static function Login($email,$pwd){
		$conn=DBcon::connect();
		$sql=$conn->prepare("SELECT * FROM `landlord` WHERE email=:email");
		$sql->bindParam(':email',$email);
		$sql->execute();
		//echo $sql->rowCount();
		if ($sql->rowCount()<1) {
			return "USER_NOT_REGISTERED";
		} else {
			$row=$sql->fetch(PDO::FETCH_ASSOC);
			//print_r($row);
			if(!password_verify($pwd,$row['pwd'])){
				return "INCORECT_PASSWORD";
			}else{
				session_start();
				$_SESSION["id"]=$row['id'];
				$_SESSION["email"]=$row['email'];
				$_SESSION["fname"]=$row['fname'];
				$_SESSION["lname"]=$row['lname'];
				
				return "SUCCESS";
			}
		}
		
		$conn=null;
	}

	public static function upateDetails(){

	}
}


//$user=new Landlord("Joakim","Adeny","princejoachime@gmail.com","33971156","0717474676","kim");

//$user->registerLandlord();

//Landlord::Login("princejoachime@gmail.com","kim");
 ?>