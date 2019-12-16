$(document).ready(function() {
  $(".checkout").click(function() {
    $.ajax({
      type: "post",
      url: "../routes/product.php",
      data: {
        method: "Checkout",
        store: $("[name = 'store']:checked").val(),
        total: $("#total").text()
      },
      success: function(res) {
        res = JSON.parse(res);
        if (res["result"] === true) {
          swal.fire({
              type: "success",
              title: "結帳成功",
              timer: 1000,
              allowOutsideClick: false
            })
            .then(function() {
              window.location.href = "index.php";
            });
        } else if (res["erroMsg"] === "permissionError") {
          Swal.fire({
            type: "error",
            title: "您已被停權",
            timer: 1000,
            allowOutsideClick: false
          }).then(function() {
            window.location.href = "index.php";
          });
        } else if (res["erroMsg"] === "productError") {
          Swal.fire({
            type: "error",
            title: "有商品已下架請先移除該商品",
            timer: 1000,
            allowOutsideClick: false
          }).then(function() {
            window.location.href = "cart.php";
          });
        } else if (res["erroMsg"] === "qtyError") {
          Swal.fire({
            type: "error",
            title: "商品庫存不足重新輸入",
            timer: 1000,
            allowOutsideClick: false
          }).then(function() {
            window.location.href = "cart.php";
          });
        } else if (res["erroMsg"] === "cartError") {
          Swal.fire({
            type: "error",
            title: "購物車無內容",
            timer: 1000,
            allowOutsideClick: false
          }).then(function() {
            window.location.href = "cart.php";
          });
        } else {
          Swal.fire({
            type: "error",
            title: "結帳失敗",
            timer: 1000,
            allowOutsideClick: false
          }).then(function() {
            window.location.href = "checkBill.php";
          });
        }
      }
    });
  });
});
