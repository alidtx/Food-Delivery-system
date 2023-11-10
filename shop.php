<?php 

include('header.php');

?>  

<style>
.dish_radio{

    height: 10px;
    width: 15px;

}  
.product-price-wrapper .qty{

    width: 41%;
    height: 20px; 
    border:2px solid black;


}  
.product-price-wrapper .fa-cart-plus {

  cursor:pointer;


}



</style>
<?php 

?>

<div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Shop Grid Style </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="shop-page-area pt-100 pb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                      
                        
                        <div class="grid-list-product-wrapper">
                            <div class="product-grid product-view pb-20">
                                <div class="row">   


           <?php  
           $selectProduct="SELECT * from dish where status=1"; 
           
           if(isset($_GET['cat_id']) && $_GET['cat_id']>0) 

           {

         

         $cat_id=$_GET['cat_id'];

         $selectProduct.=" and category_id='$cat_id' ";

           }  
           
           $result=mysqli_query($con, $selectProduct);  

           while($product_row=mysqli_fetch_assoc($result))   


           {

           ?>
        <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
        <div class="product-wrapper">
            <div class="product-img">
                <a href="product-details.html">
                    <img src="uploads/<?php echo $product_row['image']?>" alt="">
                </a>
            </div>
            <div class="product-content">
                <h4>
                    <a href="product-details.html"><?php echo $product_row['dish']?> </a>
                </h4>   

                
                <div class="product-price-wrapper">  
                    <?php  
                    
                $selectDish="SELECT * from dish_details where status=1 and dish_id='".$product_row['id']."' "; 
                 $res=mysqli_query($con, $selectDish);  
           
             while($attr_row=mysqli_fetch_assoc($res))  
             
             {
                
                echo " <input type='radio' class='dish_radio' id='radio".$product_row['id']."' name='radio_".$product_row['id']."'  value='".$product_row['id']."'> ";
                echo $attr_row['attribute'].'&nbsp;';  
                echo $attr_row['price'].'$';
                
             }
             ?>   

           <div class="product-price-wrapper">    
             <select name="" id='qty<?php echo $product_row['id']?>'  class="qty">
             <option value="0">Qty</option> 
              <?php 
               for($i=1; $i<=10; $i++)

               {

               echo "<option >$i</option>";

               }
              
              
              ?>  
              
             
             </select>    
             <i class="fa fa-cart-plus aria-hidden='true'" onclick="add_to_cart('<?php echo $product_row['id']?>','add')" > </i> 
             
            </div>
                    
                     
                </div>
            </div>
        </div>
      </div>   
           
           
           
           <?php



           }
           
           
           ?>

                    
                    
                </div>
            </div>
            
        </div>
    </div>
    <div class="col-lg-3">
        <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
            <div class="shop-widget">
                <h4 class="shop-sidebar-title">Shop By Categories</h4>
                <div class="shop-catigory">
                    <ul id="faq">  

        <?php  
        
        $selectCat="SELECT * from category  where status=1";  

        $result=mysqli_query($con, $selectCat);

        while($cat_row=mysqli_fetch_assoc($result))  
        
        {
         ?>
         <li> <a href="shop.php?cat_id=<?php echo $cat_row['id']?>"><?php echo $cat_row['category'] ?></a> </li>
         <?php


        }


        
        ?>

                                        
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>







<script>




</script>










<?php include('footer.php')?>