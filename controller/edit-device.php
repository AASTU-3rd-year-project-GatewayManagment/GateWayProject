<?php 
include '../model/database.php';

if(isset($_POST['id'])){
$id = strtolower($_POST['id']);
$deviceName = strtolower($_POST['deviceName']);
$serialNumber = strtolower($_POST['deviceSerial']);
$originalSerial = strtolower($_POST['orginalSerial']);

$query = "UPDATE device
 set 
 serialNumber = '$serialNumber', 
 deviceName = '$deviceName' 
 where serialNumber='$originalSerial'";
try{
	$result = mysqli_query($connection,$query);
	echo "<div class='alert alert-success' role='alert'>Device Updated Succesfully</div>_good";
	}catch(Exception $e){
		die($e);
	}

}

?>