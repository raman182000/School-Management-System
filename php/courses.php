<?php

$output='';
$conn = mysqli_connect('localhost', 'root', '','cpi');
$search =$_POST['search_idstr'];
$query = "select * from subjects where subject_id = '$search'"; 
$result =mysqli_query($conn,$query);
if(mysqli_num_rows($result) > 0) 
{
	$row = mysqli_fetch_array($result);
	$output .= '
    <link rel="stylesheet" type="text/css" href="css/course.css">
	<div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        
                        <div class="preview-pic tab-content">
                          <div class="tab-pane active" id="pic-1"><img src="http://placekitten.com/400/252" /></div>
                          
                        </div>
                
                        
                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">'.$row["subject_name"].'</h3>
                        <p class="product-description">'.$row["short_description"].'</p>
                        <p class="price">price: <span>'.$row['price'].'</span></p>
                        <div class="action">
                            <button onclick="addtocart('.$row["subject_id"].')" class="add-to-cart btn btn-success" type="button">add to cart</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="content-area">
                <h3 class="product-title">Description</h3>
                <p class="product-description">'.$row["long_description"].'</p>
            </div>
	';
}
echo($output);
?>