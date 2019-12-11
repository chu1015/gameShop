<?php
/* Smarty version 3.1.33, created on 2019-12-11 09:24:24
  from 'C:\xampp\htdocs\chu\gameShop\templates\cart.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5df0a7b8b7ee99_89593823',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c660276a6fa6515d53644e8c6738c9fea73b55ba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chu\\gameShop\\templates\\cart.html',
      1 => 1576052662,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/navbar.html' => 1,
  ),
),false)) {
function content_5df0a7b8b7ee99_89593823 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/icon.ico" type="image/x-icon">
    <title>購物車</title>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"><?php echo '</script'; ?>
>
    <!-- bootstrap -->
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"><?php echo '</script'; ?>
>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- sweetalert2 -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@8"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="../css/style.css"> <!-- Gem style -->
    <!-- <link rel="stylesheet" href="../css/product.css"> -->
    <link rel="stylesheet" href="../css/cart.css">
    <?php echo '<script'; ?>
 src="../js/modernizr.js"><?php echo '</script'; ?>
> <!-- Modernizr -->
    <?php echo '<script'; ?>
 src="../js/main.js"><?php echo '</script'; ?>
> <!-- Gem jQuery -->
    <!-- <?php echo '<script'; ?>
 src="../js/product.js"><?php echo '</script'; ?>
> -->
    <?php echo '<script'; ?>
 src="../js/navbar.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../js/cart.js"><?php echo '</script'; ?>
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
                <div class="table">
                    <div class="layout-inline row th">
                        <div class="col col-pro ">&emsp;商品</div>
                        <div class="col col-price align-center ">
                            單價(NT)
                        </div>
                        <div class="col col-qty align-center">數量</div>
                        <div class="col">總價</div>
                        <div class="col col-status">狀態</div>
                        <div class="col">取消</div>
                    </div>
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
                            <p class="sprice"><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['price'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</p>
                        </div>

                        <div class="col col-qty layout-inline">
                            <?php ob_start();
if ($_smarty_tpl->tpl_vars['value']->value['quantity'] > 5) {
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>

                            <select class="quantity" id="<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
" name="quantity">
                                <option value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['amount'];
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
" selected disabled hidden><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['amount'];
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
</option>
                                <?php ob_start();
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>

                                <option class="option" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>
</option>
                                <?php ob_start();
}
}
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>

                            </select>
                            <?php ob_start();
} else {
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>

                            <select class="quantity" id="<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>
" name="quantity">
                                <option value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['amount'];
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>
" selected disabled hidden><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['amount'];
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>
</option>
                                <?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['quantity'];
$_prefixVariable20 = ob_get_clean();
ob_start();
echo $_prefixVariable20;
$_prefixVariable21 = ob_get_clean();
ob_start();
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_prefixVariable21+1 - (1) : 1-($_prefixVariable21)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>

                                <option class="option" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable24 = ob_get_clean();
echo $_prefixVariable24;?>
</option>
                                <?php ob_start();
}
}
$_prefixVariable25 = ob_get_clean();
echo $_prefixVariable25;?>

                            </select>
                            <?php ob_start();
}
$_prefixVariable26 = ob_get_clean();
echo $_prefixVariable26;?>

                            <!-- <p>1</p> -->
                            <!-- <a href="#" class="qty qty-minus">-</a>
                                                <input type="numeric" value="1" />
                                                <a href="#" class="qty qty-plus">+</a> -->
                        </div>
                        <div class="col col-total col-numeric">
                            <p class="price price<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable27 = ob_get_clean();
echo $_prefixVariable27;?>
 subtotal"><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['subtotal'];
$_prefixVariable28 = ob_get_clean();
echo $_prefixVariable28;?>
</p>
                        </div>

                        <div class="col col-status">
                                <?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['status'] === 1;
$_prefixVariable29 = ob_get_clean();
ob_start();
echo $_prefixVariable29;
$_prefixVariable30 = ob_get_clean();
ob_start();
if ($_prefixVariable30) {
$_prefixVariable31 = ob_get_clean();
echo $_prefixVariable31;?>

                                    <p class="up">上架</p>
                                    <?php ob_start();
} else {
$_prefixVariable32 = ob_get_clean();
echo $_prefixVariable32;?>

                                    <p class="down">停賣</p>
                                    <?php ob_start();
}
$_prefixVariable33 = ob_get_clean();
echo $_prefixVariable33;?>

                                </div>

                        <div class="col col-cancel col-numeric">
                            <button type="button" class="btn btn-danger glyphicon glyphicon-trash"
                                onclick="remove(`<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable34 = ob_get_clean();
echo $_prefixVariable34;?>
`)"></button>
                        </div>
                    </div>
                    <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable35 = ob_get_clean();
echo $_prefixVariable35;?>

                    <div class="tf">
                        <div class="row layout-inline">
                            <div class="col">
                                <p>Total</p>
                            </div>
                            <div class="col">
                                <p class="total"><?php ob_start();
echo $_smarty_tpl->tpl_vars['total']->value;
$_prefixVariable36 = ob_get_clean();
echo $_prefixVariable36;?>
</p>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_smarty_tpl->tpl_vars['showCart']->value)) {?>
                    <?php ob_start();
if ($_smarty_tpl->tpl_vars['user']->value['permission'] > 0) {
$_prefixVariable37 = ob_get_clean();
echo $_prefixVariable37;?>

                    <a href="checkBill.php"  class="btn btn-update">結帳去</a>
                    <!-- <button type="button" class="btn btn-update">結帳去</button> -->
                    <?php ob_start();
} else {
$_prefixVariable38 = ob_get_clean();
echo $_prefixVariable38;?>

                    <!-- <a href="checkBill.php" class="btn btn-update" disabled>你被停權啦</a> -->
                    <button type="button" class="btn btn-update" disabled>你被停權啦</button>
                    <?php ob_start();
}
$_prefixVariable39 = ob_get_clean();
echo $_prefixVariable39;?>

                    <?php }?>
                </div>
            </li>
        </ul>
    </main>

</body>

</html>
<?php }
}
