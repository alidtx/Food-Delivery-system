<?php 

include ("header.php");



$getFullCart=getFullCart(); 


if(count($getFullCart)>0) 


{

}else{


redirect('index.php');


}    

$userDetails=userDetailsById();

if(isset($_POST['place_order'] )) 

{   



  
if(isset($_POST['full_name']) && !empty($_POST['full_name'])  && isset($_POST['email']) && !empty($_POST['email']) && 
isset($_POST['mobile']) && !empty($_POST['mobile']) && isset($_POST['address']) && !empty($_POST['address'])
&& isset($_POST['zip']) && !empty($_POST['zip'])

) 

{
    $user_id=$_SESSION['FOOD_USER_ID'];
    $name=$_POST['full_name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    $zip=$_POST['zip'];  
    $added_on=date('Y-d-m');
    
    
    
     $dataInsert="INSERT into order_master(  user_id, name, email, mobile, address, total_price, payment_status, order_status, added_on)
    VALUES('$user_id','$name','$email','$mobile','$address','$totalPrice', 'pending', '1', '$added_on')
    ";
    
    mysqli_query($con, $dataInsert);
    
    $insert_id=mysqli_insert_id($con);
    
    foreach($getFullCart as $key=>$val)
    {
        $insertData="INSERT into order_detail (order_id, dish_details_id, price, qty) VALUES ('$insert_id', '$key', '".$val['price']."', '".$val['qty']."') ";
         
         mysqli_query($con, $insertData);  
         include('smtp/PHPMailerAutoload.php'); 
        $OrderEmailHtml=OrderEmail($insert_id); 
       
        $userDetailsById=userDetailsById(); 
        $email=$userDetailsById['email'];
        email_verify($email, $OrderEmailHtml, 'Invoice');
         redirect("success.php");

    }
    
    }

}


//prx($getFullCart);




?>

<div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="shop.php">Home</a></li>
                        <li class="active"> Checkout </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- checkout-area start -->
        <div class="checkout-area pb-80 pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-1">Checkout method</a></h5>
                                    </div>
                                    <div id="<?php echo $box_id?>" class="panel-collapse collapse ">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="checkout-register">
                                                        <div class="title-wrap">
                                                            <h4 class="cart-bottom-title section-bg-white">CHECKOUT AS A GUEST OR REGISTER</h4>
                                                        </div>
                                                        <div class="register-us">
                                                            <ul>
                                                                <li><input type="checkbox"> Checkout as Guest</li>
                                                                <li><input type="checkbox"> Register</li>
                                                            </ul>
                                                        </div>
                                                        <h6>REGISTER AND SAVE TIME!</h6>
                                                        <div class="register-us-2">
                                                            <p>Register with us for future convenience.</p>
                                                            <ul>
                                                                <li>Fast and easy checkout</li>
                                                                <li>Easy access to your order history and status</li>
                                                            </ul>
                                                        </div>
                                                        <a href="#">Apply Coupon</a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="checkout-login">
                                                        <div class="title-wrap">
                                                            <h4 class="cart-bottom-title section-bg-white">LOGIN</h4>
                                                        </div>
                                                        <p>Already have an account? </p>
                                                        <span>Please log in below:</span>
                                                        <form>
                                                            <div class="login-form">
                                                                <label>Email Address * </label>
                                                                <input type="email" name="email">
                                                            </div>
                                                            <div class="login-form">
                                                                <label>Password *</label>
                                                                <input type="password" name="email">
                                                            </div>
                                                        </form>
                                                        <div class="login-forget">
                                                            <a href="#">Forgot your password?</a>
                                                            <p>* Required Fields</p>
                                                        </div>
                                                        <div class="checkout-login-btn">
                                                            <a href="#">Login</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>2.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-2">billing information</a></h5>
                                    </div>
                                    <div id="payment-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="row">
                                             
                                                    <div class="col-lg-12 col-md-6"> 
                                                        
                                        <form action="" method="post">
                                        <div class="billing-info">
                                            <label>Full Name</label>
                                            <input type="text" name="full_name" value="<?php echo $userDetails['name']?>">  
                                            
                                        </div>
                                        <div class="billing-info">
                                            <label> Email Address</label>
                                            <input type="email" name="email"  value="<?php echo $userDetails['email']?>">
                                        </div>

                                        <div class="billing-info">
                                            <label> Address</label>
                                            <input type="text" name="address"  >
                                        </div>
                                        <div class="billing-info">
                                            <label> Phone</label>
                                            <input type="text" name="mobile"  value="<?php echo $userDetails['mobile']?>" >
                                        </div>    

                                    
                                        <div class="billing-info">
                                            <label>Zip/Code</label>
                                            <input type="text" name="zip">
                                        </div>     
                                            
                                        
                                        
                                    </div>
                                                </div>
                                          
                                                <div class="billing-back-btn">
                                               
                                                    <div class="billing-btn">  
                                                        <a href="order_history.php"><button type="submit" name="place_order">Place Order</button></a>
                                                        
                                                    </div>  
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   













                               
                                
                             
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="checkout-progress"> 
                        <h4>Checking Out</h4>
                      
                           


                    <?php  
                    
                    foreach($getFullCart as $list) 

                    {

                    ?> 
               <ul>       
                <li class="single-shopping-cart">
                <div class="shopping-cart-img">
                    <a href="#"><img alt="" src="uploads/<?php echo $list['image']?>"></a> 
                    <p><?php echo $list['dish'] ?></p>
                </div>
                <div class="shopping-cart-title">
                    <h4><a href="#"></a></h4>
                    <h6>Qty:<?php echo $list['qty']?></h6>
                    <span></span>
                </div>
                <div class="shopping-cart-delete">
                 
                </div>
                </li>
                </ul>    
                
                    
                    <?php



                    }
                     
                    ?>       
                            
                            <div class="shopping-cart-total">
                            <h4>Shipping : <span>$20.00</span></h4>
                            <?php $Shipping=20; ?>

                            <h4>Total :<?php  $total=$list['qty']*$list['price']; $Finlprice=count($getFullCart)*$total; echo $Finlprice ?> &<span class="shop-total"></span></h4>
                        </div>    
                         
                         
                       
                       
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
include("footer.php");
?>