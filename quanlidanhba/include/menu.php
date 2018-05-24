

<ul class="nav flex-column">
  <li class="nav-item menu-left">
    <a class="nav-link " href="quanlidanhba.php" style="border-bottom: 1px solid #e2dddf;">Quản lí danh bạ</a>
  </li>
  
  <?php	
        if(!empty($_SESSION['role']) && $_SESSION['role'] == '1'){	
	 ?>
   <li class="nav-item menu-left">
    <a class="nav-link" href="quanliquanhe.php" style="border-bottom: 1px solid #e2dddf;">Quản lí quan hệ</a>
    <a class="nav-link" href="themDanhBa.php" style="border-bottom: 1px solid #e2dddf;">Thêm danh bạ</a>
    <a class="nav-link" href="themQuanhe.php" style="border-bottom: 1px solid #e2dddf;">Thêm quan hệ</a>
  </li>
  
  <?php 
  }
  ?>
</ul>