


 <div class="container-fluid">
	<div class="row " style="background-color: #d2e1dc ">
		<div class="col-4 ">
<!-- 			<img class="icon " src="image/ic_logo.png" alt="Card image cap">			
 -->		</div>
		<div class="col-5">
			<h2 class="title" style="height: 100px; line-height: 100px; font-weight: bold; color: #105397;">Quản lý danh bạ điện thoại</h2>

		</div>
		<div class="col-3 ">
			<?php 
			if(isset($_SESSION['user'])){
				?>
				<div class="top-left">
					<p class="text-primary" > Xin chao <?php echo $_SESSION['user'] ?>!</p>
					
				</div>
					<div class="top-left">
					<button type="button " class="btn btn-info"><a class="button" style="color: white;" href="logout.php">Đăng xuất</a></button>
					</div>
					
				
				

				<?php 
			}else{
				?>
					<div class="top-left-btn ">
						<button type="button " class="btn btn-info"><a style="color: white;" href="login.php">Đăng nhập</a></button>
						<button type="button " class="btn btn-info"><a style="color: white;" href="dangki.php">Đăng kí</a></button>
					</div>
					
				
				

				
				<?php } ?>
			</div>


		</div>

	</div>
