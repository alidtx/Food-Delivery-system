<?php include('header.php')?>

<?php
$category="";
$order_number=""; 



if(isset($_POST['submit']))

{

if(isset($_POST['category']) && !empty($_POST['category']) && isset($_POST['order_id']) && !empty($_POST['order_id']) )

{

    $category=$_POST['category'];
    $order_id=$_POST['order_id'];
    $added_on=date('Y-m-d');   

   
  $selectData="SELECT * from category where category='$category'";

  $res=mysqli_query($con, $selectData);

  if(mysqli_num_rows($res)>0)  
  {

  $msg="This categry is already added";


  }else {

  
  $insertData="INSERT INTO category (category, order_number, status, added_on) VALUES ('$category','$order_id','1','$added_on' )";  
  
   mysqli_query($con, $insertData);


  }


}

}  

if(isset($_GET['id']) && $_GET['id']>0) 
{


$id=$_GET['id'];  

$selectData="SELECT * from category where id='$id'";
$res=mysqli_query($con, $selectData);
if($row=mysqli_fetch_assoc($res))
{

$category=$row['category'];
$order_number=$row['order_number'];

}


}



?>




<div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Category</label>
                      <input type="text" class="form-control" name="category" placeholder="Category" value="<?php echo $category?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Order Id</label>
                      <input type="text" class="form-control" name="order_id" placeholder="Order Id" value="<?php echo $order_number?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button> 
                    <span><?php if(isset($msg)) echo $msg?></span>
                  
                  </form>
                </div>
              </div>




















<?php include('footer.php')?>