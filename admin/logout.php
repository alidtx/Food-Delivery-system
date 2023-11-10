<?php  
include('../function.php');

?>


<?php 

session_start();
unset($_SESSION['IS_USER']);
redirect('login.php');

?>