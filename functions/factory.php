<?php
    include("config.php");

    $product = [];
    $product['name'] = 'Sony MDR-Z1R';
    $product['code'] = '1';
    $product['group_id'] = '1';
    $product['manufacturer'] ='Sony';
    $product['price'] = 40000;
    $product['off'] = 20;
    $product['picture_1'] = './images/h4.jpg';
    $product['store_id'] = 1;
    $product['score'] = 4;
    $product['disc'] = 'این هدفون قابلیت های بسیاری دارد که در بازار نظیر آن را پیدا نمیکنید و ...................................................................................................................';
    $db->insert('products' , $product);

    // $products = [];
    // $products['name'] = 'B&O Play Beoplay e3';
    // $products['code'] = '1';
    // $products['group_id'] = '1';
    // $products['manufacturer'] = 'Bang & olufsen';
    // $products['price'] = 35000;
    // $products['off'] = 10;
    // $products['picture_1'] = './images/h1.jpg';
    // $products['store_id'] = 1;
    // $products['score'] = 3;
    // $products['disc'] = 'این هدفون قابلیت های بسیاری دارد که در بازار نظیر آن را پیدا نمیکنید و ...................................................................................................................';
    
    // $db->insert('products' , $products);

    // $products = [];
    // $products['name'] = 'B&O Play Beoplay e3';
    // $products['code'] = '1';
    // $products['group_id'] = '1';
    // $products['manufacturer'] = 'Bang & olufsen';
    // $products['price'] = 35000;
    // $products['off'] = 10;
    // $products['picture_1'] = './images/h1.jpg';
    // $products['store_id'] = 1;
    // $products['score'] = 3;
    // $products['disc'] = 'این هدفون قابلیت های بسیاری دارد که در بازار نظیر آن را پیدا نمیکنید و ...................................................................................................................';
    
    // $db->insert('products' , $products);

 
    $user = [];
    $user['name'] = 'بهنام' ;
    $user['lastname'] = 'زرگری';
    $user['username'] = 'behnamz';
    $user['password'] = 'behnam123';
    $user['email'] = 'behzargari@gmail.com';
    $user['created_at'] = '95/6/12';
    $user['phone_num'] = '09123456789';
    $user['invitation_code'] = '48353';

    $db->insert('users' , $user);

    $store = [];
    $store['name'] = 'saied';
    $store['lastname'] = 'haghighi';
    $store['store_name'] = 'سعید';
    $store['username'] = 'saiedhaghighi';
    $store['password'] = 'hamed';
    $store['store_id'] = 1;
    $store['email'] = 'behzargari@gmail.com';
    $store['has_permission'] = 1;
    $store['created_at'] = '94/5/10'; 
    $db->insert('store' , $store);

?>