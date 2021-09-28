<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');
$Id=$_POST['id'];
$output='';
$sr_no=0;
//past class
$res=mysqli_query($conn,"select * from orders WHERE orders.User_Id='$Id'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
    $output .='
        <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Subject Name</th>
                        <th>Teachers Name</th>
                        <th>Price</th>
                        <th>Payment Status</th>
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
                        <td>'.$row["subject_name"].'</td>
                        <td>'.$row["teacher_name"].'</td> 
                        <td>'.$row["Price"].'</td>                  
                        <td>'.$row["payment_status"].'</td>
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

