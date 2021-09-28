<?php

$valid_extensions = array('jpeg', 'jpg', 'png', 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'papers/'; // upload directory

if(!empty($_FILES['image']))
{
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

// can upload same image using rand function
$final_image = "Paper".rand(1000,1000000).".".$ext;

// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image); 

if(move_uploaded_file($tmp,$path)) 
{
	$conn = mysqli_connect('localhost', 'root', '','cpi');
		$teacher_Id=$_POST['t_id'];
		$start_date=$_POST['paper_date'];
		$start_time=$_POST['paper_time'];
		$due_time=$_POST["due_time"];
		$total_marks=$_POST["total_marks"];
		$pid="paper".md5(time().date("ljSFYh:i:sA"));
		$res=mysqli_query($conn,"select * from teachers where T_Id='$teacher_Id'") or die("error");
		$result=mysqli_num_rows($res);
		if ($result>0)
		{
			# code...
			$row=mysqli_fetch_assoc($res);
			$subject=$row["subject"];
			$name=$row["Name"];
			$query=mysqli_query($conn,"insert into paper values('$pid', '$subject', '$name', '$total_marks', '$start_date', '$start_time', '$due_time', '$final_image')");
			if($query)
			{
				echo('added');
			}
			else
			{
				echo('error');
			}
		}

		

}
} 
else 
{
echo 'invalid';
}
}


?>
