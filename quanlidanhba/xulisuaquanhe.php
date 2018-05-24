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
    $idQH = isset($_REQUEST['id'])?$_REQUEST['id']:"";
	$tenquanhe= "";
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$tenquanhe = $_POST['tenquanhe'];
		

		if(empty($tenquanhe)){
			$_SESSION['tenquanhe2_error'] = "Yêu cầu nhập tên quan hệ";
			$error = 1;
		}else{
			$_SESSION['tenquanhe2_error'] = "";
		}		
		

		if($error == 1){
			header("location: suaquanhe.php?id=".$idQH);
			exit();
		}
		


	}
	

	$conn = new mysqli("localhost", "root","","quanlidanhba");
	if($conn->connect_error){
		die("connect eror".$conn->connect_error);
	}
	$conn->set_charset("utf8");
	
	$sql = "update quanhe set loaiquanhe = ? where idQH=?";
	if($query = $conn->prepare($sql))
	{
		$query->bind_param('si',$tenquanhe,$idQH);
		if($query->execute()) header('location: quanliquanhe.php?msg=3');
		else header('location: quanliquanhe.php?msg=4');
		exit();
	}else{
		header('location: quanliquanhe.php?msg=4');
		exit();
	}

 ?>