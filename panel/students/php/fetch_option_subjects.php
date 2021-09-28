<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');
$userid=$_POST['userid'];
$output='';
$res=mysqli_query($conn,"SELECT * from teachers inner join subjects on teachers.subject=subjects.subject_name inner join orders on teachers.T_Id=orders.Teacher_id where orders.User_Id='$userid'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
    $output .='<option>Select Subject</option>';
    while($row = mysqli_fetch_array($res))
    {
        $output .= '<option value='.$row["T_Id"].'>'.$row["subject_name"].' - By '.$row["Name"].'</option>';
    }	
}
else
{
    $output .="empty";
}
echo($output);

?>
