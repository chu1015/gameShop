<?php
/* Smarty version 3.1.33, created on 2019-12-03 09:47:36
  from 'C:\xampp\htdocs\chu\gameShop\templates\navbar.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de62128be55e0_17288457',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99d803d42d5ccfe0f822d3b3cd3d60bd173b9fa9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chu\\gameShop\\templates\\navbar.html',
      1 => 1575362854,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de62128be55e0_17288457 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
    <div id="logo"><a href="index.php"><img src="../img/icon.ico" alt="Homepage"></a></div>
    <div id="cd-hamburger-menu"><a class="cd-img-replace" href="#0">Menu</a></div>
    <div id="cart"><a href="cart.php"><img id="car" src="../img/cd-cart.svg"></a></div>
    <!-- <a id="cd-cart-trigger"><a class="cd-img-replace" href="cart.php"></a></div> -->
</header>

<nav id="main-nav">
    <ul>
        <li><a href="manager.php">Manager</a></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="#0">Services</a></li>
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['user']->value['account'];
$_prefixVariable1 = ob_get_clean();
ob_start();
echo $_prefixVariable1;
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2) {?>
        <li> <a href=""><?php ob_start();
echo $_smarty_tpl->tpl_vars['user']->value['nickName'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</a></li>
        <li><a href="#0" id="logout">登出</a></li>
        <?php } else { ?>
        <li><a href="../templates/login.html">登入</a></li>
        <li><a href="../templates/register.html">註冊</a></li>
        <?php }?>
    </ul>
</nav><?php }
}
