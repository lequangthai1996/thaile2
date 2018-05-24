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
$idDB = isset($_REQUEST['id'])?$_REQUEST['id']:"";
if(empty($idDB)){
    header('location: quanlidanhba');
    exit();
}
$query = mysqli_query($conn,"select * from danhba inner join quanhe on danhba.idquanhe = quanhe.idQH where danhba.id= $idDB");
if(mysqli_num_rows($query) == 0){
    header("location: quanlidanhba.php");
    exit();
}
$ten2_error = isset($_SESSION['ten2_error'])?$_SESSION['ten2_error']:"";
$sodidong2_error = isset($_SESSION['sodidong2_error'])?$_SESSION['sodidong2_error']:"";
$socoquan2_error = isset($_SESSION['socoquan2_error'])?$_SESSION['socoquan2_error']:"";
$email2_error = isset($_SESSION['email2_error'])?$_SESSION['email2_error']:"";    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src = "ajax.js" type = "text/javascript"> </script>

  <title>Sửa danh bạ</title>
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
                <form style="padding: 10px;" name="xuly" action="xulisuadanhba.php?id=<?php echo $idDB ?>" method="post"  enctype = "multipart/form-data">
                    <?php 
                    if(mysqli_num_rows($query) > 0)
                    {

                        $row = mysqli_fetch_array($query);
                        ?>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tên</label>
                            <div class="col-sm-8">
                                <input  class="form-control" name="ten" value = "<?php if(strlen($ten2_error) == 0)  echo $row['ten'] ?>">
                                <span style = "color:red"><?php echo $ten2_error ?></span></td>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Số di động</label>
                            <div class="col-sm-8">
                              <input  class="form-control" type="text" name="sodidong" value = "<?php if(strlen($sodidong2_error) == 0) echo  $row['sodidong'] ?>" >
                              <span style = "color:red"><?php echo $sodidong2_error ?></span>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Số cơ quan</label>
                        <div class="col-sm-8">
                          <input  class="form-control" type="text" name="socoquan" value = "<?php if(strlen($socoquan2_error) == 0) echo  $row['socoquan'] ?>">
                          <span style = "color:red"><?php echo $socoquan2_error ?></span>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Địa chỉ</label>
                    <div class="col-sm-8">
                      <input  class="form-control" type="text" name="diachi" value = "<?php echo  $row['diachi'] ?>">
                  </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input  class="form-control" type="text" name="email" value = "<?php if(strlen($email2_error) == 0) echo  $row['email'] ?>">
                  <span style = "color:red"><?php echo $email2_error ?></span>
              </div>
          </div>
          <div class="form-group row">
              <label class="col-sm-4 col-form-label">Hình ảnh</label>
              <div class="col-sm-8">
                  <img  style = "width: 60px;height: 60px;"src="uploads/<?php echo $row['hinhanh'] ?>" alt="<?php echo $row['hinhanh'] ?>">
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
                  
                    <?php while($list = mysqli_fetch_array($listQH) ) {?>
                      <option <?php if($row['idQH'] == $list['idQH']) echo "selected" ?> value="<?php echo $list['idQH'] ?>"><?php echo $list['loaiquanhe'] ?></option>                  
                  <?php } ?> 

              </select>
          </div>

      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label">Ghi chú cá nhân</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="ghichu" rows="3"><?php echo $row['ghichu'] ?></textarea>

        </div>
    </div>



    <div class="form-group row">
        <div class="col-sm-10 text-center" >
          <button type="submit" class="btn btn-primary">Sửa</button>

      </div>
  </div>
<?php } ?>
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

if(isset($_SESSION["ten2_error"])) unset ($_SESSION["ten2_error"]); 
if(isset($_SESSION["sodidong2_error"]))unset ($_SESSION["sodidong2_error"]);
if(isset($_SESSION["socoquan2_error"]))unset ($_SESSION["socoquan2_error"]);
if(isset($_SESSION["email2_error"]))unset ($_SESSION["email2_error"]);

?>
</body>
</body>
</html>


