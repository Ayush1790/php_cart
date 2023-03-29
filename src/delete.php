<?php
session_start();
header('location:products.php');
// removing the selected array from cart
if(isset($_GET['delid'])){
    $count=0;
    foreach ($_SESSION['cart'] as $key => $value) {
        if($value[0]==$_GET['delid']){
            break;
        }
        $count++;   
    }
    array_splice($_SESSION['cart'],$count,1);
}
?>