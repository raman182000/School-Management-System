<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');
$Id=$_POST['id'];
$output='';
$sr_no=0;
//past class
$res=mysqli_query($conn,"select * from results WHERE user_id='$Id'") or die("error");
$check_user=mysqli_num_rows($res);
if($check_user>0){
    $output .='
        <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Subject Name</th>
                        <th>marks obtained</th>
                        <th>out of</th>
                        <th>exam date</th>
                      </tr>
                    </thead>
                    <tbody>
        ';
    while($row = mysqli_fetch_array($res))
    {
      $sr_no=$sr_no+1;
        $output .='
        <tr>
                        <td>'.$sr_no.'</td>
                        <td>'.$row["subject"].'</td>
                        <td>'.$row["marks_obtained"].'</td> 
                        <td>'.$row["total_marks"].'</td>                  
                        <td>'.$row["exam_date"].'</td>
                        </tr>
        ';
    }
	$output .='</tbody>';
}
else
{
    $output .='empty';
}

echo($output);
?>

