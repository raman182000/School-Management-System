<?php
$output='';
$conn = mysqli_connect('localhost', 'root', '','cpi');
$search =$_POST['search_txtstr'];
$query = "select * from subjects inner join teachers on subjects.subject_name=teachers.subject where subjects.subject_name like '%$search%' and teachers.status='approved'"; 
$result =mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0) {
	# code...
      $output .= '<h3 class="modal-header">Search Result : '.$search.'</h2>';

 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <div class="card mb-3">
          <div class="row no-gutters">
            <div class="col-md-4">
              <div class="card-img img-fluid"><img src="https://www.gettyimages.in/gi-resources/images/500px/983794168.jpg"></div>
              
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h3 class="card-title">'.$row["subject_name"].'</h3>
                <p class="card-subtitle teacher" id="">-'.$row["Name"].'</p>
                <p>'.$row['short_description'].'</p>
                <p class="card-text price">price: '.$row["price"].'</p>
                <div class="col-md-3 float-right">
                  <a class="btn btn-secondary" href="course.html?id='.$row["subject_id"].'">View</a>
                  <a onclick="addtocart('.$row["subject_id"].')" class="btn btn-secondary float-right">Add to cart</a>
                </div>
                        
              </div>
            </div>
          </div>
        </div>
  ';
 }
 $output .='
            
            <style>
  .teacher
  {
    color:#868e96;
  }
  img
  {
    width:inherit;
    height: inherit;
  }
</style>
 ';

 echo($output);
} else {
	# code...
	echo('not found');
}


?>