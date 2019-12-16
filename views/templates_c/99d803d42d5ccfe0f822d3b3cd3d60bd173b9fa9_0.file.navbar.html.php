<?php
/* Smarty version 3.1.33, created on 2019-12-12 03:07:16
  from 'C:\xampp\htdocs\chu\gameShop\templates\navbar.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5df1a0d4190170_39148281',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99d803d42d5ccfe0f822d3b3cd3d60bd173b9fa9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chu\\gameShop\\templates\\navbar.html',
      1 => 1576116292,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df1a0d4190170_39148281 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
    <div id="logo"><a href="index.php"><img src="../img/icon.ico" alt="Homepage"></a></div>
    <div id="cd-hamburger-menu"><a class="cd-img-replace" href="#0">Menu</a></div>
    <?php ob_start();
if (isset($_smarty_tpl->tpl_vars['user']->value['permission'])) {
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>

    <div id="cart"><a href="cart.php"><img id="car" src="../img/cd-cart.svg"></a></div>
    <a href="cart.php"><div id="cart"><span class="badge"><?php ob_start();
echo $_smarty_tpl->tpl_vars['count']->value;
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>
</span></div></a>
    <?php ob_start();
}
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>

    <!-- <a id="cd-cart-trigger"><a class="cd-img-replace" href="cart.php"></a></div> -->
</header>

<nav id="main-nav">
    <ul>
        <?php ob_start();
if ($_smarty_tpl->tpl_vars['user']->value['level'] === 1) {
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>

        <li><a href="manager.php">Manager</a></li>
        <?php ob_start();
}
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>

        <li><a href="index.php">Home</a></li>
        <!-- <li><a href="#0">Services</a></li> -->
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['user']->value['account'];
$_prefixVariable18 = ob_get_clean();
ob_start();
echo $_prefixVariable18;
$_prefixVariable19 = ob_get_clean();
if ($_prefixVariable19) {?>
        <li> <a href="userCenter.php"><?php ob_start();
echo $_smarty_tpl->tpl_vars['user']->value['nickName'];
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>
</a></li>
        <li><a href="#0" id="logout">登出</a></li>
        <?php } else { ?>
        <li><a href="../templates/login.html">登入</a></li>
        <li><a href="../templates/register.html">註冊</a></li>
        <?php }?>
    </ul>
</nav>
<?php }
}
