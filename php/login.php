<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');

$account_type=$_POST['account_type'];
$email=$_POST['emaillog'];
$password=md5($_POST['passwordlog']);

if ($account_type=="teacher") {
	$res=mysqli_query($conn,"select * from teachers where email='$email' and password='$password'");
	$check_user=mysqli_num_rows($res);
	if($check_user>0){
		$row = mysqli_fetch_array($res);
		echo $row['login_id'];
	}else{
		echo "wrong credential";
	}
} else if($account_type=="student"){
	$res=mysqli_query($conn,"select * from users where email='$email' and password='$password'");
	$check_user=mysqli_num_rows($res);
	if($check_user>0){
		$row = mysqli_fetch_array($res);
		echo $row['login_id'];
	}else{
		echo "wrong credential";
	}
}



?>
