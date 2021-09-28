<?php 
$conn = mysqli_connect('localhost', 'root', '','cpi');
$teacher_id=$_POST['id'];
$output='';
$srno=0;
$query ="SELECT * from doubts where teacher_id='$teacher_id'";
$res=mysqli_query($conn,$query);
$res1=mysqli_num_rows($res);
if ($res1>0) {
	$output .='
	<thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Doubt</th>
                        <th>Doubt Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>';
		while ($row = mysqli_fetch_assoc($res)) 
		{
			$srno=$srno + 1;
			$output .='
			<tr>
                <td>'.$srno.'</td>
                <td>'.$row["doubt"].'</td>
                <td><a href="../questions/'.$row["doubt_image"].'" class="btn btn-success">open</a></td>
                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#solutionmodel" onclick=add_doubtid("'.$row["doubt_id"].'");>
                add solution
              </button></td>
               
            </tr>';
            
    }
    
        $output .="</tbody>";

	}

	else
	{
        $output .='empty';
        echo($output);
	}
echo($output);
 ?>