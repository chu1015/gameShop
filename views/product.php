<?php
##引用Smarty
require_once('../libs/Smarty.class.php');
$smarty = new Smarty;
$smarty->debugging = true;
##引用資料庫連線sql語句
require_once('../routes/sql.php');
##引用user相關類別
require_once("../controllers/userController.php");
$user = new User($mysqli);

$user = $user->ckCookie();

// $user = $user->user;
##引用Product相關類別
require_once("../controllers/productController.php");
$list = new Product($mysqli);
$product = $list->getProduct($_GET["product"]);





$smarty->assign("cookie", $user["result"]);
$smarty->assign("product", $product);
$smarty->assign("user", $user);
$smarty->display('../templates/product.html');
