
    

<?php
    
    session_start();
    $conn = mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"quanlidanhba");
    mysqli_set_charset($conn,"utf8");
    $idQH= isset($_GET['q'])?$_GET['q']:"";
        
    

    if(!is_numeric($idQH)){
        $st = "select * from danhba inner join quanhe on danhba.idquanhe = quanhe.idQH";
        $rs = mysqli_query($conn,$st);
    }else{

        $st = "select * from danhba inner join quanhe on danhba.idquanhe = quanhe.idQH where danhba.idquanhe = ".$idQH;
        //echo $st;
        $rs = mysqli_query($conn,$st);
    }

    
    echo    "<tr>
            <th>ID</th>
            <th>Tên </th>
            <th>Hình ảnh</th>
            <th>Số di động</th>
            <th>Số cơ quan</th>
            <th>Địa chỉ </th> 
            <th>Quan hệ</th>         
            <th>Chức năng</th>

            </tr>";

   while($row = mysqli_fetch_array($rs)){
     
    echo   "<tr>";
            
    echo   "<td>".$row['id']."</td>";
    echo   "<td>".$row['ten']."</td>";
    echo   "<td ><img src = 'uploads/".$row['hinhanh']."'alt = '".$row['hinhanh']."'style = 'width: 40px;height: 40px' ></td>";
    echo   "<td>".$row['sodidong']."</td>";
    echo   "<td>".$row['socoquan']."</td>";
    echo   "<td>".$row['diachi']."</td>";
    echo   "<td>".$row['loaiquanhe']."</td>";            

    echo   "<td align='center' style = 'padding-top: 10px;padding-left: 2px; !important;' > ";    
    echo         "<a class = 'badge badge-success'  href='chitietdanhba.php?id=".$row['id']."'>Xem</a>";
                
                 if(!empty($_SESSION['role']) && $_SESSION['role'] == '1'){
                
    echo           "<a class = 'badge badge-success' href='suadanhba.php?id=".$row['id']."'>Sửa</a>";
    echo          "<a  class = 'badge badge-danger' href='xoadanhba.php?id=".$row['id']."'>Xóa</a>";
                  }              
    echo    "</td>";

    echo    "</tr>";


    }
   
    
    
?>


