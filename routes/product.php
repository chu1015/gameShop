<?php
##引用資料庫連線sql語句
require_once('sql.php');
##引用product相關類別
require_once('../controllers/productController.php');
$product = new Product($mysqli);

if (isset($_POST["method"])) {
    echo json_encode($product->{$_POST["method"]}($_POST));
} else {
    echo json_encode(false);
}