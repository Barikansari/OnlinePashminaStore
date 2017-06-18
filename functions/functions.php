<?php
$db = mysqli_connect("localhost","root","","myshop");


function getPro(){
			global $db;
			if(!isset($_GET['cat'])){
				
		   		$get_products = "select * from products order by rand() LIMIT 0,6";
				$run_products = mysqli_query($db, $get_products);
				
				while ($row_products=mysqli_fetch_array($run_products)){
					
					$pro_id = $row_products['product_id'];
					$pro_title = $row_products['product_title'];
					$pro_cat = $row_products['cat_id'];
					$pro_desc= $row_products['product_desc'];
					$pro_price = $row_products['product_price'];
					$pro_image = $row_products['img1'];

					echo "					
					<div id='single_product'>
					<h3>$pro_title</h3>
					<img src='admin_area/product_images/$pro_image' width='220' height='240' /><br>
					<p><b>Price: Rs $pro_price </b></p>
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
					<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
					
					
					</div>
					";
					
					
					}
		   
			}
}

function getCatPro(){
			global $db;
			if(isset($_GET['cat'])){
				$cat_id = $_GET['cat'];
				
		   		$get_cat_pro = "select * from products where cat_id='$cat_id'";
				$run_cat_pro = mysqli_query($db, $get_cat_pro);
				$count = mysqli_num_rows($run_cat_pro);
				if($count==0){
					echo "<h2>No Products found in this category</h2>";			}
				
				while ($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
					
					$pro_id = $row_cat_pro['product_id'];
					$pro_title = $row_cat_pro['product_title'];
					$pro_cat = $row_cat_pro['cat_id'];
					$pro_desc= $row_cat_pro['product_desc'];
					$pro_price = $row_cat_pro['product_price'];
					$pro_image = $row_cat_pro['img1'];

					echo "					
					<div id='single_product'>
					<h3>$pro_title</h3>
					<img src='admin_area/product_images/$pro_image' width='220' height='240' /><br>
					<p><b>Price: Rs $pro_price </b></p>
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
					<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
					
					
					</div>
					";
					
					
					}
		   
			}
}


		   
function getCats(){
			global $db;   	
			$get_cats = "select * from categories";
			$run_cats = mysqli_query($db, $get_cats);
			while ($row_cats=mysqli_fetch_array($run_cats)){
				$cat_id = $row_cats['cat_id'];
				$cat_title = $row_cats['cat_title'];
           		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
			}
				
			   
			   
			   
			   
			   
			   }
		   
		   
		   
		   
		   
		   ?>
           
           
	
	
	
	
	

