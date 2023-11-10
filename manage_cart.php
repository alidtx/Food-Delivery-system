<?php 
session_start();
include('function.php');
include('connection.php');  
?>



<?php 

$qty=$_POST['qty'];
$attr=$_POST['attr'];
$type=$_POST['type'];  
$added_on=date('Y-m-d');


if($type=='add')
{
if(isset($_SESSION['FOOD_USER_ID']))

{  
  $uid=$_SESSION['FOOD_USER_ID'];

  user_add_to_cart($uid, $qty, $attr);

   

}else {


$_SESSION['cart'][$attr]['qty']=$qty;



}  

$totalPrice=0;
$getFullCart=getFullCart();


foreach($getFullCart as $list)

{

  $totalPrice=$totalPrice+$list['qty']*$list['price'];

  


}  


    $GetDishDetail=GetDishDetailById($attr);
		$price=$GetDishDetail['price'];
    $image=$GetDishDetail['image'];
    $dish=$GetDishDetail['dish'];

		



$totalItem=count($getFullCart); 

$arr=array('totalItem'=>$totalItem, 'totalPrice'=>$totalPrice,'price'=>$price, 'image'=>$image, 'dish'=>$dish);


echo json_encode($arr);








}










?>