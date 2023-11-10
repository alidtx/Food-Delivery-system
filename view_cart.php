<?php include('header.php'); 




?>


<style>
.product-thumbnail img{
    width: 57px;

    }

</style>
<div class="cart-main-area pt-95 pb-100">
            <div class="container">  


    <?php   
     $getFullCart=getFullCart();
    
    if(count($getFullCart)>0) 
    {
     ?>
     
       <h3 class="page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#" method="post">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Until Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>  
                         
                                        <tr> 

                               <?php  
                               
                               foreach($getFullCart as $key=>$list)  

                               {

                              ?>
                              
                              
                                       
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="uploads/<?php echo $list['image']?>" alt=""></a>
                                            </td>
                                            <td class="product-name"><a href="#"><?php echo $list['dish']?> </a></td>
                                            <td class="product-price-cart"><span class="amount"><?php echo $list['price']?></span>$</td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="qty[<?php echo $key?>][]" value="<?php echo $list['qty']?>">
                                                </div>
                                            </td>  

                                            
                                            <td class="product-subtotal"><?php echo $list['price']*$list['qty'] ?>$</td>
                                            <td class="product-remove">
                                                <a href="#"><i class="fa fa-pencil"></i></a>
                                                <a href="#"><i class="fa fa-times"></i></a>
                                           </td>
                                        </tr>
                                        <?php

                                        }
                                       ?> 
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="shop.php">Continue Shopping</a>
                                        </div>
                                        <div class="cart-clear">
                                            <button name="update_cart">Update Shopping Cart</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>   

                <?php

               }else{

             Echo "Cart is Empty!!!! Please add some product";

               }
             ?>


            </div>
        </div>
        

























<?php include('footer.php')?>