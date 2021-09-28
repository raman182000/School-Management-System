<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');
$limit_per_page=9;
$page="";
if(isset($_POST['page']))
{
	$page=$_POST['page'];
}
else
{
	$page=1;
}

$offset= ($page - 1) * $limit_per_page;
$query= "select * from teachers inner join subjects on teachers.subject=subjects.subject_name and teachers.class_for=subjects.class where subjects.subject_name like '%{$_POST['search']}%' or subjects.short_description like '%{$_POST['search']}%' or subjects.long_description like '%{$_POST['search']}%' LIMIT {$offset},{$limit_per_page}";
$result=mysqli_query($conn,$query) or die("error");
$output='';
if(mysqli_num_rows($result) > 0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		$price=0;
		$price=$row['price']+100;
		$output .= '
			<div class="col-md-6 col-lg-4 col-sm-6 m-b30">
				<div class="cours-bx">
					<div class="action-box">
						<img src="assets/images/courses/pic1.jpg" alt="">
						<a href="courses-details.html?id='.$row["T_Id"].'" class="btn btn-primary">Read More&nbsp;</a>
						<a href="onclick="addtocart('.$row["T_Id"].')"" class="btn btn-primary btn1">add to Cart</i></a>
					</div>
					<div class="info-bx text-center">
						<h5><a href="courses-details.html?id='.$row["T_Id"].'">'.$row["subject_name"]."-Class ".$row["class_for"].'</a></h5>
						<span>-By '.$row["Name"].'</span>
					</div>
					<div class="cours-more-info">
						<div class="review">
							<span>3 Review</span>
							<ul class="cours-star">
								<li class="active"><i class="mdi mdi-star"></i></li>
								<li class="active"><i class="mdi mdi-star"></i></li>
								<li class="active"><i class="mdi mdi-star"></i></li>
								<li><i class="mdi mdi-star"></i></li>
								<li><i class="mdi mdi-star"></i></li>
							</ul>
						</div>
						<div class="price">
							<del>Rs.'.$price.'</del>
							<h5>Rs.'.$row["price"].'</h5>
						</div>
					</div>
				</div>
			</div>
			';
	}
	$query_total="select * from teachers inner join subjects on teachers.subject=subjects.subject_name and teachers.class_for=subjects.class where subjects.subject_name like '%{$_POST['search']}%' or subjects.short_description like '%{$_POST['search']}%' or subjects.long_description like '%{$_POST['search']}%'";
	$result_total=mysqli_query($conn,$query_total) or die("error");
	$total_record=mysqli_num_rows($result_total);
	$total_pages=ceil($total_record/$limit_per_page);
	$output .='<div class="col-lg-12 m-b20">
	<div class="pagination-bx rounded-sm gray clearfix">
		<ul class="pagination" id="pagination">';
	for ($i=1; $i <=$total_pages; $i++)
	 { 
		if($i==$page)
		{
			$class_name="active";
		}
		else
		{
			$class_name="";
		}
		$output .="
							<li class='{$class_name}'><a id='{$i}' href='#'>{$i}</a></li>
						";
	}
	$output .='</ul>
			</div>
		</div>';
	
	
}
echo($output);
?>
