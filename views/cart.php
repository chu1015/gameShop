<?php
## 引用Smarty
require_once('../libs/Smarty.class.php');
$smarty = new Smarty;
$smarty->debugging = true;
## 引用資料庫連線sql語句
require_once('../routes/sql.php');
## 引用user相關類別
require_once("../controllers/userController.php");
$user = new User($mysqli);
$user = $user->ckCookie();
## 引用Product相關類別
require_once("../controllers/productController.php");
if (isset($user["permission"])) {
    $product = new Product($mysqli);
    // $product = $list->getProduct($_GET["product"]);
    $showCart = $product->showCart($user["id"]);
    $total = 0;
    if (isset($showCart["result"])) {
        $showCart = null;
    } else {
        for ($i = 0; $i < count($showCart); $i++) {
            $total = $total + $showCart[$i]['subtotal'];
        }
    }
} else {
    header("Location:../templates/login.html");
}
$count = $product->countCart($user["id"]);

// var_dump ($total);

// $smarty->assign("product", $product);
$smarty->assign("total", $total);
$smarty->assign("showCart", $showCart);
// $smarty->assign("qty", $qty);
$smarty->assign("cookie", $user["result"]);
$smarty->assign("user", $user);
$smarty->assign("count", $count);
$smarty->display('../templates/cart.html');
