<?php
/* Smarty version 3.1.33, created on 2019-12-03 10:26:08
  from 'C:\xampp\htdocs\chu\gameShop\templates\manager.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de62a30e4a844_43791836',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '141edbcbcf2e0631de6c3f546ba73acc0ef57c61' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chu\\gameShop\\templates\\manager.html',
      1 => 1575365168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/navbar.html' => 1,
  ),
),false)) {
function content_5de62a30e4a844_43791836 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="zh" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>管理頁</title>
    <link rel="icon" href="../img/icon.ico" type="image/x-icon">
    <!-- <?php echo '<script'; ?>
 src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'><?php echo '</script'; ?>
> -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@8"><?php echo '</script'; ?>
>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <?php echo '<script'; ?>
 src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="//code.jquery.com/jquery-1.11.1.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="../css/style.css"> <!-- Gem style -->
    <link rel="stylesheet" href="../css/manager.css">
    <?php echo '<script'; ?>
 src="../js/modernizr.js"><?php echo '</script'; ?>
> <!-- Modernizr -->
    <?php echo '<script'; ?>
 src="../js/main.js"><?php echo '</script'; ?>
> <!-- Gem jQuery -->
    <?php echo '<script'; ?>
 src="../js/manager.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../js/navbar.js"><?php echo '</script'; ?>
>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['cookie']->value;
$_prefixVariable1 = ob_get_clean();
ob_start();
echo $_prefixVariable1;
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2 == "error") {?>
    <?php echo '<script'; ?>
 src="../js/swal.js"><?php echo '</script'; ?>
>
    <?php }?>


</head>

<body>
    <?php ob_start();
$_smarty_tpl->_subTemplateRender("file:../templates/navbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'productList')" id="defaultOpen">商品管理</button>
        <button class="tablinks" onclick="openCity(event, 'userList')">會員管理</button>
        <button class="tablinks" onclick="openCity(event, 'product')">商品上傳</button>
    </div>

    <ul>
        <div id="productList" class="tabcontent">
            <li>
                <h3 class="list">品名</h3>
                <p class="list">價格</p>
            </li>
            <hr>
            <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>

            <li>
                <h3 class="list"><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['name'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</h3>
                <p class="list"><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['price'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
</p>
                <div class="switch">
                    <input id="cmn-toggle-4 <?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
" class="cmn-toggle cmn-toggle-round-flat" type="checkbox" checked>
                    <label for="cmn-toggle-4 <?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
"></label>
                </div>
            </li>
            <hr>
            <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>

        </div>
    </ul>

    <div id="userList" class="tabcontent">
        <h3>Paris</h3>
        <p>Paris is the capital of France.</p>
    </div>

    <div id="product" class="tabcontent">
        <h3>Tokyo</h3>
        <p>Tokyo is the capital of Japan.</p>
    </div>


</body>

</html><?php }
}
