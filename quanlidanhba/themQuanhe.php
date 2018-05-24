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
   $conn = mysqli_connect("localhost","root","") or die("connect fail");
   mysqli_select_db($conn,"quanlidanhba");
   mysqli_set_charset($conn,"utf8");
   $listQH = mysqli_query($conn, "select * from quanhe ");
   
   $tenquanhe_error = isset($_SESSION['tenquanhe_error'])?$_SESSION['tenquanhe_error']:"";
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script src = "ajax.js" type = "text/javascript"> </script>
      <title>Thêm danh bạ</title>
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
                  <div class="col-2">
                  </div>
                  <div class="col-8">
                     <form style="padding: 10px;" name="xuly" action="xulithemquanhe.php" method="post">
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label">Tên quan hệ</label>
                           <div class="col-sm-8">
                              <input  class="form-control" name="tenquanhe" >
                              <span style = "color:red"><?php echo $tenquanhe_error ?></span></td>
                           </div>
                        </div>
                       
                        <div class="form-group row">
                           <div class="col-sm-10 text-center" >
                              <button type="submit" class="btn btn-primary">Thêm</button>
                           </div>
                        </div>
                     </form>
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
       <?php 
         if(isset($_SESSION["tenquanhe_error"])) unset ($_SESSION["tenquanhe_error"]); 
       
         
         ?>     
   </body>
</html>