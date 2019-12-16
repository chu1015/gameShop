<?php
## 引用Smarty
require_once('../libs/Smarty.class.php');
$smarty = new Smarty;
$smarty->debugging = true;
## 引用資料庫連線sql語句
require_once('../routes/sql.php');
## 引用user相關類別
require_once("../controllers/userController.php");
## 引用product相關類別
require_once("../controllers/productController.php");
$user = new User($mysqli);
$user = $user->ckCookie();

$product = new Product($mysqli);
$res = $product->createPage();
$count = $product->countCart($user["id"]);

if(isset($_GET["page"])){
    $ipage = (int)($_GET["page"]);
    if( $res >= $ipage && $ipage > 0){
        $page = $ipage;
    }else{
        $page = 1;
    }
    
}else{
    $ipage = 1;
    $page = 1;
}
$all = $product->showpage($page);

// $all = $product->productList();

$smarty->assign("cookie", $user["result"]);
$smarty->assign("page", $page);
$smarty->assign("user", $user);
$smarty->assign("res", $res);
$smarty->assign("all", $all);
$smarty->assign("count", $count);
$smarty->display('../templates/index.html');
