<?php 
	$q = $_REQUEST['q'];
	$hint = "";
	$conn = mysqli_connect("localhost","root","") or die("connect err");
	mysqli_select_db($conn,"quanlidanhba");
	mysqli_set_charset($conn,"utf8");
	$sql = "select ten,id from danhba where ten like '%".$q."%'";
	
	$result = mysqli_query($conn,$sql);
	if($q !== ""){
		while($rows = mysqli_fetch_array($result)){
			$hint.= "<a href = 'quanlidanhba.php?id=".$rows['id']."'>".$rows['ten']."</a>"."<br />";
		}
	}
	echo $hint;
	

 ?>