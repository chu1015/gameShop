<?php
/* Smarty version 3.1.33, created on 2019-12-06 10:39:20
  from 'C:\xampp\htdocs\chu\gameShop\templates\navbar.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dea21c857c573_21649580',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99d803d42d5ccfe0f822d3b3cd3d60bd173b9fa9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chu\\gameShop\\templates\\navbar.html',
      1 => 1575625152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dea21c857c573_21649580 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
    <div id="logo"><a href="index.php"><img src="../img/icon.ico" alt="Homepage"></a></div>
    <div id="cd-hamburger-menu"><a class="cd-img-replace" href="#0">Menu</a></div>
    <?php ob_start();
if (isset($_smarty_tpl->tpl_vars['user']->value['permission'])) {
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

    <div id="cart"><span class="badge"><?php ob_start();
echo $_smarty_tpl->tpl_vars['count']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</span></div>
    <div id="cart"><a href="cart.php"><img id="car" src="../img/cd-cart.svg"></a></div>
    <?php ob_start();
}
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>

    <!-- <a id="cd-cart-trigger"><a class="cd-img-replace" href="cart.php"></a></div> -->
</header>

<nav id="main-nav">
    <ul>
        <?php ob_start();
if ($_smarty_tpl->tpl_vars['user']->value['level'] === 1) {
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>

        <li><a href="manager.php">Manager</a></li>
        <?php ob_start();
}
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>

        <li><a href="index.php">Home</a></li>
        <!-- <li><a href="#0">Services</a></li> -->
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['user']->value['account'];
$_prefixVariable6 = ob_get_clean();
ob_start();
echo $_prefixVariable6;
$_prefixVariable7 = ob_get_clean();
if ($_prefixVariable7) {?>
        <li> <a href=""><?php ob_start();
echo $_smarty_tpl->tpl_vars['user']->value['nickName'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
</a></li>
        <li><a href="#0" id="logout">登出</a></li>
        <?php } else { ?>
        <li><a href="../templates/login.html">登入</a></li>
        <li><a href="../templates/register.html">註冊</a></li>
        <?php }?>
    </ul>
</nav><?php }
}
