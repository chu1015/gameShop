<?php
##引用Smarty
require_once('../libs/Smarty.class.php');
$smarty = new Smarty;
$smarty->debugging = true;
##引用資料庫連線sql語句
require_once('../routes/sql.php');
##引用user相關類別
require_once("../controllers/userController.php");
##引用product相關類別
require_once("../controllers/productController.php");
$userClass = new User($mysqli);
$product = new Product($mysqli);

$user = $userClass->ckCookie();
if ($user["level"] > 0) {
    $count = $product->countCart($user["id"]);
    $res1 = $product->controlProduct();
    if (isset($_GET["product"])) {
        if ($res1 >= $_GET["product"] && $_GET["product"] > 0) {
            $productPage = $_GET["product"];
        } else {
            $productPage = 1;
        }
    } else {
        $_GET["product"] = 1;
        $productPage = 1;
    }
    $all = $product->controlProductShow($productPage);
    // $all = $product->controlProduct();

    $userList = $userClass->userList();
    $res2 = $userClass->createPage();
    if (isset($_GET["user"])) {
        if ($res2 >= $_GET["user"] && $_GET["user"] > 0) {
            $userPage = $_GET["user"];
        } else {
            $userPage = 1;
        }
    } else {
        $_GET["user"] = 1;
        $userPage = 1;
    }
    $userList = $userClass->showpage($userPage);

} else {
    header("Location:index.php");
}

$smarty->assign("cookie", $user["result"]);
$smarty->assign("productPage", $productPage);
$smarty->assign("user", $user);
$smarty->assign("res1", $res1);
$smarty->assign("userPage", $userPage);
$smarty->assign("all", $all);
$smarty->assign("res2", $res2);
$smarty->assign("userList", $userList);
$smarty->assign("count", $count);
$smarty->display('../templates/manager.html');
