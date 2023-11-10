<?php include('header.php')?>;  

<?php 

$oid=$_SESSION['FOOD_USER_ID'];
$sql="SELECT order_master.*, order_status.order_status as order_status_str from order_master,order_status 
where order_master.order_status=order_status.id and order_master.user_id='$oid' ";
$result=mysqli_query($con, $sql);


?>

<?php




?>  
<style>

.table img{

width:60px;


}


</style>

<div class="container">
<div class="card">
            <div class="card-body">
              <h4 class="card-title">Data table</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>  

                      <tr>
                            <th>Order No</th>
                            <th>Price</th>
                            <th>Address</th>
                            
                            <th>Order Status</th>
                            <th>Payment Status</th>
                            <th>Dish Details</th>
                        </tr>
                      </thead>

                      <tbody>
              <?php   
               
                         if(mysqli_num_rows($result)>0) 


                           {
               

                          while($row=mysqli_fetch_assoc($result)) 

                 

                           {


                            ?>
               
                              <tr>
                            <td><?php echo $row['id']?> 
                            <br> 
                            <a href="download_invoice.php?id=<?php echo $row['id']?>"><img src="assets\img\icon-img/pdf.png" alt=""></a>
                               
                          </td> 
                            <td><?php echo $row['total_price']?></td>
                            <td><?php echo $row['address']?></td>
                            <td><?php echo $row['order_status_str']?></td>
                            <td><?php echo $row['payment_status']?></td> 
                            <td>
                        <?php  
                        
                        $dish_data=dishdetails($row['id']); 
                          //prx($dish_data);
                        
                        ?>        
                            <table> 
                                <thead>  
                                <th>Price</th>
                                <th>Name</th>
                                <th>Payment Status</th>
                                <th>Added On</th>

                                </thead>
                             
                               <tbody>  
                            <?php  
                            
                            foreach($dish_data as $list)
                            
                            ?>


                              <tr>  
                              <td><?php echo $list['total_price']?></td>
                              <td><?php echo $list['name']?></td>
                              <td><?php echo $list['payment_status']?></td>
                              <td><?php echo $list['added_on']?></td>

                              </tr>
                              </tbody>    
                              </table>


                            

                            </td>
                           
                      
                            </tr>
               
               
               
               
               
               
                             <?php




                           }
                          }
                           ?>

                
                      </tbody>
                    </table>
                  </div>
				</div>
              </div>
            </div>
          
          
          </div>

          </div>



























<?php include('footer.php')?>