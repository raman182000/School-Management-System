<?php

$output='';
$conn = mysqli_connect('localhost', 'root', '','cpi');
$search =$_POST['search_idstr'];
$query = "select * from teachers inner join subjects on teachers.subject=subjects.subject_name where T_Id='$search'"; 
$result =mysqli_query($conn,$query);
if(mysqli_num_rows($result) > 0) 
{
	$row = mysqli_fetch_array($result);
	$price=$row['price']+100;
	$output .= '
    <div class="section-area section-sp1">
                <div class="container">
					 <div class="row d-flex flex-row-reverse">
						<div class="col-lg-3 col-md-4 col-sm-12 m-b30">
							<div class="course-detail-bx">
								<div class="course-price">
									<del>Rs.'.$price.'</del>
									<h4 class="price">'.$row["price"].'</h4>
								</div>	
								<div class="course-buy-now text-center">
									<a href="#" class="btn btn-primary radius-xl text-uppercase">Buy Now This Courses</a>
									<a href="#" class="btn btn-primary radius-xl text-uppercase mt-3">Add To Cart</a>
								</div>
								<div class="teacher-bx">
									<div class="teacher-info">
										<div class="teacher-thumb">
											<img src="assets/images/testimonials/pic1.jpg" alt=""/>
										</div>
										<div class="teacher-name">
											<h5>'.$row["Name"].'</h5>
											<span>'.$row["subject"].' Teacher</span>
										</div>
									</div>
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
									<div class="price categories">
										<span>Categories</span>
										<h5 class="text-primary">Frontend</h5>
									</div>
								</div>
								<div class="course-info-list scroll-page">
									<ul class="navbar">
										<li><a class="nav-link" href="#overview"><i class="mdi mdi-zip-box"></i>Overview</a></li>
										<li><a class="nav-link" href="#instructor"><i class="mdi mdi-account-box"></i>Instructor</a></li>
										<li><a class="nav-link" href="#reviews"><i class="mdi mdi-comment-account"></i>Reviews</a></li>
									</ul>
								</div>
							</div>
						</div>
					
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="courses-post">
								<div class="ttr-post-media media-effect">
									<a href="#"><img src="assets/images/blog/default/thum1.jpg" alt=""></a>
								</div>
								<div class="ttr-post-info">
									<div class="ttr-post-title ">
										<h2 class="post-title">'.$row["subject_name"]."-Class ".$row["class_for"].'</h2>
									</div>
									<div class="ttr-post-text">
										<p>'.$row["short_description"].'</p>
									</div>
								</div>
							</div>
							<div class="courese-overview" id="overview">
								<h4>Overview</h4>
								<div class="row">
									<div class="col-md-12 col-lg-4">
										<ul class="course-features">
											<li><i class="ti-book"></i> <span class="label">Lectures</span> <span class="value">8</span></li>
											<li><i class="ti-help-alt"></i> <span class="label">Quizzes</span> <span class="value">1</span></li>
											<li><i class="ti-time"></i> <span class="label">Duration</span> <span class="value">60 hours</span></li>
											<li><i class="ti-stats-up"></i> <span class="label">Skill level</span> <span class="value">Beginner</span></li>
											<li><i class="ti-smallcap"></i> <span class="label">Language</span> <span class="value">English</span></li>
											<li><i class="ti-user"></i> <span class="label">Students</span> <span class="value">32</span></li>
											<li><i class="ti-check-box"></i> <span class="label">Assessments</span> <span class="value">Yes</span></li>
										</ul>
									</div>
									<div class="col-md-12 col-lg-8">
										<h5 class="m-b5">Course Description</h5>
										<p>'.$row["long_description"].'</p>
									</div>
								</div>
							</div>
							<div class="" id="instructor">
								<h4>Instructor</h4>
								<div class="instructor-bx">
									<div class="instructor-author">
										<img src="assets/images/testimonials/pic1.jpg" alt="">
									</div>
									<div class="instructor-info">
										<h6>'.$row["Name"].' </h6>
										<span>Professor</span>
										<ul class="list-inline m-tb10">
											<li><a href="#" class="btn sharp-sm facebook"><i class="mdi mdi-facebook-box"></i></a></li>
											<li><a href="#" class="btn sharp-sm twitter"><i class="mdi mdi-twitter-box"></i></a></li>
											<li><a href="#" class="btn sharp-sm linkedin"><i class="mdi mdi-linkedin-box"></i></a></li>
											<li><a href="#" class="btn sharp-sm google-plus"><i class="mdi mdi-google-plus-box"></i></a></li>
										</ul>
										<p class="m-b0">'.$row["teacher_about"].'</p>
									</div>
								</div>
							</div>
							<div class="" id="reviews">
								<h4>Reviews</h4>
								
								<div class="review-bx">
									<div class="all-review">
										<h2 class="rating-type">3</h2>
										<ul class="cours-star">
											<li class="active"><i class="mdi mdi-star"></i></li>
											<li class="active"><i class="mdi mdi-star"></i></li>
											<li class="active"><i class="mdi mdi-star"></i></li>
											<li><i class="mdi mdi-star"></i></li>
											<li><i class="mdi mdi-star"></i></li>
										</ul>
										<span>3 Rating</span>
									</div>
									<div class="review-bar">
										<div class="bar-bx">
											<div class="side">
												<div>5 star</div>
											</div>
											<div class="middle">
												<div class="bar-container">
													<div class="bar-5" style="width:90%;"></div>
												</div>
											</div>
											<div class="side right">
												<div>150</div>
											</div>
										</div>
										<div class="bar-bx">
											<div class="side">
												<div>4 star</div>
											</div>
											<div class="middle">
												<div class="bar-container">
													<div class="bar-5" style="width:70%;"></div>
												</div>
											</div>
											<div class="side right">
												<div>140</div>
											</div>
										</div>
										<div class="bar-bx">
											<div class="side">
												<div>3 star</div>
											</div>
											<div class="middle">
												<div class="bar-container">
													<div class="bar-5" style="width:50%;"></div>
												</div>
											</div>
											<div class="side right">
												<div>120</div>
											</div>
										</div>
										<div class="bar-bx">
											<div class="side">
												<div>2 star</div>
											</div>
											<div class="middle">
												<div class="bar-container">
													<div class="bar-5" style="width:40%;"></div>
												</div>
											</div>
											<div class="side right">
												<div>110</div>
											</div>
										</div>
										<div class="bar-bx">
											<div class="side">
												<div>1 star</div>
											</div>
											<div class="middle">
												<div class="bar-container">
													<div class="bar-5" style="width:20%;"></div>
												</div>
											</div>
											<div class="side right">
												<div>80</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						
					</div>
				</div>
            </div>
    ';
}
echo($output);
?>