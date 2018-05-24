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
   $ten_error = isset($_SESSION['ten_error'])?$_SESSION['ten_error']:"";
   $sodidong_error = isset($_SESSION['sodidong_error'])?$_SESSION['sodidong_error']:"";
   $socoquan_error = isset($_SESSION['socoquan_error'])?$_SESSION['socoquan_error']:"";
   $email_error = isset($_SESSION['email_error'])?$_SESSION['email_error']:"";
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
                     <form style="padding: 10px;" name="xuly" action="xulithemdanhba.php" method="post" enctype = "multipart/form-data">
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label">Tên</label>
                           <div class="col-sm-8">
                              <input  class="form-control" name="ten" >
                              <span style = "color:red"><?php echo $ten_error ?></span></td>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label">Số di động</label>
                           <div class="col-sm-8">
                              <input  class="form-control" type="text" name="sodidong" >
                              <span style = "color:red"><?php echo $sodidong_error ?></span>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label">Số cơ quan</label>
                           <div class="col-sm-8">
                              <input  class="form-control" type="text" name="socoquan" >
                              <span style = "color:red"><?php echo $socoquan_error ?></span>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label">Địa chỉ</label>
                           <div class="col-sm-8">
                              <input  class="form-control" type="text" name="diachi" >
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label">Email</label>
                           <div class="col-sm-8">
                              <input  class="form-control" type="text" name="email" >
                              <span style = "color:red"><?php echo $email_error ?></span>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label">Hình ảnh</label>
                           <div class="col-sm-8">
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" name = "imageName" id="customFile">
                                 <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label">Quan hệ</label>
                           <div class="col-sm-8">
                              <select class="form-control" name="quanhe">
                                 <?php while($row = mysqli_fetch_array($listQH) ) {?>
                                 <option value="<?php echo $row['idQH'] ?>"><?php echo $row['loaiquanhe'] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-4 col-form-label">Ghi chú cá nhân</label>
                           <div class="col-sm-8">
                              <textarea class="form-control" name="ghichu" rows="3"></textarea>
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
      <?php 
         if(isset($_SESSION["ten_error"])) unset ($_SESSION["ten_error"]); 
         if(isset($_SESSION["sodidong_error"]))unset ($_SESSION["sodidong_error"]);
         if(isset($_SESSION["socoquan_error"]))unset ($_SESSION["socoquan_error"]);
         if(isset($_SESSION["email_error"]))unset ($_SESSION["email_error"]);
         
         ?>
   </body>
</html>