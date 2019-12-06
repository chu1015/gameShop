<?php
/* Smarty version 3.1.33, created on 2019-12-06 08:49:50
  from 'C:\xampp\htdocs\chu\gameShop\templates\product.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dea081e4f3f65_14935551',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf8ff970bbeb5f1a338c911a0f51d7200e24b866' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chu\\gameShop\\templates\\product.html',
      1 => 1575618565,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/navbar.html' => 1,
  ),
),false)) {
function content_5dea081e4f3f65_14935551 (Smarty_Internal_Template $_smarty_tpl) {
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
 src="../js/product.js"><?php echo '</script'; ?>
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
        <ul id="cd-gallery-items" class="cd-container">
            <li>
                <img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['img'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
" alt="Preview image">
            </li>
            <h1><?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['name'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
</h1>
            <pre><h2><?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['descript'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</h2></pre>
            <h3>NT$<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['price'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
元</h3>
            <?php ob_start();
if (isset($_smarty_tpl->tpl_vars['user']->value['permission'])) {
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>

            <button id="product" class="btn btn-info btn-large" type="button" onclick="product(`<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
`, `<?php ob_start();
echo $_smarty_tpl->tpl_vars['user']->value['permission'];
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
`)">加進購物車</button>
            <?php ob_start();
} else {
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>

            <button id="product" class="btn btn-info btn-large" type="button" onclick="guest()">加進購物車</button>
            <?php ob_start();
}
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>

        </ul> <!-- cd-gallery-items -->
    </main>

</body>

</html><?php }
}
