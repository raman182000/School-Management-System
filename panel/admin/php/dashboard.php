<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');
$res=mysqli_query($conn,"select * from admin");
$check_user=mysqli_num_rows($res);
if($check_user>0){
	$row = mysqli_fetch_array($res);
	echo $row['username'];
}

?>