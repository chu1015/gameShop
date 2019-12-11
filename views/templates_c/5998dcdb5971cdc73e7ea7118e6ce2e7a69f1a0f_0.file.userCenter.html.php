<?php
/* Smarty version 3.1.33, created on 2019-12-10 03:40:01
  from 'C:\xampp\htdocs\chu\gameShop\templates\userCenter.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5def05811e1094_09815584',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5998dcdb5971cdc73e7ea7118e6ce2e7a69f1a0f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chu\\gameShop\\templates\\userCenter.html',
      1 => 1575945600,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/navbar.html' => 1,
  ),
),false)) {
function content_5def05811e1094_09815584 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="zh" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>管理頁</title>
    <link rel="icon" href="../img/icon.ico" type="image/x-icon">
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"><?php echo '</script'; ?>
>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@8"><?php echo '</script'; ?>
>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <?php echo '<script'; ?>
 src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="../css/style.css"> <!-- Gem style -->
    <link rel="stylesheet" href="../css/userCenter.css">
    <?php echo '<script'; ?>
 src="../js/modernizr.js"><?php echo '</script'; ?>
> <!-- Modernizr -->
    <?php echo '<script'; ?>
 src="../js/main.js"><?php echo '</script'; ?>
> <!-- Gem jQuery -->
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

    <ul>
        <div id="productList" class="tabcontent">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">購買商品</th>
                        <th scope="col">數量</th>
                        <th scope="col">單價</th>
                        <th scope="col">單筆小計</th>
                        <th scope="col">到貨商店</th>
                        <th scope="col">購買時間</th>
                    </tr>
                </thead>
                <tbody>
                    <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shopList']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>

                    <tr>
                        <td scope="row"><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['gameName'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</td>
                        <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['amount'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
</td>
                        <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['price'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</td>
                        <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['subtotal'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
</td>
                        <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['store'];
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
</td>
                        <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['date'];
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
</td>
                    </tr>
                    <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>

                </tbody>
            </table>
            <nav class="npage" aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
$_smarty_tpl->tpl_vars['num'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['num']->step = 1;$_smarty_tpl->tpl_vars['num']->total = (int) ceil(($_smarty_tpl->tpl_vars['num']->step > 0 ? $_smarty_tpl->tpl_vars['res']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['res']->value)+1)/abs($_smarty_tpl->tpl_vars['num']->step));
if ($_smarty_tpl->tpl_vars['num']->total > 0) {
for ($_smarty_tpl->tpl_vars['num']->value = 1, $_smarty_tpl->tpl_vars['num']->iteration = 1;$_smarty_tpl->tpl_vars['num']->iteration <= $_smarty_tpl->tpl_vars['num']->total;$_smarty_tpl->tpl_vars['num']->value += $_smarty_tpl->tpl_vars['num']->step, $_smarty_tpl->tpl_vars['num']->iteration++) {
$_smarty_tpl->tpl_vars['num']->first = $_smarty_tpl->tpl_vars['num']->iteration === 1;$_smarty_tpl->tpl_vars['num']->last = $_smarty_tpl->tpl_vars['num']->iteration === $_smarty_tpl->tpl_vars['num']->total;?>
                    <?php if ($_smarty_tpl->tpl_vars['page']->value == $_smarty_tpl->tpl_vars['num']->value) {?>
                    <li class="page-item"><a class="page-link btn btn-outline-light disabled"
                            href="?page=<?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
</a>
                    </li>
                    <?php } else { ?>
                    <li class="page-item"><a class="page-link btn btn-outline-light active"
                            href="?page=<?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
</a>
                    </li>
                    <?php }?>
                    <?php }
}
?>
                </ul>
            </nav>
        </div>
    </ul>
</body>

</html><?php }
}
