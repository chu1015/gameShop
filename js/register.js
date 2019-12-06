$(document).ready(function() {
  /**
   * 前端驗證規則
   */
  let nameFlag, acFlag, pwFlag, ckPwFlag;
  let rule1 = /^.+$/;
  let rule2 = /^\w{6,12}$/;
  
  /**
   * 前端註冊暱稱驗證
   */
  $("#name").blur(function() {
    if (rule1.test($(this).val())) {
      $(".errorName").text("");
      $("#name").css("border-color", "green");
      nameFlag = true;
    } else {
      $(".errorName").text("請輸入姓名");
      $(".errorName").css({
        color: "red",
        "font-size": "0.8rem"
      });
      $("#name").css("border-color", "red");
    }
  });
  /**
   * 前端註冊帳號驗證
   */
  $("#account").blur(function() {
    if (rule2.test($(this).val())) {
      $(".errorAccount").text("");
      $("#account").css("border-color", "green");
      acFlag = true;
    } else {
      $(".errorAccount").text("請輸入6-12位英文或數字的帳號");
      $(".errorAccount").css({
        color: "red",
        "font-size": "0.8rem"
      });
      $("#account").css("border-color", "red");
    }
  });
  /**
   * 前端註冊密碼驗證
   */
  $("#password").blur(function() {
    if (rule2.test($(this).val())) {
      $(".errorPw").text("");
      $("#password").css("border-color", "green");
      pwFlag = true;
      if ($("#ckPassword").val() === $(this).val()) {
        $(".errorCkPw").text("");
        $("#ckPassword").css("border-color", "green");
        ckPwFlag = true;
      } else {
        $(".errorCkPw").text("與密碼不符");
        $(".errorCkPw").css({
          color: "red",
          "font-size": "0.8rem"
        });
        $("#ckPassword").css("border-color", "red");
      }
    } else {
      $(".errorPw").text("請輸入6-12位英文或數字的密碼");
      $(".errorPw").css({
        color: "red",
        "font-size": "0.8rem"
      });
      $("#password").css("border-color", "red");
    }
  });
  /**
   * 前端註冊確認密碼驗證
   */
  $("#ckPassword").blur(function() {
    if ($("#password").val() === $(this).val()) {
      $(".errorCkPw").text("");
      $("#ckPassword").css("border-color", "green");
      ckPwFlag = true;
    } else {
      $(".errorCkPw").text("與密碼不符");
      $(".errorCkPw").css({
        color: "red",
        "font-size": "0.8rem"
      });
      $("#ckPassword").css("border-color", "red");
    }
  });
  /**
   * 註冊按鈕事件
   */
  $("#register").click(function() {
    if (
      nameFlag === true &&
      acFlag === true &&
      pwFlag === true &&
      ckPwFlag === true
    ) {
      $.ajax({
        type: "post",
        url: "../routes/users.php",
        data: {
          method: "register",
          name: $("#name").val(),
          account: $("#account").val(),
          password: $("#password").val(),
          ckPassword: $("#ckPassword").val()
        },
        success: function(e) {
          let res = JSON.parse(e);
          if (res["result"] === "成功") {
            swal
              .fire({
                type: "success",
                title: "註冊成功",
                text: "跳轉至登入頁",
                timer: 1500,
                allowOutsideClick: false
              })
              .then(function() {
                window.location.href = "login.html";
              });
          } else if (res["result"] === "帳號已存在") {
            swal.fire({
              type: "error",
              title: "帳號已存在<3",
              allowOutsideClick: false
            });
          } else {
            swal.fire({
              type: "error",
              title: "格式不符<3",
              allowOutsideClick: false
            });
          }
        }
      });
    }
  });
});
