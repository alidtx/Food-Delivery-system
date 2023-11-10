<?php include('header.php');  


$userDetails=userDetailsById();
//prx($userDetails);     

if(isset($_SESSION['FOOD_USER_ID'])) 

{



}else{

redirect('shop.php');


}



if(isset($_SESSION['FOOD_USER_ID']))  

{



if(isset($_POST['update_user'])) 

{

if(isset($_POST['full_name'])  && !empty($_POST['full_name']) && isset($_POST['email'])  && !empty($_POST['email']) 
&& isset($_POST['mobile'])  && !empty($_POST['mobile']) 
) 

{

    $full_name=$_POST['full_name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];  
    $Update="UPDATE user set name='$full_name', email='$email', mobile='$mobile' where id=".$_SESSION['FOOD_USER_ID'];

    mysqli_query($con, $Update);
}

}

if(isset($_POST['change_pass'])) 



{

if(isset($_POST['password'])  &&  !empty($_POST['password']) && isset($_POST['confirm_pass'])  &&  !empty($_POST['confirm_pass']) )  

{

    $password=$_POST['password'];
    $confirm_pass=$_POST['confirm_pass'];  
   

    if($password!=$confirm_pass) 
     {

    $msg="Password does not match!!!!";

    }else{

        $updatepass="UPDATE user set password='$password' where id=".$_SESSION['FOOD_USER_ID'];
        mysqli_query($con, $updatepass);

    }
}

}

}



?>




<div class="myaccount-area pb-80 pt-100">
            <div class="container">
                <div class="row">
                    <div class="ml-auto mr-auto col-lg-9">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                                    </div>
                                    <div id="my-account-1" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>My Account Information</h4>
                                                    <h5>Your Personal Details</h5>
                                                </div> 
                                                <form action="#" method="post" >    
                                                <div class="row">  

                                         
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Full Name</label>
                                                            <input  type="text"  name="full_name"  value="<?php echo $userDetails['name']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Email Address</label>
                                                            <br>
                                                            <input type="email" name="email"   value="<?php echo $userDetails['email']?>" style="width:48%">
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Telephone</label>
                                                            <input type="text" name="mobile"  value="<?php echo $userDetails['mobile']?>"  >
                                                        </div>
                                                    </div>
                                                   
                                                </div>  
                                                
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit" name="update_user">Continue</button>
                                                    </div>  
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                         
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                                    </div>
                                    <div id="my-account-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>Change Password</h4>
                                                    <h5>Your Password</h5>
                                                </div> 
                                                <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Password</label>
                                                            <input type="password" name="password">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Password Confirm</label>
                                                            <input type="password" name="confirm_pass">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit" name="change_pass">Continue</button> 
                                                        <span><?php if(isset($msg)) echo $msg?></span>
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
                </div>
            </div>
        </div>
        








<?php include('footer.php');?>