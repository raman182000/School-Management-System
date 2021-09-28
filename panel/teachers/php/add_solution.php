<?php
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = '../../solutions/'; // upload directory

if(!empty($_FILES['image']))
{
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

// can upload same image using rand function
$final_image = "SOL".md5(time().date("ljSFYh:i:sA")).".".$ext;

// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
	$path = $path.strtolower($final_image); 

	if(move_uploaded_file($tmp,$path)) 
	{
		$conn = mysqli_connect('localhost', 'root', '','cpi');
			$doubt_id=$_POST['doubt_id'];
			$solution='';
			$solution .= $_POST['solution'];
			$res=mysqli_query($conn,"update doubts set solution_image='$final_image' where doubt_id='$doubt_id'") or die("error");

			if($res)
			{
				echo("added");
			}
			else
			{
				echo("error");
			}

	}
} 
else 
{
echo 'invalid';
}
}



?>
