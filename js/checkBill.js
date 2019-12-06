$(document).ready(function() {});
function bill() {
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
        swal
          .fire({
            type: "success",
            title: "結帳成功",
            timer: 1000,
            allowOutsideClick: false
          })
          .then(function() {
            window.location.href = "index.php";
          });
      } else {
        Swal.fire({
          type: "error",
          title: "結帳失敗",
          allowOutsideClick: false
        }).then(function() {
          window.location.href = "checkBill.php";
        });
      }
    }
  });
}
