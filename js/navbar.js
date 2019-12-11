$(document).ready(function () {
    $("#logout").click(function() {
        $.ajax({
          type: "post",
          url: "../routes/users.php",
          data: {
            method: "logout"
          },
          success: function(e) {
            res = JSON.parse(e);
            if (res["result"] === true) {
              Swal.fire({
                type: "success",
                title: "登出成功",
                text: "跳轉回首頁",
                timer: 1500,
                allowOutsideClick: false
              }).then(function() {
                window.location.href = "index.php";
              });
            } else {
                Swal.fire({
                    type: "error",
                    title: "發生不知明錯誤",
                    text: "回首頁",
                    // timer: 1500,
                    allowOutsideClick: false
                  }).then(function() {
                    // window.location.href = "index.php";
                  });
            }
          }
        });
      });
});