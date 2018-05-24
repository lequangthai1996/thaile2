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
	$idQH = isset($_REQUEST['id'])?$_REQUEST['id']:"";
	if(empty($idQH)){
		header("location: quanliquanhe.php");
		exit();
	}
	$conn = new mysqli("localhost","root","","quanlidanhba");
	if($conn->connect_error){
		die("connect fail".$conn->connect_error);		
	}
	$conn->set_charset("utf8");
	$sql1 = "select * from quanhe where idQH = ".$idQH;
	
	$result1 = $conn->query($sql1);
	if($result1->num_rows ==  0){
		header("location: quanliquanhe.php");
		exit();
	}
	$sql2 = "select * from danhba inner join quanhe on danhba.idquanhe = quanhe.idQH where quanhe.idQH= ".$idQH;
	$result2 = $conn->query($sql2);
	if($result2->num_rows > 0){
		while($row = $result2->fetch_array()){
			echo $row['id']."<br>";
			$sql3 = "delete from danhba where id =?";
			if($query = $conn->prepare($sql3)){
				
				$query->bind_param("i",$row['id']);
				$query->execute();
			}
		}
	}
	$sql4 = "delete from quanhe where idQH = ?";
	if($query = $conn->prepare($sql4)){
		$query->bind_param("i", $idQH);
		if($query->execute()){
			header("location: quanliquanhe.php?msg=5");
		}else{
			header("location: quanliquanhe.php?msg=6");
		}
	}else{
		header("location: quanliquanhe.php?msg=6");
	}

 ?>