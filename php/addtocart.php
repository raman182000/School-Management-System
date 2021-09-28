<?php

$conn = mysqli_connect('localhost', 'root', '','cpi');
$cid =$_POST['cid'];
$userid=$_POST['user'];
$check_cart=mysqli_num_rows(mysqli_query($conn,"select * from cart where userid='$userid' and cid='$cid'"));
if ($check_cart>0) {
	# code...
	$output="Already exist";
}
else
{
	$query="Insert into cart values('$userid','$cid')";
	$res=mysqli_query($conn,$query);
	$output="Inserted";
}
echo($output);
?>