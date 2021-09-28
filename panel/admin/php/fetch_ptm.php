<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');
$past_ptm='';
$todays_ptm='';
$date=date("Y-m-d");
//past class
$res=mysqli_query($conn,"select * from ptm where schedule_date<'$date'") or die("error");
$check_user=mysqli_num_rows($res);
if($check_user>0){
    $past_ptm .='
        <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Time</th>
                      </tr>
                    </thead>
                    <tbody>
        ';
    while($row = mysqli_fetch_array($res))
    {
        $past_ptm .='
        <tr>
                        <td>1</td>
                        <td>'.$row["title"].'</td>
                        <td>'.$row["schedule_date"].'</td> 
                        <td>'.$row["schedule_time"].'</td>                  
                        </tr>
                        
        ';
    }
	$past_ptm .='</tbody>';
}
else
{
    $past_ptm .='empty';
}

//todays class
$res1=mysqli_query($conn,"select * from ptm where schedule_date>='$date'") or die("error");
$check_user1=mysqli_num_rows($res1);
if($check_user1>0){
    $todays_ptm .='
        <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Passcode</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
        ';
    while($row1 = mysqli_fetch_array($res1))
    {
        $todays_ptm .='
        <tr>
                        <td>1</td>
                        <td>'.$row1["title"].'</td>
                        <td>'.$row1["schedule_date"].'</td> 
                        <td>'.$row1["schedule_time"].'</td> 
                        <td>'.$row1["passcode"].'</td>
                        <td><button type="button" onclick=location.href="'.$row1["url"].'" class="btn btn-outline-success btn-rounded btn-fw">join now</button></td>                 
                        
                        </tr>
                        
        ';
        
    }
	$todays_ptm .='</tbody>';
}
else
{
    $todays_ptm .='empty';
}

echo($todays_ptm."~~~~~".$past_ptm);
?>

