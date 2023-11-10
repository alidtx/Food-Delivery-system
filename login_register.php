<?php session_start() ?>
<?php include('connection.php')?>
<?php include('function.php')?>  
<?php include('smtp/PHPMailerAutoload.php')  ?>


<?php 


$type=$_POST['type']; 

if($type=='register') 


{
    $username=$_POST['username'];
    $useremail=$_POST['useremail'];
    $userpassword=$_POST['userpassword'];
    $usermobile=$_POST['usermobile'];
    $added_on=date('Y-m-d'); 


$selectUser="SELECT * from user where email='$useremail' ";
$result=mysqli_query($con, $selectUser);

 if(mysqli_num_rows($result)>0) 
  {


   $arr=array('type'=>'error', 'msg'=>'This email is already exists'); 

 }else{
     
    
    $userDataInsert="INSERT into user(name, email, mobile,password,status,added_on,email_verify) 
    VALUES ('$username','$useremail','$usermobile','$userpassword','1','$added_on', '1')
    "; 
    mysqli_query($con, $userDataInsert);
    $insert_id=mysqli_insert_id($con);  
    $str_rand=str_rand(); 
    $html="http://localhost/alifood/emaill_verfiy.php?".$str_rand;
    email_verify($useremail, $html, 'Email Verify');
  
    $arr=array('type'=>'success', 'msg'=>'Data is successfully sent, Please confirm your email.'); 
  
 
 }


echo json_encode($arr);


}   













if($type=='login') 


{
    $email=$_POST['email'];
    $password=$_POST['password'];



$selectUser="SELECT * from user where email='$email' and password='$password'";
$result=mysqli_query($con, $selectUser);

 if(mysqli_num_rows($result)>0) 
  {
      
  $row=mysqli_fetch_assoc($result);
  $email_verify=$row['email_verify'];
  $status=$row['status']; 

  if($email_verify==1)  
  {
 
   if($status==1) 

   {

         $_SESSION['FOOD_USER_ID']=$row['id'];
         $_SESSION['FOOD_USER_NAME']=$row['name']; 
         
       
         $arr=array('type'=>'success', 'msg'=>'log');  
    
      if(isset($_SESSION['cart']) &&  count($_SESSION['cart'])>0) 
      
      {
         foreach($_SESSION['cart'] as $key=>$val) 
         {
          user_add_to_cart($_SESSION['FOOD_USER_ID'] , $val['qty'], $key);
         }



      }


     
         
     
   }else{

      $arr=array('type'=>'error', 'msg'=>'Your account is deactivated'); 

   }

  }else{

   $arr=array('type'=>'error', 'msg'=>'Please Verify your account'); 

  }

   
  
   

 }else{
     
    
    $arr=array('type'=>'error', 'msg'=>'Please give correct logins'); 
  
    
 
 }


echo json_encode($arr);


}








if($type=='forget') 


{
    $forget_email=$_POST['forget_email'];
    



$selectUser="SELECT * from user where email='$forget_email' ";
$result=mysqli_query($con, $selectUser);

 if(mysqli_num_rows($result)>0) 
  {
      
  $row=mysqli_fetch_assoc($result);
  $email_verify=$row['email_verify'];
  $status=$row['status']; 

  if($email_verify==1)  
  {
 
   if($status==1) 

   {

      $_SESSION['FOOD_USER_ID']=$row['id'];
      $_SESSION['FOOD_USER_NAME']=$row['name'];
       
      $gen_pass=rand(112122,121212);
      $updateEmail="UPDATE user set password='$gen_pass' ";
      mysqli_query($con,$updateEmail); 
      $html=$gen_pass;
      email_verify($forget_email, $html, 'Password Recovery');

      $arr=array('type'=>'success', 'msg'=>'New password has been sent to your email, please check.'); 

   }else{

      $arr=array('type'=>'error', 'msg'=>'Your account is deactivated'); 

   }

  }else{

   $arr=array('type'=>'error', 'msg'=>'Please Verify your account'); 

  }

   
  
   

 }else{
     
    
    $arr=array('type'=>'error', 'msg'=>'Please give correct logins'); 
  
    
 
 }


echo json_encode($arr);


}






































?>







