<?php 
	session_start();
   if(empty($_SESSION['user']) ){
       header("location: login.php");
       exit();
   }
   if($_SESSION['role'] == '0'){
       header("location: quanlidanhba.php");
       exit();
   }


	$idDB = isset($_REQUEST['id'])?$_REQUEST['id']:"";
	
	if(empty($idDB)){
		header("location: quanlidanhba.php");
	}
	$conn = new mysqli("localhost","root","","quanlidanhba");
	if($conn->connect_error){
		die("connect error".$conn->connect_error);
	}
	$conn->set_charset("utf8");
	$sql = "delete from danhba where id =?";
	if($query = $conn->prepare($sql)){
		$query->bind_param("i",$idDB);
		if($query->execute()) header("location: quanlidanhba.php?msg=5");
		else{
			header("location: quanlidanhba.php?msg=6");	
		}
	}else{
		header("location: quanlidanhba.php?msg=6");
	}
 ?>