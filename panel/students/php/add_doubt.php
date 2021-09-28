<?php

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'images/'; // upload directory

if(!empty($_FILES['image']))
{
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

// can upload same image using rand function
$final_image = rand(1000,1000000).".".$ext;

// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image); 

if(move_uploaded_file($tmp,$path)) 
{
	$conn = mysqli_connect('localhost', 'root', '','cpi');
		$student_id=$_POST['user_id'];
		$teacher_Id=$_POST['teacher_id_Name'];
		$question=$_POST['question'];
		$Did=uniqid('DID',true).md5(time().date("ljSFYh:i:sA"));
		$res=mysqli_query($conn,"insert into doubts(doubt_id,teacher_id,student_id,doubt,doubt_image)values('$Did', '$teacher_Id', '$student_id', '$question', '$final_image')");

		if($res)
		{
			echo('added');
		}
		else
		{
			echo('error');
		}

}
} 
else 
{
echo 'invalid';
}
}


?>
