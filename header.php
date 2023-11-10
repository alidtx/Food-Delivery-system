<?php 
session_start();  
include('connection.php'); 
include('function.php');
$totalPrice=0;
$cartArray=getFullCart();

//prx($cartArray);

if(isset($_POST['update_cart'])) 


{  
    foreach($_POST['qty'] as $key=>$val) 

  {
    if(isset($_SESSION['FOOD_USER_ID']))

    {   

    $UpdateCart="UPDATE dish_cart set qty='$val[0]' where dish_detail_id='$key' and user_id".$_SESSION['FOOD_USER_ID'];
    mysqli_query($con,  $UpdateCart);   

     }else {

  

    $_SESSION['cart'][$key]['qty']=$val[0];

  
     } 
    } 
}








foreach($cartArray as $list)
  {

    $totalPrice=$totalPrice+$list['qty']*$list['price'];

    
  } 

  $TotaldishItem=count($cartArray);  





?>  


<style>

.shopping-cart-img img{

height: 60px;

}

</style>


<!doctype html>
<html class="no-js" lang="zxx">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Billy - Food & Drink eCommerce Bootstrap4 Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/chosen.min.css">
        <link rel="stylesheet" href="assets/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/simple-line-icons.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <link rel="stylesheet" href="custom.css">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script> 

    </head>
    <body>
        <!-- header start -->
        <header class="header-area">
            <div class="header-top black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12 col-sm-4">
                            <div class="welcome-area">
                                <p>Default welcome msg! </p>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 col-sm-8">
                            <div class="account-curr-lang-wrap f-right">
                                <ul>
                                    
                                    
                                    <li class="top-hover"><a href="#">Setting  <i class="ion-chevron-down"></i></a>
                                        <ul> 
                                        <li><a href="order_history.php">Order History</a></li>
                                            <li><a href="profile.php">Profile</a></li>
                                            <li><a href="login.php">Login</a></li>
                                            <li><a href="logout.php">LogOut</a></li>
                                           
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12 col-sm-4">
                            <div class="logo">
                                <a href="index.html">
                                    <img alt="" src="assets/img/logo/logo.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12 col-sm-8">
                            <div class="header-middle-right f-right">
                                <div class="header-login">
                                    <a href="login.php">
                                        <div class="header-icon-style">
                                            <i class="icon-user icons"></i>
                                        </div>
                                        <div class="login-text-content">  
                                           <?php  
                                           
                                           if(isset($_SESSION['FOOD_USER_NAME'])) 
                                           {

                                           echo "Welcome".'&nbsp;'.$_SESSION['FOOD_USER_NAME'];

                                           }else{
                                           ?><p>Register <br> or <span>Sign in</span></p><?php

                                           }
                                           
                                           ?>

                                            
                                        </div>
                                    </a>
                                </div>
                                <div class="header-wishlist">
                                   &nbsp;
                                </div>  

                          
                           
                             
                             
                                <div class="header-cart">
                                    <a href="#">
                                        <div class="header-icon-style">
                                        <i class="icon-handbag icons"></i>
                                             
                                         
                                        <span class="count-style" id="totalItem"><?php if(isset($TotaldishItem)) echo $TotaldishItem?></span>                                  
                                        </div>
                                        <div class="cart-text">
                                            <span class="digit">My Cart</span>
                                            <span class="cart-digit-bold" id="totalPrice"><?php if(isset($totalPrice))  echo $totalPrice?>$</span>
                                        </div>
                                    </a>  
                                    <div class="shopping-cart-content"> 
                                    <?php  
                               
                              
                                 
                   

                        
                    

                   

                   
                                      
                     foreach($cartArray as $list)
                     { 

                     ?>
                      
                    <ul>      
                    <li class="single-shopping-cart">
                    <div class="shopping-cart-img">
                        <a href="#"><img alt="" src="uploads/<?php echo $list['image'] ?>"></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4 id="dish"><a href="#"><?php echo $list['dish']?></a></h4>
                        <h6>Qty: <?php echo $list['qty']?></h6>
                        <span><?php echo $list['price']?></span>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="#"><i class="ion ion-close"></i></a>
                    </div>
                </li>
                    </ul>
                     
                     
                           
                    <?php 


                 }
 
                   
                 ?>                
                 <div class="shopping-cart-total">
                    <h4>Shipping :20$ <span><?php $shiping=20?></span></h4>
                    <h4>Total : <span class="shop-total"><?php echo $totalPrice+$shiping?>$</span></h4>
                </div>                        
                                        <div class="shopping-cart-btn">
                                            <a href="view_cart.php">view cart</a>
                                            <a href="checkout.html">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                           
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom transparent-bar black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about-us.html">about</a></li>
                                        <li><a href="contact.html">contact us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area-start -->
			<div class="mobile-menu-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="mobile-menu">
								<nav id="mobile-menu-active">
									<ul class="menu-overflow" id="nav">
										<li><a href="index.html">Home</a></li>
										<li><a href="index.html">Home</a></li>
										<li><a href="index.html">Home</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- mobile-menu-area-end -->
        </header>