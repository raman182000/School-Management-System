<?php 
$conn = mysqli_connect('localhost', 'root', '','cpi');
$output='';
$srno=0;
$query ="SELECT * from subjects";
$res=mysqli_query($conn,$query);
$res1=mysqli_num_rows($res);
if ($res1>0) {
	$output .='
	<thead>
                  <tr>
                    <th>S.No</th>
                    <th>Class</th>
                    <th>Subject Name</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>';
		while ($row = mysqli_fetch_assoc($res)) 
		{
			$srno=$srno + 1;
			$output .='
			<tr>
                <td>'.$srno.'</td>
                <td>'.$row["class"].'</td>
                <td>'.$row["subject_name"].'</td>
                <td>'.$row["price"].'</td>
                
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