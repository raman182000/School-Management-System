<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');
$Id=$_POST['id'];
$past_class='';
$todays_class='';
$date=date("Y-m-d");
//past class
$res=mysqli_query($conn,"select * from class inner JOIN orders on class.teacher_id=orders.Teacher_id WHERE orders.User_Id='$Id' and class.schedule_date<'$date'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
    $past_class .='
        <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Review</th>
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
                        <td><button class="btn btn-outline-success btn-rounded btn-fw" type="button" data-toggle="collapse" data-target="#review'.$row["id"].'" aria-expanded="false" aria-controls="collapseExample">
                        add Review
                      </button></td>
                        </tr>
                        <tr>
                        <td colspan="6">
                        <div class="collapse" id="review'.$row["id"].'"> 
                        <form class="form-inline" id="review_form">                      
                          <div class="row ratings">
                            <div class="col-md-4 star_widgets">
                              <input type="radio" name="rate" id="rate-5" value="5" style="display: none;">
                              <label for="rate-5" class="fas fa-star"></label>
                              <input type="radio" name="rate" id="rate-4" value="4" style="display: none;">
                              <label for="rate-4" class="fas fa-star"></label>
                              <input type="radio" name="rate" id="rate-3" value="3" style="display: none;">
                              <label for="rate-3" class="fas fa-star"></label>
                              <input type="radio" name="rate" id="rate-2" value="2" style="display: none;">
                              <label for="rate-2" class="fas fa-star"></label>
                              <input type="radio" name="rate" id="rate-1" value="1" style="display: none;">
                              <label for="rate-1" class="fas fa-star"></label>
                            </div>
                            <div class="col-md-8">
                            
                                <input type="text" class="form-control mb-2 mr-sm-2" id="review_details" placeholder="Write your review here..">
                                <input type="button" Class="btn btn-gradient-primary mb-2" value="POST" onclick=review_post("'.$row["id"].'")>                               
                            </div>
                            
                          </div>
                          </form>
                      </div>
                      </td></tr>
        ';
    }
	$past_class .='</tbody>';
}
else
{
    $past_class .='empty';
}

//todays class
$res=mysqli_query($conn,"select * from class inner JOIN orders on class.teacher_id=orders.Teacher_id WHERE orders.User_Id='$Id' and class.schedule_date='$date'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
    $todays_class .='
        <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
        ';
    while($row = mysqli_fetch_array($res))
    {
        $todays_class .='
        <tr>
                        <td>1</td>
                        <td>'.$row["title"].'</td>
                        <td>'.$row["schedule_date"].'</td> 
                        <td>'.$row["schedule_time"].'</td> 
                        <td><button type="button" onclick=location.href="'.$row["link"].'" class="btn btn-outline-success btn-rounded btn-fw">join now</button></td>                 
                        
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

