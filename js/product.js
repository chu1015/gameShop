$(document).ready(function() {});

function product(e) {
  $.ajax({
    type: "post",
    url: "../routes/product.php",
    data: {
      method: "inputCart",
      id: e
    },
    success: function(e) {
      res = JSON.parse(e);
      if (res["result"] === true) {
          $("#product").css("display", "none");
        Swal.fire({
          type: "success",
          title: "成功加進購物車",
          text: "跳轉回首頁",
          timer: 1500
        }).then(function() {
          window.location.href = "index.php";
        });
      } else {
        Swal.fire({
            type: "error",
            title: "請先登入",
            text: "回首頁",
            timer: 1500
          }).then(function() {
            window.location.href = "../templates/login.html";
          });
      }
    }
  });
}
