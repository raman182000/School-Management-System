<?php
$conn = mysqli_connect('localhost', 'root', '','cpi');
$userid=$_POST['user'];
$output='';
$query ="SELECT *,SUBSTRING(`Short_Desc`, 1, 100) as Short_Desc1 FROM cart INNER JOIN courses on cart.cid = courses.Sub_Id where cart.userid='$userid'";
$res=mysqli_query($conn,$query);
$res1=mysqli_num_rows($res);
if ($res1>0) {
	$price_ttl=0;
	$output .='<div class="col-md-12 col-lg-8 col-8 mx-auto main_cart mb-lg-0 mb-5 shadow">';
	while ($row = mysqli_fetch_assoc($res)) {
		# code...
		$output .= '
		<div class="card p-4">

						<div class="row">
							<!-- cart images div -->
							<div class="col-md-5 col-11 mx-auto bg-light d-flex justify-content-center align-items-center shadow product_img">
								<img src="images/course/'.$row['Image_Path'].'" class="img-fluid" alt="cart img">
							</div>
							<div class="col-md-7 col-11 mx-auto px-4 mt-2">
								<div class="row">
									<!-- product name  -->
									<div class="col-6 card-title">
										<h1 class="mb-4 product_name">'.$row["Name"].'</h1>
										<p class="mb-2">'.$row["Short_Desc1"].'</p>
										
									</div>

								</div>
								<!-- //remover move and price -->
								<div class="row">
									<div class="col-8 d-flex justify-content-between remove_wish">
										<p><i class="fas fa-trash-alt"></i> REMOVE ITEM</p>

									</div>
									<div class="col-4 d-flex justify-content-end price_money">
										<h3>Rs.<span id="itemval">'.$row["Price"].'</span></h3>
									</div>
								</div>
							</div>
						</div>
					</div>
		';
		$price_ttl=$price_ttl + $row['Price'];
	}
	$output .= '</div>
				<div class="col-md-12 col-lg-4 col-11 mx-auto mt-lg-0 mt-md-5">
					<div class="right_side p-3 shadow bg-white">
						<h2 class="product_name mb-5">The Total Amount Of</h2>
						<div class="price_indiv d-flex justify-content-between">
						<p>Product amount</p>
						<p>$<span id="product_total_amt">'.$price_ttl.'</span></p>
						</div>
						<hr />
						<div class="total-amt d-flex justify-content-between font-weight-bold">
						<p>The total amount of (TO Pay)</p>
						<p>$<span id="total_cart_amt">'.$price_ttl.'</span></p>
						</div>
						<button class="btn btn-primary text-uppercase">Checkout</button>
					</div>
					
					<div class="discount_code mt-3 shadow">
						<div class="card">
						<div class="card-body">
						<a class="d-flex justify-content-between" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
						Add a discount code (optional)
						<span><i class="fas fa-chevron-down pt-1"></i></span>
						</a>
						<div class="collapse" id="collapseExample">
						<div class="mt-3">
						<input type="text" name="" id="discount_code1" class="form-control font-weight-bold" placeholder="Enter the discount code">
						<small id="error_trw" class="text-dark mt-3">code is thapa</small>
						</div>
						<button class="btn btn-primary btn-sm mt-3" onclick="discount_code()">Apply</button>
						</div>
						</div>
						</div>
					</div>
				
				</div>
				';
}
else
{
	$output .= '<div class="container empty-cart" id="empty_cart">
  <br>
  <h2 class="cart-title"> YOUR CART IS EMPTY</h2>
  <img class="banner-image" src="images/empty_cart.svg">
  <a href="index.html"><button type="submit" class="form-control-submit-button">Explore</button></a>
</div>';
}
echo($output);
?>