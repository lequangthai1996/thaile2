


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/style.css" >

</head>
<body>



	<div class="container-fluid">
		<div class="row" >
			<?php include 'include/header.php' ?>
		</div>
		<div class="row">
			<div class="col-2" style="background-color: #f1f1f1">
				
			</div>
			
			<div class="col-8 login " style="background-color: #d8f3ea; padding: 10px;">
				<div class="row" >

					<div class="col">

					</div>
					<div class="col">
						<?php 
						$msg =  isset($_REQUEST['msg'])?$_REQUEST['msg']:"";
						if($msg== '4'){
							echo  "<span style = 'color: green;'>Đăng ký thành công, mời bạn login tại đây.</span>"."<br><br>";
						}
						

					


					?>    
					<h3 class="title-1">Đăng nhập</h3>
					<form action="xulilogin.php" method = "POST">
						<div class="form-group">
							<label>Tên đăng nhập</label>
							<input type="text" class="form-control" name = "username" placeholder="">
						</div>
						<div class="form-group" >
							<label for="exampleInputPassword1">Mật khẩu</label>
							<input type="password" class="form-control" name="password" placeholder="">
						</div>
						<?php 
						if($msg == '1'){
							echo  "<span style = 'color: red;'>Phải nhập đầy đủ tên và mật khẩu!</span>"."<br><br>";
						}else if($msg == '2'){
							echo  "<span style = 'color: red;'>Sai Tên hoặc mật khẩu. Hãy thử lại!</span>"."<br><br>";
						}
						 ?>
						<button type="submit" class="btn btn-primary">Đăng nhập</button>


					</form>
				</div>
				<div class="col">

				</div>


			</div>
		</div>
		<div class="col-2" style="background-color: #f1f1f1">
				<?php 
					include 'include/quangcao.php';
				 ?>	
			</div>
		
		
	</div>
	<div class="row" style = "position: fixed;bottom: 0px;width: inherit;">
			<?php 
					include 'include/footer.php';
				 ?>
		</div>
	
</div>
</div>




<script src="js/jquery-3.3.1.slim.min.js" ></script>
<script src="js/popper.min.js" ></script>
<script src="js/bootstrap.min.js" ></script>
</body>
</body>
</html>