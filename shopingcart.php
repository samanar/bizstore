<?php
require_once("./config.php");
$cart = $db->get("cart");
$products = [];
foreach ($cart as $key => $value) {

    $db->where("id", $value['product_id']);
    $products [] = $db->getOne("products");

}
$total = 0;
foreach ($cart as $key => $value) {
    foreach ($products as $key2 => $value2) {
        if ($value2['id'] == $value['product_id']) {
            $total += $value['quantity'] * $value2['price'];
        }
    }

}

$address = $db->get("addresses");


?>

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="css/heroic-features.css" rel="stylesheet">
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<link rel="stylesheet" type="text/css" href="./shopping.css">
<link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css">
<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->
<div class="container">

    <table id="cart" class="table table-hover table-condensed" align="right" style=" text-align:right;direction: rtl">
        <thead>
        <tr>
            <th style="width:60%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:12%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>


        </tr>
        </thead>
        <tbody>
        <?php foreach ($cart as $key => $value) {
            $db->where("id", $value['product_id']);
            $product = $db->getOne("products");
            ?>
            <tr data-id="<?= $product['id'] ?>">
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-2 hidden-xs">
                            <?php if (isset($product['picture_1']) && $product['picture_1'] != "") { ?>
                                <img src="<?= $product['picture_1'] ?>" alt="..." class="img-responsive" width="100"
                                     height="100"/>
                            <?php } else { ?>
                                <img src="http://placehold.it/100x100" alt="..." class="img-responsive"/>
                            <?php } ?>
                        </div>
                        <div class="col-sm-10">
                            <h4 class="" style="margin-right: 10px;"><?php echo $product['name']; ?></h4>
                            <p style="margin-right: 10px;"><?php echo $product['disc']; ?> </p>
                        </div>

                    </div>
                </td>
                <td data-th="Price" class="price"
                    data-id="<?= $product['id'] ?>"><?= number_format($product['price']) ?></td>
                <td data-th="Quantity">
                    <input type="number" data-id="<?= $product['id'] ?>" class="form-control text-center number" min="1"
                           value="<?= $value['quantity'] ?>">
                </td>
                <td data-th="Subtotal" data-id="<?= $product['id'] ?>"
                    class="text-center product_total"><?= number_format($product['price'] * $value['quantity']) ?></td>
                <td class="actions" data-th="">

                    <button class="btn btn-danger btn-sm delete" data-id="<?=$product['id']?>"><i class="fa fa-trash-o"></i></button>
                </td>


            </tr>
        <?php } ?>
        </tbody>
        <!-- <tfoot>
            <tr class="visible-xs"></div>
                <td class="text-center"><strong>Total 1.99</strong></td>
            </tr>
            <tr>
                <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                <td colspan="2" class="hidden-xs"></td>
                <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>

            </tr>
        </tfoot> -->
    </table>
</div>

<div class="address_container">
    <div class="row">
        <div class="col-sm-12">
            <div class="address_title">
                آدرس خود را انتخاب کنید :
            </div>
            <div class="address_choose_container">
                <?php foreach ($address as $key=>$value){ ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="radio">
                            <input type="radio" name="optradio" class="radio_input" <?php if($key == 0) echo 'checked="checked"' ?>>
                                <div class="address_show_title">
                                   <?= $value['title'] ?>
                                </div>
                                <div class="address_show_location">
                                    <?= $value['location'] ?>
                                </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>

    <div class="shopping_forward_container  my-4" style="direction: ltr">
        <div class="row">
            <div class="col-sm-12 mt-3">
                <div class="address_title">نهایی کردن خرید</div>
            </div>
            <div class="col-sm-3">
                <a href='./index.php' class="btn btn-warning btn-block"><i class="fa fa-angle-left"></i> Continue
                    Shopping</a>
            </div>
            <div class=" text-center col-sm-6 pt-2" style="font-weight: bold" id="total">Total <?php echo number_format($total) ?>
            </div>
            <div class="col-sm-3">
                <a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a>
            </div>


        </div>
    </div>
</div>


<script>


    function addCommas(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }


    $(document).ready(function () {

        //changing quantity
        $(".number").change(function () {
            let data_id = $(this).attr('data-id');
            let price = $(".price[data-id=" + data_id + "]").html();
            price = price.replace(',', '');
            let quantity = $(this).val();
            let subtotal = quantity * price;
            $.post('ajax_update_quantity.php', {
                product_id: data_id,
                quantity: quantity

            }, function (data, err) {
                // alert(subtotal);
                $(".product_total[data-id=" + data_id + "]").html(addCommas(subtotal));
                $.get('./ajax_get_total.php', {}, function (data) {
                    $("#total").html("Total" + data);
                });
            });



        });


        //deleting product

        $(".delete").click(function() {
            let data_id = $(this).attr('data-id');
            $.post('./ajax_delete_cart.php' , {
                product_id: data_id
            } , function(data) {
                $("tr[data-id=" + data_id + "]").css('display' , 'none');
                $.get('./ajax_get_total.php', {}, function (data) {
                    $("#total").html("Total" + data);
                });
            });


        });
    });
</script>
