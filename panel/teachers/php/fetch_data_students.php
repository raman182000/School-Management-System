<?php 
$conn = mysqli_connect('localhost', 'root', '','cpi');
$output='';
$srno=0;
$query ="SELECT * from orders inner join users on orders.User_id=users.login_id";
$res=mysqli_query($conn,$query);
$res1=mysqli_num_rows($res);
if ($res1>0) {
	$output .='
	<thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Student Name</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Email ID</th>
                        <th>Contact Number</th>
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
                <td>'.$row["Gender"].'</td>
                <td>'.$row["DOB"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["mobileno"].'</td>
                
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