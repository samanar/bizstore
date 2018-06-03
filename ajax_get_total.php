<?php
require_once("./config.php");
$cart = $db->get("cart");
$products = [];
foreach($cart as $key => $value) {

    $db->where("id" , $value['product_id']);
    $products [] = $db->getOne("products");

}
$total =0;
foreach ($cart as $key => $value) {
    foreach($products as $key2 => $value2){
        if($value2['id'] == $value['product_id']) {
            $total += $value['quantity'] * $value2['price'];
        }
    }

}
echo number_format($total);

?>