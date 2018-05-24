<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//lấy thông tin từ các form bằng phương thức POST
		$username = $_POST["username"];
		$password = $_POST["pass"];
		// $lastname = $_POST["last-name"];
		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
		if ($username == "" || $password == "" ) {
			header('location: Singup.php?msg=1');

			// echo "bạn vui lòng nhập đầy đủ thông tin";
		}else{
			$conn = new mysqli("localhost","root","","quanlidanhba");
			$conn->set_charset("utf8");
			$sql = "INSERT INTO account(username, password, role ) VALUES ( '$username', '$password', 0)";
			// thực thi câu $sql với biến conn lấy từ file connection.php
			if(mysqli_query($conn,$sql)){
				header('location: login.php?msg=4');
			}
			
			

			// echo "chúc mừng bạn đã đăng ký thành công";
			exit;
		}
	}
	
 
?>