<?php
/* Smarty version 3.1.33, created on 2019-12-05 06:39:42
  from 'C:\xampp\htdocs\chu\gameShop\templates\manager.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de8981e6d8757_59765939',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '141edbcbcf2e0631de6c3f546ba73acc0ef57c61' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chu\\gameShop\\templates\\manager.html',
      1 => 1575524379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/navbar.html' => 1,
  ),
),false)) {
function content_5de8981e6d8757_59765939 (Smarty_Internal_Template $_smarty_tpl) {
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
    <!-- <?php echo '<script'; ?>
 src="//code.jquery.com/jquery-1.11.1.min.js"><?php echo '</script'; ?>
> -->
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
        <button class="tablinks" onclick="manager(event, 'productList')">商品管理</button>
        <button class="tablinks" onclick="manager(event, 'userList')">會員管理</button>
        <button class="tablinks" onclick="manager(event, 'product')">商品上傳</button>
    </div>

    <ul>
        <div id="productList" class="tabcontent">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">品名</th>
                        <th scope="col">價格</th>
                        <th scope="col">上下架</th>
                    </tr>
                </thead>
                <tbody>
                    <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>

                    <tr>
                        <th scope="row"><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</th>
                        <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['name'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
</td>
                        <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['price'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</td>
                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['status'] === "1";
$_prefixVariable8 = ob_get_clean();
ob_start();
echo $_prefixVariable8;
$_prefixVariable9 = ob_get_clean();
ob_start();
if ($_prefixVariable9) {
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>

                        <td>
                            <div class="switch">
                                <input id="cmn-toggle-4 good<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
"
                                    class="cmn-toggle cmn-toggle-round-flat good<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>
" type="checkbox"
                                    onclick="status(`<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['status'];
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
`, `<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>
`)" checked>
                                <label for="cmn-toggle-4 good<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
"></label>
                            </div>
                        </td>
                        <?php ob_start();
} else {
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>

                        <td>
                            <div class="switch">
                                <input id="cmn-toggle-4 good<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>
"
                                    class="cmn-toggle cmn-toggle-round-flat good<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>
" type="checkbox"
                                    onclick="status(`<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['status'];
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>
`, `<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>
`)">
                                <label for="cmn-toggle-4 good<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>
"></label>
                            </div>
                        </td>
                        <?php ob_start();
}
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>

                    </tr>
                    <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>

                </tbody>
            </table>
            <nav class="npage" aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
$_smarty_tpl->tpl_vars['num'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['num']->step = 1;$_smarty_tpl->tpl_vars['num']->total = (int) ceil(($_smarty_tpl->tpl_vars['num']->step > 0 ? $_smarty_tpl->tpl_vars['res1']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['res1']->value)+1)/abs($_smarty_tpl->tpl_vars['num']->step));
if ($_smarty_tpl->tpl_vars['num']->total > 0) {
for ($_smarty_tpl->tpl_vars['num']->value = 1, $_smarty_tpl->tpl_vars['num']->iteration = 1;$_smarty_tpl->tpl_vars['num']->iteration <= $_smarty_tpl->tpl_vars['num']->total;$_smarty_tpl->tpl_vars['num']->value += $_smarty_tpl->tpl_vars['num']->step, $_smarty_tpl->tpl_vars['num']->iteration++) {
$_smarty_tpl->tpl_vars['num']->first = $_smarty_tpl->tpl_vars['num']->iteration === 1;$_smarty_tpl->tpl_vars['num']->last = $_smarty_tpl->tpl_vars['num']->iteration === $_smarty_tpl->tpl_vars['num']->total;?>
                    <?php if ($_smarty_tpl->tpl_vars['productPage']->value == $_smarty_tpl->tpl_vars['num']->value) {?>
                    <li class="page-item"><a class="page-link btn btn-outline-light disabled"
                            href="?product=<?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable24 = ob_get_clean();
echo $_prefixVariable24;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable25 = ob_get_clean();
echo $_prefixVariable25;?>
</a>
                    </li>
                    <?php } else { ?>
                    <li class="page-item"><a class="page-link btn btn-outline-light active"
                            href="?product=<?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable26 = ob_get_clean();
echo $_prefixVariable26;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable27 = ob_get_clean();
echo $_prefixVariable27;?>
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

    <div id="userList" class="tabcontent">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">暱稱</th>
                    <th scope="col">帳號</th>
                    <th scope="col">狀態</th>
                </tr>
            </thead>
            <tbody>
                <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userList']->value, 'list');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['list']->value) {
$_prefixVariable28 = ob_get_clean();
echo $_prefixVariable28;?>

                <tr>
                    <th scope="row"><?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable29 = ob_get_clean();
echo $_prefixVariable29;?>
</th>
                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['nickName'];
$_prefixVariable30 = ob_get_clean();
echo $_prefixVariable30;?>
</td>
                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['account'];
$_prefixVariable31 = ob_get_clean();
echo $_prefixVariable31;?>
</td>
                    <td>
                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['permission'];
$_prefixVariable32 = ob_get_clean();
ob_start();
echo $_prefixVariable32;
$_prefixVariable33 = ob_get_clean();
ob_start();
if ($_prefixVariable33 === "1") {
$_prefixVariable34 = ob_get_clean();
echo $_prefixVariable34;?>

                        <div class="switch">
                            <input id="cmn-toggle-4 user<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable35 = ob_get_clean();
echo $_prefixVariable35;?>
"
                                class="cmn-toggle cmn-toggle-round-flat user<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable36 = ob_get_clean();
echo $_prefixVariable36;?>
" type="checkbox" checked
                                onclick="Suspension(`<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['permission'];
$_prefixVariable37 = ob_get_clean();
echo $_prefixVariable37;?>
`, `<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable38 = ob_get_clean();
echo $_prefixVariable38;?>
`)">
                            <label for="cmn-toggle-4 user<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable39 = ob_get_clean();
echo $_prefixVariable39;?>
"></label>
                        </div>
                        <?php ob_start();
} else {
$_prefixVariable40 = ob_get_clean();
echo $_prefixVariable40;?>

                        <div class="switch">
                            <input id="cmn-toggle-4 user<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable41 = ob_get_clean();
echo $_prefixVariable41;?>
"
                                class="cmn-toggle cmn-toggle-round-flat user<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable42 = ob_get_clean();
echo $_prefixVariable42;?>
" type="checkbox"
                                onclick="Suspension(`<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['permission'];
$_prefixVariable43 = ob_get_clean();
echo $_prefixVariable43;?>
`,`<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable44 = ob_get_clean();
echo $_prefixVariable44;?>
`)">
                            <label for="cmn-toggle-4 user<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable45 = ob_get_clean();
echo $_prefixVariable45;?>
"></label>
                        </div>
                        <?php ob_start();
}
$_prefixVariable46 = ob_get_clean();
echo $_prefixVariable46;?>

                    </td>
                </tr>
                <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable47 = ob_get_clean();
echo $_prefixVariable47;?>

            </tbody>
        </table>
        <nav class="npage" aria-label="Page navigation example">
            <ul class="pagination">
                <?php
$_smarty_tpl->tpl_vars['num'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['num']->step = 1;$_smarty_tpl->tpl_vars['num']->total = (int) ceil(($_smarty_tpl->tpl_vars['num']->step > 0 ? $_smarty_tpl->tpl_vars['res2']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['res2']->value)+1)/abs($_smarty_tpl->tpl_vars['num']->step));
if ($_smarty_tpl->tpl_vars['num']->total > 0) {
for ($_smarty_tpl->tpl_vars['num']->value = 1, $_smarty_tpl->tpl_vars['num']->iteration = 1;$_smarty_tpl->tpl_vars['num']->iteration <= $_smarty_tpl->tpl_vars['num']->total;$_smarty_tpl->tpl_vars['num']->value += $_smarty_tpl->tpl_vars['num']->step, $_smarty_tpl->tpl_vars['num']->iteration++) {
$_smarty_tpl->tpl_vars['num']->first = $_smarty_tpl->tpl_vars['num']->iteration === 1;$_smarty_tpl->tpl_vars['num']->last = $_smarty_tpl->tpl_vars['num']->iteration === $_smarty_tpl->tpl_vars['num']->total;?>
                <?php if ($_smarty_tpl->tpl_vars['userPage']->value == $_smarty_tpl->tpl_vars['num']->value) {?>
                <li class="page-item"><a class="page-link btn btn-outline-light disabled"
                        href="?user=<?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable48 = ob_get_clean();
echo $_prefixVariable48;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable49 = ob_get_clean();
echo $_prefixVariable49;?>
</a>
                </li>
                <?php } else { ?>
                <li class="page-item"><a class="page-link btn btn-outline-light active"
                        href="?user=<?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable50 = ob_get_clean();
echo $_prefixVariable50;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable51 = ob_get_clean();
echo $_prefixVariable51;?>
</a>
                </li>
                <?php }?>
                <?php }
}
?>
            </ul>
        </nav>
    </div>

    <div id="product" class="tabcontent">
        <form>
            <div class="form-group">
                <label>遊戲片名</label>
                <input type="text" class="form-control" id="gameName" placeholder="遊戲片名" required>
                <span class="errorName"></span>
            </div>
            <div class="form-group">
                <label>遊戲片描述</label>
                <textarea class="form-control" id="descript" rows="3" placeholder="描述" required></textarea>
                <span class="errorDes"></span>
            </div>
            <div class="form-group">
                <label>價格</label>
                <input class="form-control" type="number" min="0" value="9487" step="1" id="price" placeholder="價格"
                    required>
                <span class="errorPrice"></span>
            </div>
            <div class="form-group">
                <label>圖檔</label>
                <input class="form-control" type="file" id="imgInp" required
                    accept="image/gif, image/jpeg, image/png" />
                <img id="previewImg" class="img" src="../img/thumb.jpg" />
            </div>
            <div class="form-group">
                <button id="upLoad" class="btn btn-primary" type="button">確認上傳</button>
            </div>
        </form>
    </div>


</body>

</html><?php }
}
