<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');
$output='';
$srno=0;
$res=mysqli_query($conn,"SELECT * from orders INNER JOIN users on orders.User_Id=users.login_id");
$check_user=mysqli_num_rows($res);
if($check_user>0)
{
	$output .='
	<thead>
        <tr>
        <th>S.No.</th>
        <th>Student Name</th>
        <th>Teacher Name</th>
        <th>Subject</th>
        <th>Email ID</th>
        <th>Contact Number</th>
        <th>ordered on</th>
        </tr>
    </thead>
    <tbody>';
		while ($row = mysqli_fetch_assoc($res)) 
		{
			$srno=$srno + 1;
			$output .='
			<tr>
                <td>'.$srno.'</td>
                <td>'.$row["Name"].'</td>
                <td>'.$row["teacher_name"].'</td>
                <td>'.$row["subject_name"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["mobileno"].'</td>
                <td>'.$row["order_date"].'</td>                
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