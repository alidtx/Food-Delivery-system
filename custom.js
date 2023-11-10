
$("#frmRegister").on('submit', function(e){
    $("#submtRsg").attr('disabled', true) 
    $("#wait_rsg").html("Waiting.....")

$.ajax({

type:'post',
url:'login_register.php',
data:$("#frmRegister").serialize(),  



success: function(result) 


{  


 var data=jQuery.parseJSON(result); 
 $("#submtRsg").attr('disabled', false)   
 $("#wait_rsg").html("")

if(data.type=='error') 

{

    $("#email_error").html(data.msg); 
}

if(data.type=='success')
 {

  $("#success_rsg").html(data.msg); 
   
  $("#frmRegister")[0].reset();
   console.log(data.msg);

 }  


}
})
e.preventDefault();

})  









$("#frmLogin").on('submit', function(e){
    $("#submitLogin").attr('disabled', true) 
    

$.ajax({

type:'post',
url:'login_register.php',
data:$("#frmLogin").serialize(),  



success: function(result) 


{  


 var data=jQuery.parseJSON(result); 
 $("#submitLogin").attr('disabled', false)   
 

if(data.type=='error') 

{
    
    $("#email_error_lgn").html(data.msg); 
}

if(data.type=='success')
 {

 window.location.href='shop.php'
  

   



 }  


}
})
e.preventDefault();

})  






$("#frmforget").on('submit', function(e){
    $("#submitforget").attr('disabled', true) 
    $("#forget_wait").html("Please wait.....");
    

$.ajax({

type:'post',
url:'login_register.php',
data:$("#frmforget").serialize(),  



success: function(result) 


{  

$("#forget_wait").html("");
 var data=jQuery.parseJSON(result); 
 $("#submitforget").attr('disabled', false)   
 

if(data.type=='error') 

{
    
    $("#email_error_lgn").html(data.msg); 
}

if(data.type=='success')
 {


    
    $("#success_msg_forget").html(data.msg); 
    

 }  


}
})
e.preventDefault();

}) 


function  add_to_cart(id, type) 

{


 var qty=$('#qty'+id).val();
 var attr=$('#radio'+id).val(); 



$.ajax({

type:'post',
url:'manage_cart.php',
data:'qty='+qty+'&attr='+attr+'&type='+type,


success:function(result)

{
 
var data=jQuery.parseJSON(result) 

$("#totalItem").html(data.totalItem)
$("#totalPrice").html(data.totalPrice)


if(data.totalItem==1) 
{  

   
    var tp=qty*data.totalPrice;
    var html='<div class="shopping-cart-content"><ul id="cart_ul"><li class="single-shopping-cart"><div class="shopping-cart-img"><a href="#"><img alt="" src="uploads/'+data.image+'"></a></div><div class="shopping-cart-title"><h4><a href="#">'+data.dish+'</a></h4><h6>Qty:'+qty+'</h6> <span>'+tp+'</span></div><div class="shopping-cart-delete"> <a href="#"><i class="ion ion-close" onclick=deleteItem("'+attr+'") ></i></a> </div> </li> </ul> <div class="shopping-cart-total"><h4>Shipping : <span>$20.00</span></h4><h4>Total : <span class="shop-total">'+data.totalPrice+'</span></h4> </div><div class="shopping-cart-btn"><a href="view_cart.php">view cart</a> <a href="checkout.html">checkout</a></div></div>';

    $('.header-cart').append(html);


}else {
    var tp=qty*data.totalPrice;
  
    var html='<li class="single-shopping-cart"><div class="shopping-cart-img"><a href="#"><img alt="" src="uploads/'+data.image+'"></a></div><div class="shopping-cart-title"><h4><a href="#">'+data.dish+'</a></h4><h6>Qty:'+qty+'</h6> <span>'+tp+'</span></div><div class="shopping-cart-delete"> <a href="#"><i class="ion ion-close" onclick=deleteItem("'+attr+'") ></i></a> </div> </li> ';

    $('#cart_ul').append(html);
    
    $(".shop-total").html(data.totalPrice)

}




}

})







}
