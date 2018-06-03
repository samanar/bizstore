<?php
    require_once ("./config.php");
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $data['quantity'] = $quantity;
    $db->where("product_id" , $product_id);
    $db->update("cart" , $data);

?>