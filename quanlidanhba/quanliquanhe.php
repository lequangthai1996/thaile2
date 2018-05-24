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
$conn  = new mysqli("localhost","root","","quanlidanhba");
if($conn->connect_error){
    die("connect error".$conn->connect_error);
}
$conn->set_charset("utf8");
$listQuanHe;
if($queryQuanHe = $conn->prepare("select * from quanhe")){
    if($queryQuanHe->execute()){ 
      $listQuanHe = $queryQuanHe->get_result();
    } else{
      header("location: quanlidanhba.php");
      exit();
    }
}else{
   header("location: quanlidanhba.php");
   exit();
}
$idDB = isset($_REQUEST['id'])?$_REQUEST['id']:"";
$result;

?>

<!-- copy -->

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
    <div class="col-8 text-center " style="background-color: #f6f6f6">
        <div class="row">
            <div class="col-4">
                <h3 class="title-1">Danh sách quan hệ</h3>    

            </div>

            <div class="col-4">
              <?php 
                    $msg =  isset($_REQUEST['msg'])?$_REQUEST['msg']:"";
                    if($msg== '1'){
                      echo  "<span style = 'color: blue;'>Thêm quan hệ thành công</span>"."<br><br>";
                    }
                     if($msg == '2'){
                      echo  "<span style = 'color: blue;'>Thêm quan hệ thất bại</span>"."<br><br>";
                    }
                     if($msg == '3'){
                      echo  "<span style = 'color: blue;'>Sửa quan hệ thành công</span>"."<br><br>";
                    }    
                     if($msg == '4'){
                      echo  "<span style = 'color: blue;'>Sửa quan hệ thất bại</span>"."<br><br>";
                    }                      
                    if($msg == '5'){
                      echo  "<span style = 'color: blue;'>Xóa quan hệ thành công</span>"."<br><br>";
                    }  

                    if($msg == '6'){
                      echo  "<span style = 'color: blue;'>Xóa quan hệ thất bại</span>"."<br><br>";
                    }                                                                             
             ?>          
          </div>

      </div>
      <div class="row">
        <div class="col-8" ">
          
        <p ><span id="txtHint" style = "color: green;"></span></p>        
    </div> 

</div>

<table class="table table-striped" id = "result">
   
        <tr>
            <th>ID</th>
            <th>Tên Quan Hệ </th>
            <th>Chức năng</th>
        </tr>
   

       <?php 
    while($rows = $listQuanHe->fetch_array()){
        ?>       
        <tr>
            
            <td><?php echo $rows['idQH'] ?></td>
            <td><?php echo $rows['loaiquanhe'] ?></td>
            

            <td align="center">               
             <?php 
             if(!empty($_SESSION['role']) && $_SESSION['role'] == '1'){
                ?>
                <a class="badge badge-success" href="suaquanhe.php?id=<?php echo $rows['idQH'] ?>">Sửa</a> 
                <a class="badge badge-danger" href="xoaquanhe.php?id=<?php echo $rows['idQH'] ?>">Xóa</a>
            <?php } ?>                
            </td>

    </tr>
<?php } ?>

  
</table>



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
<script>
    function showHint(str){
        if(str.length == 0){
            document.getElementById("txtHint").innerHTML = "";
            return;
        }else{
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "searchbyname.php?q="+str,true);
            xmlhttp.send();
        }
    }


    function showListByQH(str){
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("result").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "searchbyqh.php?q="+str,true);
        xmlhttp.send();
        
    }
</script>
</body>
</body>
</html>






