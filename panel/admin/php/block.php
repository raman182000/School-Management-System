<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');
$type=$_POST['type'];
$userid=$_POST['userid'];
$action=$_POST['action'];
if($type=="student" and $action=="block")
{
	$res=mysqli_query($conn,"update users set status='blocked' where login_id='$userid'");
	if($res)
	{
		
		echo "Blocked";
	}
	else
	{
		echo "error";
	}
}
else if($type=="teacher" and $action=="block")
{
	$res=mysqli_query($conn,"update teachers set status='blocked' where T_Id='$userid'");
	if($res)
	{
		
		echo "Blocked";
	}
	else
	{
		echo "error";
	}
}
else
{
	$res=mysqli_query($conn,"update teachers set status='approved' where T_Id='$userid'");
	if($res)
	{
		
		echo "Approved";
	}
	else
	{
		echo "error";
	}
}



?>