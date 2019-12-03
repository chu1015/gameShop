<?php
/* Smarty version 3.1.33, created on 2019-12-02 10:41:22
  from 'C:\xampp\htdocs\chu\gameShop\templates\checkBill.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de4dc42a6d806_55107936',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '090099143ace99a2f13478e7cab46cda2e8fbba8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chu\\gameShop\\templates\\checkBill.html',
      1 => 1575279672,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/navbar.html' => 1,
  ),
),false)) {
function content_5de4dc42a6d806_55107936 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/icon.ico" type="image/x-icon">
    <title><?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['name'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@8"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="../css/style.css"> <!-- Gem style -->
    <link rel="stylesheet" href="../css/product.css"> <!-- Gem style -->
    <?php echo '<script'; ?>
 src="../js/modernizr.js"><?php echo '</script'; ?>
> <!-- Modernizr -->
    <?php echo '<script'; ?>
 src="../js/main.js"><?php echo '</script'; ?>
> <!-- Gem jQuery -->
    <?php echo '<script'; ?>
 src="../js/cart.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../js/navbar.js"><?php echo '</script'; ?>
>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['cookie']->value;
$_prefixVariable2 = ob_get_clean();
ob_start();
echo $_prefixVariable2;
$_prefixVariable3 = ob_get_clean();
if ($_prefixVariable3 == "error") {?>
	<?php echo '<script'; ?>
 src="../js/swal.js"><?php echo '</script'; ?>
>
	<?php }?>
</head>

<body>
        <?php ob_start();
$_smarty_tpl->_subTemplateRender("file:../templates/navbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>

        <main>
                <ul>
                    <li>
                        <div class="tab">
                            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">購物車</button>
                            <!-- <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
                            <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button> -->
                        </div>
                    </li>
                    <li>
                        <div id="London" class="tabcontent">
                                    <div class="table">
                                        <div class="layout-inline row th">
                                            <div class="col col-pro">&emsp;商品</div>
                                            <div class="col col-price align-center ">
                                                單價(NT)
                                            </div>
                                            <div class="col col-qty align-center">數量</div>
                                            <div class="col">總價</div>
                                            <div class="col">取消</div>
                                        </div>
                                        <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['showCart']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>

                                        <div class="layout-inline row list<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
">
                                            <div class="col col-pro layout-inline">
                                                <p>《 <?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['gameName'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
》</p>
                                            </div>
        
                                            <div class="col col-price col-numeric align-center ">
                                                <p>$<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['price'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
</p>
                                            </div>
        
                                            <div class="col col-qty layout-inline">
                                                <p>1</p>
                                                <!-- <a href="#" class="qty qty-minus">-</a>
                                                        <input type="numeric" value="1" />
                                                        <a href="#" class="qty qty-plus">+</a> -->
                                            </div>
                                            <div class="col col-total col-numeric">
                                                <p class="price"><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['price'];
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
</p>
                                            </div>
                                            <div class="col col-cancel col-numeric">
                                                <button type="button" class="btn btn-danger glyphicon glyphicon-trash" onclick="remove(`<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
`)"></button>
                                            </div>
                                        </div>
                                        <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>

                                        <div class="tf">
                                            <div class="row layout-inline">
                                                <div class="col">
                                                    <p>Total</p>
                                                </div>
                                                <div class="col">
                                                    <p class="total"><?php ob_start();
echo $_smarty_tpl->tpl_vars['total']->value;
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>
</p>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-update">去結帳</a>
                                    </div>
                    </li>
                </ul>
            </main>
        
</body>

</html><?php }
}
