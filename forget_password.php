<?php include('header.php'); 





?>


<div class="login-register-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                             <h4>Forgot Paswword</h4>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="#" method="post" id="frmforget">
                                                <input type="email" name="forget_email" placeholder="Email" id="forget_email">
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                    </div>
                                                   <button type="submit" name="submitforget" id="submitforget"><span>Login</span></button> 
                                                   <br>
                                                     <span id="forget_error"></span>
                                                    <span id="success_msg_forget"></span> 
                                                    <span id="forget_wait"></span> 
                                                </div> 
                                                <input type="hidden"  name="type" value="forget">
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