<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');
$T_Id=$_POST['T_Id'];
$res=mysqli_query($conn,"select * from teachers where T_Id='$T_Id'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
	$row = mysqli_fetch_array($res);
	echo $row['Name'];
}

?>
