<?php 
$conn = mysqli_connect('localhost', 'root', '','cpi');
$status=$_POST['status'];
$output='';
$model='';
$srno=0;
$query ="SELECT * from notice where send_to='$status' or send_to='Both'";
$res=mysqli_query($conn,$query);
$res1=mysqli_num_rows($res);
if ($res1>0) {
	$output .='
	<thead>
                      <tr>
                      <th>S.No.</th>
                      <th>Date</th>
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
                <td>'.$row["date"].'</td>
                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#noticemodel'.$row["notice_id"].'">
                view notice
              </button></td>
                
                
            </tr>';
            $model .='
            <div class="modal fade" id="noticemodel'.$row["notice_id"].'"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Notice</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        '.$row['notice'].'
              
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
				';
        }
        $output .="</tbody>";

	}

	else
	{
		$output .='empty';
	}
echo($output."~~~~~".$model);
 ?>