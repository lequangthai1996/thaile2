<?php 
	session_start();
	$error = 0;
    if(empty($_SESSION['user']) ){
        header("location: login.php");
        exit();
    }
    if($_SESSION['role'] == '0'){
        header("location: quanlidanhba.php");
        exit();
    }
	$tenquanhe= "";
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$tenquanhe = $_POST['tenquanhe'];
		

		if(empty($tenquanhe)){
			$_SESSION['tenquanhe_error'] = "Yêu cầu nhập tên quan hệ";
			$error = 1;
		}else{
			$_SESSION['tenquanhe_error'] = "";
		}
		
		
		
		if($error == 1){
			header("location: themQuanhe.php");
			exit();
		}
		


	}
	$conn = new mysqli("localhost", "root","","quanlidanhba");
	if($conn->connect_error){
		die("connect eror".$conn->connect_error);
	}
	$conn->set_charset("utf8");
	$sql = "insert into quanhe values(0,?)";
	if($query = $conn->prepare($sql))
	{
		$query->bind_param('s',$tenquanhe);
		if($query->execute()) header('location: quanliquanhe.php?msg=1');
		else header('location: quanliquanhe.php?msg=2');
		exit();
	}else{
		header('location: quanliquanhe.php?msg=2');
		exit();
	}

 ?>