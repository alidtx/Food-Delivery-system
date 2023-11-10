<?php 

include('header.php');




?>  

<?php 

if(isset($_POST['submit']))
{

//prx($_POST);


}

?>



<div class="login-register-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> login </h4>
                                </a>
                                <a data-toggle="tab" href="#lg2">
                                    <h4> register </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="#" method="post" id='frmLogin'>
                                                <input type="email" name="email" placeholder="Email" id="email"> 
                                                <input type="password" name="password" placeholder="Password" id="password"> 
                                                
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox">
                                                        <label>Remember me</label>
                                                        <a href="forget_password.php">Forgot Password?</a>
                                                    </div>
                                                    <button type="submit" name="submit" id="submitLogin"><span>Login</span></button> 
                                                    <br>
                                                    <span id="success_lgn"></span>
                                                    <span id="wait_lgn"></span>
                                                    <span id="email_error_lgn"></span>
                                                </div> 
                                                <input type="hidden" name="type"  value="login">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="#" method="post"   id="frmRegister">
                                                <input type="text" name="username" placeholder="User Name" id="username">
                                                <input type="email" name="useremail" placeholder="User Email" id="useremail"> 
                                                <span id="email_error"></span>
                                                <input type="password" name="userpassword" placeholder="Password">
                                                <input type="text" name="usermobile" placeholder="User Mobile" id="usermobile" >
                                                <div class="button-box">
                                                    <button type="submit" name="submit" id="submtRsg"><span>Register</span></button> 
                                                    <br>
                                                    <span id="success_rsg"></span>
                                                    <span id="wait_rsg"></span>
                                                </div> 

                                                <input type="hidden" name="type"  value="register">
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



<?php include('footer.php')?>