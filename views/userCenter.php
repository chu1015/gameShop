<?php
##引用Smarty
require_once '../libs/Smarty.class.php';
$smarty = new Smarty;
$smarty->debugging = true;
##引用資料庫連線sql語句
require_once '../routes/sql.php';
##引用user相關類別
require_once "../controllers/userController.php";
##引用product相關類別
require_once "../controllers/productController.php";
$userClass = new User($mysqli);
$product = new Product($mysqli);

$user = $userClass->ckCookie();

$count = $product->countCart($user["id"]);
$res = $product->countShoppingPage();
if (isset($user["permission"])) {
    if (isset($shopping["result"])) {
        $shopList = null;
    } else {

        if (isset($_GET["page"])) {
            if ($res >= $_GET["page"] && $_GET["page"] > 0) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            }
        } else {
            $_GET["page"] = 1;
            $page = 1;
        }
        $shopList = $product->showShopping($page);
    }
} else {
    header("Location:../templates/login.html");
}
$smarty->assign("cookie", $user["result"]);
$smarty->assign("page", $page);
$smarty->assign("user", $user);
$smarty->assign("res", $res);
$smarty->assign("shopList", $shopList);
$smarty->assign("count", $count);
$smarty->display('../templates/userCenter.html');
