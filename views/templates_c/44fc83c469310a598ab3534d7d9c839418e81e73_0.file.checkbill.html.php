<?php
/* Smarty version 3.1.33, created on 2019-12-03 04:15:17
  from 'C:\xampp\htdocs\chu\gameShop\templates\checkbill.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de5d345d08424_59194565',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44fc83c469310a598ab3534d7d9c839418e81e73' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chu\\gameShop\\templates\\checkbill.html',
      1 => 1575342917,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/navbar.html' => 1,
  ),
),false)) {
function content_5de5d345d08424_59194565 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/icon.ico" type="image/x-icon">
    <title>結帳中</title>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"><?php echo '</script'; ?>
>
        <!-- bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <!-- sweetalert2 -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@8"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="../css/style.css"> <!-- Gem style -->
    <link rel="stylesheet" href="../css/checkBill.css">
    <?php echo '<script'; ?>
 src="../js/modernizr.js"><?php echo '</script'; ?>
> <!-- Modernizr -->
    <?php echo '<script'; ?>
 src="../js/main.js"><?php echo '</script'; ?>
> <!-- Gem jQuery -->
    <?php echo '<script'; ?>
 src="../js/navbar.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../js/checkBill.js"><?php echo '</script'; ?>
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

    <main>
        <ul>
            <li>
                <div>
                    <div class="table">
                        <div class="layout-inline">
                            <div class="col col-pro">&emsp;商品</div>
                            <div class="col col-price align-center ">
                                單價(NT)
                            </div>
                            <div class="col col-qty align-center">數量</div>
                            <div class="col align-center">總價</div>
                        </div>
            </li>
            <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['showCart']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>

            <div class="layout-inline row list<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
">
                <div class="col col-pro layout-inline">
                    <p>《 <?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['gameName'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
》</p>
                </div>

                <div class="col col-price col-numeric align-center ">
                    <p>$<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['price'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</p>
                </div>

                <div class="col col-qty layout-inline">
                    <p>1</p>
                </div>
                <div class="col col-total col-numeric">
                    <p class="price align-center">$<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['price'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
</p>
                </div>
            </div>
            <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>

            <div class="tf">
                <div class="row layout-inline">
                    <div class="col align-center">
                        <p>Total</p>
                    </div>
                    <div class="col align-center">
                        <p class="total">$<?php ob_start();
echo $_smarty_tpl->tpl_vars['total']->value;
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
</p>
                    </div>
                </div>
            </div>
            <button class="btn btn-update" data-toggle="modal" data-target="#myModal">去結帳</button>
            </div>
            <li>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h1 class="modal-title">帳單</h1>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <h1>結帳方式</h1>
                                </div>
                                <div class="layout-inline">

                                    <div>
                                        <h1>超商取貨:</h1>
                                    </div>
                                    <div>
                                        <input name="store" type="radio" value="7-11" checked><label
                                            id="store">7-11</label>
                                        <input name="store" type="radio" value="familyMart"><label id="store">全家</label>
                                        <input name="store" type="radio" value="OK-Mart"><label
                                            id="store">OK-Mart</label>
                                        <input name="store" type="radio" value="Life"><label id="store">萊爾富</label>
                                    </div>
                                </div>
                                <h1>總計(NT):<h1 id="total"><?php ob_start();
echo $_smarty_tpl->tpl_vars['total']->value;
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
</h1></h1>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                <button type="button" onclick="bill()" class="btn btn-success"
                                    data-dismiss="modal">確認購買</button>
                            </div>
                        </div>

                    </div>
                </div>
            </li>
            <li>
            </li>

        </ul>
    </main>

</body>

</html><?php }
}
