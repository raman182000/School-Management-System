<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');


$email=$_POST['emaillog'];
$password=$_POST['passwordlog'];

$res=mysqli_query($conn,"select * from teachers where email='$email' and password='$password'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
	$row = mysqli_fetch_array($res);
	echo $row['T_Id'];
}else{
	echo "wrong_credential";
}

?>
