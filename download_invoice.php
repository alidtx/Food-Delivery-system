<?php 
session_start();
include('connection.php'); 
include('function.php'); 
include('vendor/autoload.php'); 

if(isset($_SESSION['FOOD_USER_ID'])) 

{

}else{

redirect('shop.php');
}




if(isset($_GET['id']) && $_GET['id'] )
{

    $id=$_GET['id'];

    $OrderEmailHtml=OrderEmail($id); 
   $mpdf=new \Mpdf\Mpdf();
 
  $mpdf->WriteHTML($OrderEmailHtml);

 $file=time().'.pdf';
  $mpdf->output($file, 'D');



}

?>