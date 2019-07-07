<?php 

class DBcon
{
public static function  connect(){
$server="localhost";
$db="rentalkenya";
$user="root";
$pwd="";

	try{
	$con = new PDO("mysql:host=$server; dbname=$db",$user,$pwd);
	$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	//echo "Connected";
}catch(PDOException $e){
echo "Failed to connect:  " . $e->getMessage();
}
return $con;
}


}

 ?>