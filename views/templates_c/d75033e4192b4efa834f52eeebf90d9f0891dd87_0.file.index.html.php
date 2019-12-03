<?php
/* Smarty version 3.1.33, created on 2019-11-29 11:27:39
  from 'C:\xampp\htdocs\chu\gameShop\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de0f29be6bef0_28904195',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd75033e4192b4efa834f52eeebf90d9f0891dd87' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chu\\gameShop\\templates\\index.html',
      1 => 1575023197,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/navbar.html' => 1,
  ),
),false)) {
function content_5de0f29be6bef0_28904195 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="zh" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>遊戲購物網</title>
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
	<link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="../css/style.css"> <!-- Gem style -->
	<link rel="stylesheet" href="../css/index.css"> <!-- myself -->
	<?php echo '<script'; ?>
 src="../js/modernizr.js"><?php echo '</script'; ?>
> <!-- Modernizr -->
	<?php echo '<script'; ?>
 src="../js/main.js"><?php echo '</script'; ?>
> <!-- Gem jQuery -->
	<?php echo '<script'; ?>
 src="../js/index.js"><?php echo '</script'; ?>
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

	<main>
		<ul id="cd-gallery-items" class="cd-container">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
			<li>
				<a href="../views/product.php?product=<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
"><img src="../img/<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['img'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
" alt="Preview image"></a>
				<!-- <img onclick="product(`<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
`)" src="../img/<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['img'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
" alt="Preview image"> -->
					<br>
					<h6><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['name'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
</h6>
			</li>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul> <!-- cd-gallery-items -->
	</main>

</body>

</html>

<!-- <a style="display:none" href="http://www.bootstrapmb.com">bootstrap模板库</a> --><?php }
}
