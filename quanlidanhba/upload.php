<?php   

$checkExist = 0; // Kiem tra da co trong thu muc hay chua, neu da exit thi checkCompleteUpload =1
$checkCompleteUpload = 0; // Kiem tra da upload chua
if(!empty($_FILES['imageName']['name'])){
    $target_dir = "uploads/";
    $target_file = $target_dir.basename($_FILES['imageName']['name']);
    $tenfile = basename($_FILES['imageName']['name']);
    $uploadOK = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES['imageName']['tmp_name']);
    if($check !== false){
        echo "File is an image-".$check['mime'].".";
        $uploadOK = 1;
    }else{
        echo "File is not an image ";
        $uploadOK = 0;
    }
    if(file_exists($target_file)){
        echo "sorry, file already exist";
        $uploadOK = 0;
        $checkExist = 1;
    }
    if($_FILES['imageName']['size'] > 500000){
        echo "sorry, your file is too large";
        $uploadOK = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpge"){
        echo "sorry, only jpg,png,jpeg";
        $uploadOK = 0;
    }
    if($uploadOK == 0){
        echo "sorry, your file was not uploaded";
    }else{   
        if(move_uploaded_file($_FILES['imageName']['tmp_name'],$target_file)){
            $checkCompleteUpload = 1;  
           
        }
    }

}
echo $checkExist.$checkCompleteUpload;
?>