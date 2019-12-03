<?php
##引用Smarty
require_once '../libs/Smarty.class.php';
$smarty = new Smarty;
$smarty->debugging = true;
##引用資料庫連線sql語句
require_once '../routes/sql.php';
##引用user相關類別
require_once "../controllers/userController.php";
$user = new User($mysqli);
$user = $user->ckCookie();
// $user = $user->user;

$sql = "SELECT * FROM `list`";
$result = $mysqli->query($sql);

while ($row = $result->fetch_assoc()) {
    $all[] = $row;
}

$smarty->assign("cookie", $user["result"]);
$smarty->assign("user", $user);
$smarty->assign("all", $all);
$smarty->display('../templates/manager.html');
