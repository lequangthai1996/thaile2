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
	$ten = $sodidong = $socoquan =$diachi = $email = $hinhanh = $quanhe = $ghichu = "";
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$ten = $_POST['ten'];
		$sodidong = $_POST['sodidong'];
		$socoquan  = $_POST['socoquan'];
		$diachi  = $_POST['diachi'];
		$email  = $_POST['email'];		
		$quanhe  = $_POST['quanhe'];
		$ghichu  = $_POST['ghichu'];

		if(empty($ten)){
			$_SESSION['ten_error'] = "Yêu cầu nhập tên";
			$error = 1;
		}else{
			$_SESSION['ten_error'] = "";
		}
		if(empty($sodidong)){
			$_SESSION['sodidong_error'] = "Yêu cầu nhập số di động";
			$error = 1;

		}else if(!preg_match('/^[0-9]{10,11}+$/', $sodidong)){
			$_SESSION['sodidong_error'] = "Số di động phải hợp lệ";
			$error = 1;
		}else{
			$_SESSION['sodidong_error'] = "";
		}
		if(!empty($socoquan)){
			if(!preg_match('/^[0-9]{10,11}+$/',$socoquan)){
				$_SESSION['socoquan_error'] = "Số cơ quan phải hợp lệ";
				$error = 1;
			}else{
				$_SESSION['socoquan_error'] = "";
			}
		}
		if(!empty($email)){
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  $_SESSION['email_error'] = "Email phải hợp lệ";
			  $error = 1;
			}else{
				$_SESSION['email_error'] = "";
			}			
		}
		
		if($error == 1){
			header("location: themdanhba.php");
			exit();
		}
		include "upload.php";		
		if($checkExist == 1 || $checkCompleteUpload == 1) $hinhanh = $tenfile;


	}
	$conn = new mysqli("localhost", "root","","quanlidanhba");
	if($conn->connect_error){
		die("connect eror".$conn->connect_error);
	}
	$conn->set_charset("utf8");
	$sql = "insert into danhba values(0,?,?,?,?,?,?,?,?)";
	if($query = $conn->prepare($sql))
	{
		$query->bind_param('ssssssis',$ten,$sodidong,$socoquan,$diachi,$email,$hinhanh,$quanhe,$ghichu);
		$query->execute();
		header('location: quanlidanhba.php?msg=1');
		exit();
	}else{
		header('location: quanlidanhba.php?msg=2');
		exit();
	}

 ?>