<?php
include("includes/db_connection.php");
include("functions/functions.php");
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>myshop</title>
<link rel="stylesheet" href="styles/style.css" media="all">
</head>

<body> 
	<!-- Main container starts-->
	<div class="main_wrapper"> 
    		<!--Header Starts-->
		   <div class="header_wrapper">
          <h1>Bhagrathi Handicraft<var><span class="slogan"> Best pashmina store. </span></var></h1>
            </div>
            <!--Header Ends-->
            <!--Navigation Bar Starts-->
           <div id="navbar">
           		
                <ul id="menu">
                	<li><a href="index.php">Home</a></li>
                    <li><a href="all_products.php">All Products</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                    <li><a href="user_register.php">Sign Up</a></li>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
                <div id="form">
                	<form method="get" action="result.php" encrypt="multipart/form-data">
                    <input type="text" name="user_query" placeholder="Search a product"/>
                    <input type="submit" name="search" value="Search"/>
                </div>
           
            </div>
           <!--Navigation Bar Ends-->
           
           <div class="content_wrapper">
           <div id="left_sidebar">
           <div id="sidebar_title">Categories</div>
           <ul id="items">
           <?php getCats(); ?>
           </ul>
           </div>
           
           
           <div id="right_content">
           			<div id="headline">
                    	<div id="headline_content">
                        <b>Welcome Guest!</b>
                    	<b style="color:yellow;">Shopping Cart:</b>
                    	<span>- Item: - Price:</span>
                    </div>
           </div>
           <div id="product box">
          <?php 
		  getPro();
		  getcatpro();
		   ?>
           </div>
           
           </div>
           
           
           <div class="footer">
          <h1 style="color:#000; padding-top:30px; text-align:center;">&copy; 2016 - By Www.ShopOnline.com</h1>
           
           </div>
    
    
    
    
    </div>
</body>
</html>