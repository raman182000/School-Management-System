<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');
$T_Id=$_POST['T_Id'];
$output='';
$res=mysqli_query($conn,"select * from users where login_id='$T_Id'");
$check_user=mysqli_num_rows($res);
if($check_user>0)
{
	$row = mysqli_fetch_array($res);
	if($row['status']=="not completed")
	{
		$output .='
		<div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                  <p>Please complete your profile to use full features.</p>
                  <a href="profile.html" target="_blank" class="btn download-button purchase-button ml-auto">Complete Profile</a>
                  <i class="mdi mdi-close" id="bannerClose"></i>
                </span>
              </div>
		';
	}
	else
	{
		$output.='completed';
	}
	$output= $output."~~~~~".$row['Name'];
}
echo($output)
?>
