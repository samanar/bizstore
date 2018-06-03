<?php

$products_table = Array(
	'name' => 'varchar(255) not null',
    'code' => 'varchar(255) ',
    'group_id' => 'varchar(255)',
    'manufacturer' => 'varchar(255)',
    'disc' => 'varchar(255)',
    'price' => 'float not null',
    'off' => 'float',
    'picture_1' => 'text',
    'store_id' => 'int(11)',
    'score' => 'float'
);

$users_table = Array(
    'name' => 'varchar(255) not null' ,
    'lastname' => 'varchar(255) not null',
    'username' => 'varchar(255) not null',
    'password' => 'varchar(255) not null',
    'email' => 'varchar(255) not null',
    'created_at' => 'varchar(255)',
    'phone_num' => 'varchar(255) not null',
    'invitation_code' => 'varchar(255) not null'
);

$store_table = Array(
    'name' => 'varchar(255) not null' ,
    'lastname' => 'varchar(255) not null',
    'store_name' => 'varchar(255) not null',
    'username' => 'varchar(255) not null',
    'password' => 'varchar(255) not null',
    'store_id' => 'int(11)',
    'email' => 'varchar(255) not null',
    'has_permission' => 'bool',
    'created_at' => 'varchar(256) not null'
);

$color_product = array(
    'product_id' => 'int(15) unsigned',
    'color' => 'text'
);

$cart = Array(
  'product_id' => 'int(15) unsigned not null' ,
    'color' => 'varchar(255)',
    'quantity' => 'int(11)'
);


$addresses = Array(
  'location' => 'text not null',
    'title' => 'varchar(255)'
);

// level 1 == superadministrator  level 2 == administrator level 3 == general level 4 == demo

function createTable ($name, $data) {
    global $db;
    //$q = "CREATE TABLE $name (id INT(9) UNSIGNED PRIMARY KEY NOT NULL";
    $db->rawQuery("DROP TABLE IF EXISTS $name");
    $q = "CREATE TABLE `$name` (id INT(15) UNSIGNED PRIMARY KEY AUTO_INCREMENT";
    foreach ($data as $k => $v) {
        $q .= ", `$k` $v";
    }
    $q .= ");";
    // echo $q;
    // echo "<br>";
    $db->rawQuery($q);
}
?>