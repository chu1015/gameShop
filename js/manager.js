$(document).ready(function() {
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

  $(".updateImgInp").change(function() {
    id = $(this).parent().parent().parent().parent().find(".update").attr("id");
    // id = $(".update").attr(id);
    console.log(id);
    //當檔案改變後，做一些事
    // this代表<input id="imgInp">
    updateReadURL(this, id);
  });

  let nameFlag, desFlag, priceFlag, qtyFlag;
  let modifyNameFlag = true, modifyDesFlag = true, modifyPriceFlag = true, modifyQtyFlag = true;
  let rule1 = /^[\s\S]*.*[^\s][\s\S]*$/;
  let rule2 = /^[1-9][0-9]*$/;
  /**************************上傳新增商品 ************************/
  /**
   * 上傳品名輸入正規驗證
   */
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

  /**
   * 上傳描述輸入正規驗證
   */
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

  /**
   * 上傳價錢輸入正規驗證
   */
  $("#price").blur(function() {
    if (rule2.test($(this).val())) {
      $(".errorPrice").text("");
      $("#price").css("border-color", "green");
      priceFlag = true;
    } else {
      $(".errorPrice").text("請輸入開頭不為0的正整數");
      $(".errorPrice").css({
        color: "red",
        "font-size": "0.8rem"
      });
      $("#price").css("border-color", "red");
    }
  });

  /**
   * 上傳庫存輸入正規驗證
   */
  $("#qty").blur(function() {
    if (rule2.test($(this).val())) {
      $(".errorQty").text("");
      $("#qty").css("border-color", "green");
      qtyFlag = true;
    } else {
      $(".errorQty").text("請輸入開頭不為0的正整數");
      $(".errorQty").css({
        color: "red",
        "font-size": "0.8rem"
      });
      $("#qty").css("border-color", "red");
    }
  });

  /**
   * 上傳商品
   */
  $("#upLoad").click(function() {
    previewImg = $("#previewImg").attr("src");
    if (
      nameFlag === true &&
      desFlag === true &&
      priceFlag === true &&
      qtyFlag === true
    ) {
      if (previewImg != "../img/thumb.jpg") {
        $.ajax({
          type: "post",
          url: "../routes/product.php",
          data: {
            method: "upLoad",
            name: $("#gameName").val(),
            des: $("#descript").val(),
            price: $("#price").val(),
            quantity:$("#qty").val(),
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
      } else {
        Swal.fire({
          type: "error",
          title: "請上傳商品圖片",
          allowOutsideClick: false
        });
      }
    }
  });
  /**************************上傳新增商品 ************************/

  /**************************修該商品內容 ************************/
  /**
   *修改商品名正規驗證
   */
  $("#modifyGameName").blur(function() {
    if (rule1.test($(this).val())) {
      $(".modifyErrorName").text("");
      $("#modifyGameName").css("border-color", "green");
      modifyNameFlag = true;
    } else {
      $(".modifyErrorName").text("內容不能為空");
      $(".modifyErrorName").css({
        color: "red",
        "font-size": "0.8rem"
      });
      $("#modifyGameName").css("border-color", "red");
    }
  });

  /**
   *修改商品描述正規驗證
   */
  $("#modifyDescript").blur(function() {
    if (rule1.test($(this).val())) {
      $(".modifyErrorDes").text("");
      $("#modifyDescript").css("border-color", "green");
      modifyDesFlag = true;
    } else {
      $(".modifyErrorDes").text("內容不能為空");
      $(".modifyErrorDes").css({
        color: "red",
        "font-size": "0.8rem"
      });
      $("#modifyDescript").css("border-color", "red");
    }
  });

  /**
   *修改商品價格正規驗證
   */
  $("#modifyPrice").blur(function() {
    if (rule2.test($(this).val())) {
      $(".modifyErrorPrice").text("");
      $("#modifyPrice").css("border-color", "green");
      modifyPriceFlag = true;
    } else {
      $(".modifyErrorPrice").text("請輸入開頭不為0的正整數");
      $(".modifyErrorPrice").css({
        color: "red",
        "font-size": "0.8rem"
      });
      $("#modifyPrice").css("border-color", "red");
    }
  });

  /**
   *修改商品庫存正規驗證
   */
  $("#modifyQty").blur(function() {
    if (rule2.test($(this).val())) {
      $(".modifyErrorQty").text("");
      $("#modifyQty").css("border-color", "green");
      modifyQtyFlag = true;
    } else {
      $(".modifyErrorQty").text("請輸入開頭不為0的正整數");
      $(".modifyErrorQty").css({
        color: "red",
        "font-size": "0.8rem"
      });
      $("#modifyQty").css("border-color", "red");
    }
  });

  /**
   *商品編輯
   */
  $(".update").click(function() {
    previewImg = $("#previewImg").attr("src");
    id = $(this).attr("id");
    console.log($("#gameName" + id).text());
    console.log($("#price" + id).text());
    console.log($("#qty" + id).text());
    console.log(id);
    // console.log($(".price" + id).val());
	// console.log($(".qty" + id).val());
	
    if (
      modifyNameFlag === true &&
      modifyDesFlag === true &&
      modifyPriceFlag === true &&
      modifyQtyFlag === true
    ) {
      $.ajax({
        type: "post",
		url: "../routes/product.php",
		data:{
			method:"updateProduct",
			id:id,
			name:$(".gameName" + id).val(),
			des:$(".des" + id).val(),
			price:$(".price" + id).val(),
			qty:$(".qty" + id).val(),
			img:$(".img" + id).attr("src")
		},
		success:function(res){
			res = JSON.parse(res);
			if(res["result"] === true){
				swal
                .fire({
                  type: "success",
                  title: "內容修改完畢",
                  timer: 1000,
                  allowOutsideClick: false
                }).then(function(){
					$("#gameName" + id).text($(".gameName" + id).val());
					$("#price" + id).text($(".price" + id).val());
					$("#qty" + id).text($(".qty" + id).val());
				})
			} else if(res["result"] === "levelError"){
				Swal.fire({
					type: "error",
					title: "您不是管理員無法修改",
					allowOutsideClick: false
				  }).then(function() {
					window.location.href = "index.php";
				  });
			} else {
				Swal.fire({
					type: "error",
					title: "內容修該發生錯誤",
					allowOutsideClick: false
				  }).then(function() {
					window.location.href = "manager.php";
				  });
			}
		}
      });
    } else {
		console.log("boom");
	}
  });
  
});

/**
 * 商品上傳預覽圖片
 */
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $("#previewImg").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

/**
 * 商品修改預覽圖片
 */
function updateReadURL(input, id) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $("#updatePreviewImg" + id).attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

/**
 * 管理頁TAB切換
 */
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

/**
 * 管理停權功能
 */
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

/**
 * 管理上下架商品功能
 */
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
