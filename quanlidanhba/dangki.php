<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Sign up</title>
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
				<?php 
					include 'include/menu.php';
				 ?>
			</div>
			<div class="col-8 login " style="background-color: #d8f3ea">
				<div class="row" >
					<div class="col">

					</div>
					<div class="col">
						<h3 class="title-1">Đăng kí</h3>
						<form action="xulidangki.php" method = "POST">
							<div class="form-group">
								<label>Tên đăng kí</label>
								<input type="text" class="form-control" name = "username" placeholder="">
							</div>
							<div class="form-group" >
								<label for="exampleInputPassword1">Mật khẩu</label>
								<input type="password" class="form-control" name="pass" placeholder="">
							</div>
							
							<?php
			$msg =  isset($_REQUEST['msg'])?$_REQUEST['msg']:"";
                if($msg== '1'){
                  echo  "<span style = 'color: red;'>Bạn vui lòng nhập đầy đủ thông tin.</span>"."<br><br>";
                } 
			 ?>
							<button type="submit" name="btn_submit"  class="btn btn-primary">Đăng kí</button>
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