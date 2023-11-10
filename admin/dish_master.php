<?php include('header.php')?>

<?php
$category_id='';
$dish='';
$dish_detail='';



if(isset($_GET['id'])  && $_GET['id']>0) 


{

  $id=$_GET['id'];
 
   $selectById="SELECT * from dish where id='$id'";
   $res=mysqli_query($con,   $selectById);
   $cat_row=mysqli_fetch_assoc($res);
   $category_id=$cat_row['category_id']; 
   $dish=$cat_row['dish'];
   $dish_detail=$cat_row['dish_detail'];
 


  


}

//prx($cat_row);



if(isset($_POST['submit'])) 


{

if(isset($_POST['category_id'])  && !empty($_POST['category_id']) && isset($_POST['dish'])  && !empty($_POST['dish'])  
&& isset($_POST['dish_detail'])  && !empty($_POST['dish_detail']) && isset($_FILES['file'])  && !empty($_FILES['file']) 
)  


{


      $category_id=$_POST['category_id'];
      $dish=$_POST['dish'];
      $dish_detail=$_POST['dish_detail'];
      $file_name=$_FILES['file']['name'];
      $tmp_name=$_FILES['file']['tmp_name'];
      $added_on=date('Y-m-d');   
     
      $target='uploads/';

$insertDish="INSERT into dish (category_id,dish,dish_detail, image, status, added_on ) VALUES ('$category_id','$dish', '$dish_detail', '$file_name', '1', '$added_on') "; 
 mysqli_query($con, $insertDish);

 move_uploaded_file($tmp_name,  $target."$file_name");

}else{

$msg="One or more fields are empty, please check!!!";


}



}



$selectCat="SELECT * from category where status=1"; 

$catResult=mysqli_query($con, $selectCat)
?>



<div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Category</label> 
                        <select class="form-control" value="" name="category_id" id="">

                          <option value="">Select Category</option>
                            
                         <?php  
                         while($cat_row=mysqli_fetch_assoc($catResult))
                         {

                         echo "<option value='".$cat_row['id']."'>'".$cat_row['category']."'</option>";    
                         

                         }  
                         
                         ?>


                        </select>


                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Dish</label>
                      <input type="text" class="form-control" name="dish" placeholder="Dish Name" value="<?php echo $dish?>">
                    </div>  
                    <div class="form-group">
                      <label for="exampleInputEmail3">Dish Detail</label>
                      <input type="text" class="form-control" name="dish_detail" placeholder="Dish Details" value="<?php echo $dish_detail?>">
                     </div> 
                     <div class="form-group">
                      <label for="exampleInputEmail3"> Dish Image</label>
                      <input type="file" class="form-control" name="file" >
                     </div>


                        
                    <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                    <br> 
                     <span><?php if(isset($msg)) echo $msg?></span>
                  
                  </form>
                </div>
              </div>




















<?php include('footer.php')?>