<?php  
include('header.php');



$SelectaCat="SELECT * from category order by order_number DESC";  
$res=mysqli_query($con, $SelectaCat);   

if(isset($_GET['type']) && !empty($_GET['type']) && isset($_GET['id']) && $_GET['id']>0)

{
   $type=$_GET['type'];
    $id=$_GET['id']; 

    if($type=='delete') 
    {


    $DeleteCat="DELETE from category where id='$id' ";

    mysqli_query($con, $DeleteCat);  

    redirect('category.php');


    }  


if($type=='active' || $type=='deactive')

{

$status=1;  

if($type=='deactive' )
{


    $status=0; 


}
$updateStatus="UPDATE category set status='$status' where id=' $id' ";  
mysqli_query($con, $updateStatus);
redirect('category.php');  


} 


}

?>
   <div class="card">
            <div class="card-body">  

            <a href="category_master.php"><h4 class="card-title">Category Master</h4></a>
              
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>OrderID</th>
                            <th>Category</th>
                            <th>Order Number</th>
                            <th>Status</th>
                            <th>Added On</th>
                            <th>Actions</th>
                           
                        </tr>
                      </thead>
                      <tbody> 

                            <?php   
                    
            if(mysqli_num_rows($res)>0)

            {
            while($row=mysqli_fetch_assoc($res))
                {
                 $i=1;   

                ?>
                
                        <tr>
                        <td> <?php echo $i?> </td>
                        <td><?php echo  $row['category']?> </td>
                        <td><?php echo  $row['order_number']?></td>
                        <td><?php echo  $row['status']?></td>
                        <td><?php echo  $row['added_on']?></td>
                     
                        <td>    
                        <?php  
                        if($row['status']==1) 

                        {

                         ?>
                         <a href="?id=<?php echo  $row['id']?>&type=deactive"><label class="badge badge-info">Active</label></a>
                         
                         <?php

                        }else {
                            ?>
                            <a href="?id=<?php echo  $row['id']?>&type=active"><label class="badge badge-info">Deactive</label></a>
                            
                            <?php

                        }
                        
                        
                        ?>
                            <a href="category_master.php?id=<?php echo $row['id']?>"><label class="badge badge-primary">Edit</label></a>
                           <a href="?id=<?php echo $row['id']?>&type=delete"><label class="badge badge-danger">Delete</label></a>
                            
                        </td>
                        
                         </tr>

                
                <?php



$i++;   }


            }else {


            Echo "There is no data in this category table";


            }

                    ?>           
                        
                     
            
                   
                      
                      </tbody>
                    </table>
                  </div>
				</div>
              </div>
            </div>
          
          
          
          
   


<?php include('footer.php')?>