<?php 
    session_start(); 
    $conn = mysqli_connect("localhost","root","") or die("connect fail");
    mysqli_select_db($conn,"quanlidanhba");
    mysqli_set_charset($conn,"utf8");
    $idDB = isset($_REQUEST['id'])?$_REQUEST['id']:"";
    if(empty($idDB)){
        header("location: quanlidanhba.php");
        exit();
    }
    $rs = mysqli_query($conn,"select * from danhba inner join quanhe on danhba.idquanhe = quanhe.idQH where id= ".$idDB);
    if(mysqli_num_rows($rs) == 0){
        header("location: quanlidanhba.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Trang chủ</title>
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
    <div class="col-8  " style="background-color: #f6f6f6; ">
        <div class="row">
            <div class="col-4">
                
            </div>
            <div class="col-8">
                <table  border="0" cellpadding="0" cellspacing="0">
        <?php 
            while($row = mysqli_fetch_array($rs)){
         ?>
        <tr class="table">
            <td class="left" style="text-align: left;"><p>Tên</p></td>
            <td class="right" style="text-align: left;"><p><?php echo $row['ten'] ?></p></td>
        </tr>
       
        <tr class="table">
            <td class="left" style="text-align: left;"><p>Số di động</p></td>
            <td class="right" style="text-align: left;"><p><?php echo $row['sodidong'] ?></p></td>
        </tr>
        <tr class="table">
            <td class="left" style="text-align: left;"><p>Số cơ quan</p></td>
            <td class="right" style="text-align: left;"><p><?php echo $row['socoquan'] ?></p></td>
        </tr>
        <tr class="table">
            <td class="left" style="text-align: left;"><p>Địa chỉ</p></td>
            <td class="right" style="text-align: left;"><p><?php echo $row['diachi'] ?></p></td>
        </tr>
        <tr class="table">
            <td class="left" style="text-align: left;"><p>Email</p></td>
            <td class="right" style="text-align: left;"><p><?php echo $row['email'] ?></p></td>
        </tr>   
        <tr class="table">
            <td class="left" style="text-align: left;"><p>Hình ảnh</p></td>
            <td class="right"><img style = "width: 60px;height: 60px;"src="uploads/<?php echo $row['hinhanh'] ?>" alt="$row['hinhanh']"></td>
        </tr>             
        <tr class="table">
            <td class="left" style="text-align: left;"><p>Quan hệ</p></td>
            <td class="right" style="text-align: left;">
                <p>
                    <?php echo $row['loaiquanhe'] ?>
                </p>
            </td>
        </tr>

        <tr class="table">
            <td class="left" style="text-align: left;"><p>Ghi chú cá nhân</p></td>
            <td class="right" style="text-align: left;"><p><?php echo $row['ghichu'] ?></p></td>
        </tr>
       
        <?php } ?>
        </table>
            </div>
        </div>



</div>
<div class="col-2" style="background-color: #f1f1f1">
    <?php 
    include 'include/quangcao.php';
    ?>     
</div>

</div>
<div class="row">
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











