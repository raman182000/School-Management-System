<?php 
$conn = mysqli_connect('localhost', 'root', '','cpi');
$sub_name=$_POST['Name'];
$class=$_POST['class'];
$price=$_POST['Price'];
$short_description=$_POST['short_description'];
$long_description=$_POST['long_description'];
$subid=uniqid('SUBID',true).md5(time().date("ljSFYh:i:sA"));
$output='';
$query ="SELECT * FROM subjects where subject_name='$sub_name' and class='$class'";
$res=mysqli_query($conn,$query);
$res1=mysqli_num_rows($res);
if ($res1>0) {
    $output .='already exist';
	}

	else
	{
		$queryte="insert into subjects values('$subid', '$sub_name', '$class', '$price', '$short_description', '$long_description')";
		$res1=mysqli_query($conn,$queryte);
		$query ="SELECT * from subjects where subject_id='$subid'";
		$res=mysqli_query($conn,$query);
		$res1=mysqli_num_rows($res);
		if ($res1>0)
	    {
			$output .='added';
		}else
		{
			$output .='error';
		}
		
	}
echo($output);
 ?>