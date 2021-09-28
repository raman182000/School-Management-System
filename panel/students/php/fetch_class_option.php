<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');
$teacher_id=$_POST['teacher_id'];
$userid=$_POST['userid'];
$output='';
$res=mysqli_query($conn,"SELECT * from class  inner join orders on class.teacher_id=orders.Teacher_id where class.teacher_id='$teacher_id' and orders.User_Id='$userid'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
    $output .='<option>Select Subject</option>';
    while($row = mysqli_fetch_array($res))
    {
        $output .= '<option value='.$row["id"].'>'.$row["title"].' - on '.$row["schedule_date"].'</option>';
    }	
}
else
{
    $output .="empty";
}
echo($output);

?>
