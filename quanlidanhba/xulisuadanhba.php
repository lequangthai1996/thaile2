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
	$ten = $sodidong = $socoquan =$diachi = $email = $hinhanh = $quanhe = $ghichu = "";
	$idDB = isset($_REQUEST['id'])?$_REQUEST['id']:"";
	
	if(empty($idDB)){
		header("location: quanlidanhba.php");
		exit();
	}
	$error = 0;
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$ten = $_POST['ten'];
		$sodidong = $_POST['sodidong'];
		$socoquan  = $_POST['socoquan'];
		$diachi  = $_POST['diachi'];
		$email  = $_POST['email'];		
		$quanhe  = $_POST['quanhe'];
		$ghichu  = $_POST['ghichu'];

		if(empty($ten)){
			$_SESSION['ten2_error'] = "Yêu cầu nhập tên";
			$error = 1;
		}else{
			$_SESSION['ten2_error'] = "";
		}
		if(empty($sodidong)){
			$_SESSION['sodidong2_error'] = "Yêu cầu nhập số di động";
			$error = 1;

		}else if(!preg_match('/^[0-9]{10,11}+$/', $sodidong)){
			$_SESSION['sodidong2_error'] = "Số di động phải hợp lệ";
			$error = 1;
		}else{
			$_SESSION['sodidong2_error'] = "";
		}
		if(!empty($socoquan)){
			if(!preg_match('/^[0-9]{10,11}+$/',$socoquan)){
				$_SESSION['socoquan2_error'] = "Số cơ quan phải hợp lệ";
				$error = 1;
			}else{
				$_SESSION['socoquan2_error'] = "";
			}
		}
		if(!empty($email)){
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  $_SESSION['email2_error'] = "Email phải hợp lệ";
			  $error = 1;
			}else{
				$_SESSION['email2_error'] = "";
			}			
		}
		
		if($error == 1){
			header("location: suadanhba.php?id=$idDB");
			exit();
		}		
		include "upload.php"; // Them code upload anh		
		if($checkCompleteUpload == 1 || $checkExist ==1) $hinhanh = $tenfile;
	}
	$conn = new mysqli("localhost", "root","","quanlidanhba");
	if($conn->connect_error){
		die("connect eror".$conn->connect_error);
	}
	$conn->set_charset("utf8");
	
	// Chua ton tai anh hoac khong upload anh
	if($hinhanh == ""){
		$sql = "update danhba set ten = ?,sodidong = ?,socoquan = ?,diachi = ?,email = ?,idquanhe = ?,ghichu = ? where id = ?";
		if($query = $conn->prepare($sql))
		{
			$query->bind_param('sssssisi',$ten,$sodidong,$socoquan,$diachi,$email,$quanhe,$ghichu,$idDB);
			$query->execute();
			header('location: quanlidanhba.php?msg=3');
			exit();
		}else{
			header('location: quanlidanhba.php?msg=4');
			exit();
		}
	}
	$sql = "update danhba set ten = ?,sodidong = ?,socoquan = ?,diachi = ?,email = ?,hinhanh = ?,idquanhe = ?,ghichu = ? where id = ?";
	if($query = $conn->prepare($sql))
	{
		$query->bind_param('ssssssisi',$ten,$sodidong,$socoquan,$diachi,$email,$hinhanh,$quanhe,$ghichu,$idDB);
		$query->execute();
		header('location: quanlidanhba.php?msg=3');
		exit();
	}else{
		header('location: quanlidanhba.php?msg=4');
		exit();
	}

 ?>