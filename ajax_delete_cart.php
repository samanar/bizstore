<?php
    require_once("./config.php");
    $product_id = $_POST['product_id'];
    $db->where("product_id" , $product_id);
    $db->delete("cart");
?>