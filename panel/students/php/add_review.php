<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');
$student_id=$_POST['user_id'];
$class_id=$_POST['class_id'];
$rating=$_POST['rating'];
$review=$_POST['review'];
$res=mysqli_query($conn,"select * from class_reviews where class_id='$class_id' and student_id='$student_id'");
$check_user=mysqli_num_rows($res);
$query="insert into class_reviews values('', '$class_id', '$student_id', '$rating', '$review')";
if($check_user>0)
{
	echo("Already Added");
	
}
else
{$result=mysqli_query($conn,$query);
    
    if($result)
    {
        echo("Added");
    }
    else
    {
        echo("error");
    }
}

?>
