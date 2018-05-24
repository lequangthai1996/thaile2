
<?php 
	
	session_start();
	$username = $password = "";
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$username = $_POST['username'];
		$password = $_POST['password'];

		if($username == '' || $password == ''){
			header('location: login.php?msg=1');
			exit();
		}else{			
		
			$conn = new mysqli("localhost","root","","quanlidanhba");
			if($conn->connect_error){				
				dir("Connect fail ".$conn->connect_error);				
			}
			$conn->set_charset("utf8");
			$sql = "select * from account where username = ? && password = ?";
			if($query = $conn->prepare($sql)){
				$query->bind_param('ss',$username,$password);
				$query->execute();
				$query->bind_result($name,$pass,$role);
				$query->fetch();// lay du lieu ra
				if($name != ""){
					$_SESSION['user'] = $name;
					$_SESSION['role'] = $role;
					header("location: index.php");
				} else{
					header('location: login.php?msg=2');
				}
			}else{
				echo "dfdf";
			}
			$conn->close();
		}

	}
	
 ?>