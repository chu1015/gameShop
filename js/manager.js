$(document).ready(function() {
  // document.getElementById("defaultOpen").click();
  // document.getElementsByClassName("tablinks")[0].click();
  let githubURL = new URL(window.location.href);
  let params = githubURL.searchParams;
  let key;
  for (let pair of params.entries()) {
    key = pair[0];
  }
  // console.log(key);
  if (key == "user") {
    document.getElementsByClassName("tablinks")[1].click();
  } else {
    document.getElementsByClassName("tablinks")[0].click();
  }

  $("#imgInp").change(function() {
    //當檔案改變後，做一些事
    // this代表<input id="imgInp">
    readURL(this);
  });

  let rule1 = /^[\s\S]*.*[^\s][\s\S]*$/;
  $("#gameName").blur(function() {
    if (rule1.test($(this).val())) {
      $(".errorName").text("");
      $("#gameName").css("border-color", "green");
      nameFlag = true;
    } else {
      $(".errorName").text("內容不能為空");
      $(".errorName").css({
        color: "red",
        "font-size": "0.8rem"
      });
      $("#gameName").css("border-color", "red");
    }
  });

  $("#descript").blur(function() {
    if (rule1.test($(this).val())) {
      $(".errorDes").text("");
      $("#descript").css("border-color", "green");
      desFlag = true;
    } else {
      $(".errorDes").text("內容不能為空");
      $(".errorDes").css({
        color: "red",
        "font-size": "0.8rem"
      });
      $("#descript").css("border-color", "red");
    }
  });

  $("#upLoad").click(function() {
    if (nameFlag === true && desFlag === true) {
      $.ajax({
        type: "post",
        url: "../routes/product.php",
        data: {
          method: "upLoad",
          name: $("#gameName").val(),
          des: $("#descript").val(),
          price: $("#price").val(),
          img: $("#previewImg").attr("src")
        },
        success: function(res) {
          res = JSON.parse(res);
          if (res["result"] === true) {
            swal
              .fire({
                type: "success",
                title: "商品已成功上傳",
                timer: 1000,
                allowOutsideClick: false
              })
              .then(function() {
                window.location.href = "manager.php";
              });
          } else {
            Swal.fire({
              type: "error",
              title: "商品上傳失敗",
              allowOutsideClick: false
            }).then(function() {
              window.location.href = "manager.php";
            });
          }
        }
      });
    }
  });
});

function manager(evt, managerName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(managerName).style.display = "block";
  evt.currentTarget.className += " active";
}

function Suspension(e, id) {
  if (e === "1") {
    $.ajax({
      type: "post",
      url: "../routes/users.php",
      data: {
        method: "Suspension",
        permission: e,
        userId: id
      },
      success: function(res) {
        $(".user" + id).attr("onclick", "Suspension(`0`, `" + id + "`)");
        res = JSON.parse(res);
        if (res["result"] === true) {
          swal.fire({
            type: "success",
            title: "用戶已被停權",
            timer: 1000,
            allowOutsideClick: false
          });
        } else {
          Swal.fire({
            type: "error",
            title: "狀態改變失敗",
            allowOutsideClick: false
          }).then(function() {
            window.location.href = "manager.php";
          });
        }
      }
    });
  } else {
    $.ajax({
      type: "post",
      url: "../routes/users.php",
      data: {
        method: "Suspension",
        permission: e,
        userId: id
      },
      success: function(res) {
        $(".user" + id).attr("onclick", "Suspension(`1`, `" + id + "`)");
        res = JSON.parse(res);
        if (res["result"] === true) {
          swal
            .fire({
              type: "success",
              title: "用戶已開通",
              timer: 1000,
              allowOutsideClick: false
            })
            .then(function() {
              $("#user" + id).attr("checked", "checked");
            });
        } else {
          Swal.fire({
            type: "error",
            title: "狀態改變失敗",
            allowOutsideClick: false
          }).then(function() {
            window.location.href = "manager.php";
          });
        }
      }
    });
  }
}

function status(e, id) {
  if (e === "1") {
    $.ajax({
      type: "post",
      url: "../routes/product.php",
      data: {
        method: "status",
        status: e,
        productId: id
      },
      success: function(res) {
        $(".good" + id).attr("onclick", "status(`0`, `" + id + "`)");
        res = JSON.parse(res);
        if (res["result"] === true) {
          swal.fire({
            type: "success",
            title: "商品已下架",
            timer: 1000,
            allowOutsideClick: false
          });
        } else {
          Swal.fire({
            type: "error",
            title: "商品下架失敗",
            allowOutsideClick: false
          }).then(function() {
            window.location.href = "manager.php";
          });
        }
      }
    });
  } else {
    $.ajax({
      type: "post",
      url: "../routes/product.php",
      data: {
        method: "status",
        status: e,
        productId: id
      },
      success: function(res) {
        $(".good" + id).attr("onclick", "status(`1`,`" + id + "`)");
        res = JSON.parse(res);
        if (res["result"] === true) {
          swal.fire({
            type: "success",
            title: "商品已上架",
            timer: 1000,
            allowOutsideClick: false
          });
        } else {
          Swal.fire({
            type: "error",
            title: "商品上架失敗",
            allowOutsideClick: false
          }).then(function() {
            window.location.href = "manager.php";
          });
        }
      }
    });
  }
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $("#previewImg").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
