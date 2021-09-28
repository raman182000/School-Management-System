<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');
$Id=$_POST['id'];
$past_class='';
$todays_class='';
$date=date("Y-m-d");
//past class
$res=mysqli_query($conn,"select * from class where teacher_id='$Id' and schedule_date<'$date'") or die("error2");
$check_user=mysqli_num_rows($res);
if($check_user>0){
    $past_class .='
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
        $past_class .='
        <tr>
                        <td>1</td>
                        <td>'.$row["title"].'</td>
                        <td>'.$row["schedule_date"].'</td> 
                        <td>'.$row["schedule_time"].'</td>                  
                        </tr>
                        
        ';
    }
	$past_class .='</tbody>';
}
else
{
    $past_class .='empty';
}

//todays class
$res1=mysqli_query($conn,"select * from class where teacher_id='$Id' and schedule_date>='$date' order by schedule_date ASC") or die("error1");
$check_user1=mysqli_num_rows($res1);
if($check_user1>0){
    $todays_class .='
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
        $todays_class .='
        <tr>
                        <td>1</td>
                        <td>'.$row1["title"].'</td>
                        <td>'.$row1["schedule_date"].'</td> 
                        <td>'.$row1["schedule_time"].'</td> 
                        <td>'.$row1["passcode"].'</td>
                        <td><button type="button" onclick=location.href="'.$row1["link"].'" class="btn btn-outline-success btn-rounded btn-fw">join now</button></td>                 
                        
                        </tr>
                        
        ';
        
    }
	$todays_class .='</tbody>';
}
else
{
    $todays_class .='empty';
}

echo($todays_class."~~~~~".$past_class);
?>

