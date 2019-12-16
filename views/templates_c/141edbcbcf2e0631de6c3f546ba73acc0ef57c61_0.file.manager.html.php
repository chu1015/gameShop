<?php
/* Smarty version 3.1.33, created on 2019-12-12 03:18:02
  from 'C:\xampp\htdocs\chu\gameShop\templates\manager.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5df1a35a6792c4_69753266',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '141edbcbcf2e0631de6c3f546ba73acc0ef57c61' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chu\\gameShop\\templates\\manager.html',
      1 => 1576116290,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/navbar.html' => 1,
  ),
),false)) {
function content_5df1a35a6792c4_69753266 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <th scope="col">庫存</th>
                        <th scope="col">上下架</th>
                        <th scope="col">商品修改</th>
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
                        <td id="gameName<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['name'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</td>
                        <td id="price<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['price'];
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
</td>
                        <td id="qty<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['quantity'];
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
</td>
                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['status'] === "1";
$_prefixVariable12 = ob_get_clean();
ob_start();
echo $_prefixVariable12;
$_prefixVariable13 = ob_get_clean();
ob_start();
if ($_prefixVariable13) {
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>

                        <td>
                            <div class="switch">
                                <input id="cmn-toggle-4 good<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
"
                                    class="cmn-toggle cmn-toggle-round-flat good<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>
" type="checkbox"
                                    onclick="status(`<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['status'];
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>
`, `<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>
`)" checked>
                                <label for="cmn-toggle-4 good<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>
"></label>
                            </div>
                        </td>
                        <?php ob_start();
} else {
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>

                        <td>
                            <div class="switch">
                                <input id="cmn-toggle-4 good<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>
"
                                    class="cmn-toggle cmn-toggle-round-flat good<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>
" type="checkbox"
                                    onclick="status(`<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['status'];
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>
`, `<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable24 = ob_get_clean();
echo $_prefixVariable24;?>
`)">
                                <label for="cmn-toggle-4 good<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable25 = ob_get_clean();
echo $_prefixVariable25;?>
"></label>
                            </div>
                        </td>
                        <?php ob_start();
}
$_prefixVariable26 = ob_get_clean();
echo $_prefixVariable26;?>

                        <td><button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#myModal<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable27 = ob_get_clean();
echo $_prefixVariable27;?>
">修改</button>
                            <!-- Modal -->
                            <div class="modal fade in" id="myModal<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable28 = ob_get_clean();
echo $_prefixVariable28;?>
" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">商品修改</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label>遊戲片名</label>
                                                    <input type="text" class="form-control gameName<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable29 = ob_get_clean();
echo $_prefixVariable29;?>
" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['name'];
$_prefixVariable30 = ob_get_clean();
echo $_prefixVariable30;?>
"
                                                        id="modifyGameName">
                                                    <span class="modifyErrorName"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label>遊戲片描述</label>
                                                    <pre><textarea class="form-control des<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable31 = ob_get_clean();
echo $_prefixVariable31;?>
" id="modifyDescript"
                                                        rows="3"><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['descript'];
$_prefixVariable32 = ob_get_clean();
echo $_prefixVariable32;?>
</textarea></pre>
                                                    <span class="modifyErrorDes"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label>價格</label>
                                                    <input class="form-control price<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable33 = ob_get_clean();
echo $_prefixVariable33;?>
" type="number" min="0" step="1"
                                                        id="modifyPrice" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['price'];
$_prefixVariable34 = ob_get_clean();
echo $_prefixVariable34;?>
">
                                                    <span class="modifyErrorPrice"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label>庫存</label>
                                                    <input class="form-control qty<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable35 = ob_get_clean();
echo $_prefixVariable35;?>
" type="number" min="0" step="1" id="modifyQty"
                                                        value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['quantity'];
$_prefixVariable36 = ob_get_clean();
echo $_prefixVariable36;?>
">
                                                    <span class="modifyErrorQty"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label>圖檔</label>
                                                    <input class="form-control updateImgInp" type="file" id="updateImgInp" required
                                                        accept="image/gif, image/jpeg, image/png" />
                                                    <img id="updatePreviewImg<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable37 = ob_get_clean();
echo $_prefixVariable37;?>
" class="img img<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable38 = ob_get_clean();
echo $_prefixVariable38;?>
" src=<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['img'];
$_prefixVariable39 = ob_get_clean();
echo $_prefixVariable39;?>
 />
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success update" id="<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable40 = ob_get_clean();
echo $_prefixVariable40;?>
"
                                                data-dismiss="modal">確認</button>
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">取消</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable41 = ob_get_clean();
echo $_prefixVariable41;?>

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
$_prefixVariable42 = ob_get_clean();
echo $_prefixVariable42;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable43 = ob_get_clean();
echo $_prefixVariable43;?>
</a>
                    </li>
                    <?php } else { ?>
                    <li class="page-item"><a class="page-link btn btn-outline-light active"
                            href="?product=<?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable44 = ob_get_clean();
echo $_prefixVariable44;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable45 = ob_get_clean();
echo $_prefixVariable45;?>
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
$_prefixVariable46 = ob_get_clean();
echo $_prefixVariable46;?>

                <tr>
                    <th scope="row"><?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable47 = ob_get_clean();
echo $_prefixVariable47;?>
</th>
                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['nickName'];
$_prefixVariable48 = ob_get_clean();
echo $_prefixVariable48;?>
</td>
                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['account'];
$_prefixVariable49 = ob_get_clean();
echo $_prefixVariable49;?>
</td>
                    <td>
                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['permission'];
$_prefixVariable50 = ob_get_clean();
ob_start();
echo $_prefixVariable50;
$_prefixVariable51 = ob_get_clean();
ob_start();
if ($_prefixVariable51 === "1") {
$_prefixVariable52 = ob_get_clean();
echo $_prefixVariable52;?>

                        <div class="switch">
                            <input id="cmn-toggle-4 user<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable53 = ob_get_clean();
echo $_prefixVariable53;?>
"
                                class="cmn-toggle cmn-toggle-round-flat user<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable54 = ob_get_clean();
echo $_prefixVariable54;?>
" type="checkbox" checked
                                onclick="Suspension(`<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['permission'];
$_prefixVariable55 = ob_get_clean();
echo $_prefixVariable55;?>
`, `<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable56 = ob_get_clean();
echo $_prefixVariable56;?>
`)">
                            <label for="cmn-toggle-4 user<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable57 = ob_get_clean();
echo $_prefixVariable57;?>
"></label>
                        </div>
                        <?php ob_start();
} else {
$_prefixVariable58 = ob_get_clean();
echo $_prefixVariable58;?>

                        <div class="switch">
                            <input id="cmn-toggle-4 user<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable59 = ob_get_clean();
echo $_prefixVariable59;?>
"
                                class="cmn-toggle cmn-toggle-round-flat user<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable60 = ob_get_clean();
echo $_prefixVariable60;?>
" type="checkbox"
                                onclick="Suspension(`<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['permission'];
$_prefixVariable61 = ob_get_clean();
echo $_prefixVariable61;?>
`,`<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable62 = ob_get_clean();
echo $_prefixVariable62;?>
`)">
                            <label for="cmn-toggle-4 user<?php ob_start();
echo $_smarty_tpl->tpl_vars['list']->value['id'];
$_prefixVariable63 = ob_get_clean();
echo $_prefixVariable63;?>
"></label>
                        </div>
                        <?php ob_start();
}
$_prefixVariable64 = ob_get_clean();
echo $_prefixVariable64;?>

                    </td>
                </tr>
                <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable65 = ob_get_clean();
echo $_prefixVariable65;?>

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
$_prefixVariable66 = ob_get_clean();
echo $_prefixVariable66;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable67 = ob_get_clean();
echo $_prefixVariable67;?>
</a>
                </li>
                <?php } else { ?>
                <li class="page-item"><a class="page-link btn btn-outline-light active"
                        href="?user=<?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable68 = ob_get_clean();
echo $_prefixVariable68;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['num']->value;
$_prefixVariable69 = ob_get_clean();
echo $_prefixVariable69;?>
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
                <input type="text" class="form-control" id="gameName" placeholder="遊戲片名" autofocus required>
                <span class="errorName"></span>
            </div>
            <div class="form-group">
                <label>遊戲片描述</label>
                <textarea class="form-control" id="descript" rows="3" placeholder="描述" required></textarea>
                <span class="errorDes"></span>
            </div>
            <div class="form-group">
                <label>價格</label>
                <input class="form-control" type="number" min="0" step="1" id="price" placeholder="價格" required>
                <span class="errorPrice"></span>
            </div>
            <div class="form-group">
                <label>庫存</label>
                <input class="form-control" type="number" min="0" step="1" id="qty" placeholder="庫存" required>
                <span class="errorQty"></span>
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

</html>
<?php }
}
