<?php 
$conn = mysqli_connect('localhost', 'root', '','cpi');
$status=$_POST['status'];
$output='';
$srno=0;

$query ="SELECT * from teachers where status='$status'";
$res=mysqli_query($conn,$query);
$res1=mysqli_num_rows($res);
if ($res1>0) {
    $output .='
    <thead>
	<tr>
                <th>S.No.</th>
                <th>Teachers Name</th>
                <th>Gender</th>
                <th>Email ID</th>
                <th>Contact Number</th>
                <th>Subject</th>
                </tr>
                </thead>
                <tbody>';
		while ($row = mysqli_fetch_assoc($res)) 
		{
      if($status=="approved")
      {
          $srno=$srno + 1;
          $output .='
          <tr>
                    <td>'.$srno.'</td>
                    <td>'.$row["Name"].'</td>
                    <td>'.$row["Gender"].'</td>
                    <td>'.$row["email"].'</td>
                    <td>'.$row["mobileno"].'</td>
                    <td>'.$row["subject"].'</td>
                    <td>
                              <button type="button" onclick=block("'.$row["T_Id"].'","teacher","block") class="btn btn-outline-danger btn-sm">Block</button>
                              
                            </td>
                </tr>
            ';
      }  
      else
      {
        $srno=$srno + 1;
          $output .='
          <tr>
                    <td>'.$srno.'</td>
                    <td>'.$row["Name"].'</td>
                    <td>'.$row["Gender"].'</td>
                    <td>'.$row["email"].'</td>
                    <td>'.$row["mobileno"].'</td>
                    <td>'.$row["subject"].'</td>
                    <td>
                              <button type="button" onclick=block("'.$row["T_Id"].'","teacher","approve") class="btn btn-outline-success btn-sm">Approve</button>
                              
                            </td>
                </tr>
            ';
      }  
    }
        $output .='</tbody>';
	}

	else
	{
		$output .='empty';
	}
echo($output);
 ?>