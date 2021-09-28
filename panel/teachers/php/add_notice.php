<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');
$notice_details=$_POST['notice_details'];
$send_to=$_POST['send_to'];

$res=mysqli_query($conn,"insert into notice (notice,send_to) values('$notice_details','$send_to')");
$query=mysqli_query($conn,"select * from notice where notice='$notice_details' and send_to='$send_to'");
$check_user=mysqli_num_rows($query);
if($check_user>0){

	echo("added");
}
else
{
    echo("error");
}

?>
