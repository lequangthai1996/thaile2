

<?php 

session_start();
if(!isset($_SESSION['user'])){
  header('location: login.php');
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
      <div class="col-8 text-center " style="background-color: #d8f3ea">
        
        <img class="img-welcom" style = "width: 80%;height: 80%;" src="image/background.jpg" align="center" alt="Card image cap"> 
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
