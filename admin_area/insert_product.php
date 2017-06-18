<?php
include("includes/db_connection.php");
?>


<!DOCTYPE HTML>
<html> 
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

</head>

<body bgcolor="#999999">
<form method="post" action="insert_product.php" enctype="multipart/form-data">
	<table width="700" align="center" border="1" bgcolor="#3399CC">
    	<tr align="center">
        	<td colspan="2"><h1>Insert New Product:</h1></td>
            
        </tr>
        <tr>
        	<td align="right"><b>Product Title</b></td>
        	<td><input type="text" name="product_title" size="50"/></td>
        </tr>
        <tr>
        	<td align="right"><b>Product Category</b></td>
        	<td>
            <select name="product_cat">
            	<option>Select a Category</option>
                <?php
				$get_cats = "select * from categories";
				$run_cats = mysqli_query($con, $get_cats);
				while ($row_cats=mysqli_fetch_array($run_cats)){
				$cat_id = $row_cats['cat_id'];
				$cat_title = $row_cats['cat_title'];
           		echo "<option value='$cat_id'>$cat_title</option>";
			}
				?>
             
            </select>
            </td>
            </tr>
            <tr>
            <td align="right"><b>Product Image 1</b></td>
        	<td><input type="file" name="img1"/></td>
        </tr>
        <tr>
        
        	<td align="right"><b>Product Image 2</b></td>
        	<td><input type="file" name="img2"/></td>
        </tr>
        <tr>
        	<td align="right"><b>Product Price</b></td>
        	<td><input type="text" name="product_price"/></td>
        </tr>
        <tr>
        <td align="right"><b>Product Description</b></td>
        	<td><textarea name="product_desc" cols="35" rows="10"></textarea></td> 
        </tr>
        <tr>
        	<td align="right"><b>Product Keyboards</b></td>
        	<td><input type="text" name="product_keywords" size="50"/></td>
        </tr>
        <tr align="center">
        	<td colspan="2"><input type="submit" name="insert_product" value="Insert Product"/></td>
        </tr>
   </form>
</body>
</html>
<?php
	if(isset($_POST['insert_product'])){
		//text data variables
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$status = 'on';
		$product_keywords = $_POST['product_keywords'];
		
		
		//image names
		//$product_img1 = $_POST['img1'];
		$product_img1 = $_FILES['img1']['name'];
		$product_img2 = $_FILES['img2']['name'];
		
		//Image temp names 
		$temp_name1 = $_FILES['img1']['tmp_name'];
		$temp_name2 = $_FILES['img2']['tmp_name'];
		
		if($product_title="" || $product_cat="" || $product_price="" || $product_desc="" || $product_keywords=""){
			
			echo "<script>alert('please fill all the fields!')</script>";
			
			}
		else{
		
		//uploading images to its folder
		move_uploaded_file($temp_name1,"product_images/$product_img1");
		move_uploaded_file($temp_name2,"product_images/$product_img2");
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
	
$insert_product = "INSERT INTO products VALUES (NULL,'$product_cat',NOW(),'$product_title','$product_img1','$product_img2','$product_price','$product_desc','$status')";

	
		
		$run_product = mysqli_query($con, $insert_product);
		
		if($run_product){
			echo "<script>alert('product inserted successfully')</script>";	
		}
		
		

	}
	}
?>