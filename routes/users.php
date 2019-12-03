<?php
##引用資料庫連線sql語句
require_once 'sql.php';
##引用user相關類別
require_once '../controllers/userController.php';
$user = new User($mysqli);

/**
 * 透過method值導入Class方法
 */
// switch ($_POST["method"]) {
//     case "login":
//         echo json_encode(
//             $user->login($_POST)
//         );
//         break;
//     case "register":
//         echo json_encode(
//             $user->register($_POST)
//         );
//         break;
//     case "logout":
//         echo json_encode(
//             $user->logout()
//         );
//         break;
//     default:
//         echo json_encode(false);
// }
if (isset($_POST["method"])) {
    echo json_encode($user->{$_POST["method"]}($_POST));
} else {
    echo json_encode(false);
}
