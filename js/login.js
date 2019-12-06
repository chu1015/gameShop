$(document).ready(function(){
    let acFlag, pwFlag;
    let rule = /^\w{6,12}$/;

    /**
     * 前端帳號驗證
     */
    $("#account").blur(function () { 
        if (rule.test($(this).val())){
            $(".errorAccount").text("");
            $("#account").css("border-color", "green");
            acFlag = true;
        } else {
            $(".errorAccount").text("請輸入6-12位英文或數字的帳號");
            $(".errorAccount").css({
                "color":"red",
                "font-size":"0.8rem"
            });
            $("#account").css("border-color", "red");
        }
    });
    /**
     * 前端密碼驗證
     */
    $("#password").blur(function(){
        if (rule.test($(this).val())){
            $(".errorPassword").text("");
            $("#password").css("border-color", "green");
            pwFlag = true;
        } else {
            $(".errorPassword").text("請輸入6-12位英文或數字的密碼");
            $(".errorPassword").css({
                "color":"red",
                "font-size":"0.8rem"
            });
            $("#password").css("border-color", "red");
        }
    })
    $("#login").click(function(){
        if (acFlag === true && pwFlag === true){
            $.ajax({
                type: "post",
                url: "../routes/users.php",
                data: {
                    method: "login",
                    account: $("#account").val(),
                    password: $("#password").val()
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if (response["result"] === true) {
                        swal.fire({
                            type:"success",
                            title:"登入成功",
                            text:"跳轉回首頁",
                            timer:1500,
                            allowOutsideClick: false
                        }).then(function(){
                            window.location.href = "../views/index.php";
                        })
                    } else {
                        swal.fire({
                            type: "error",
                            title: "帳號或密碼錯誤",
                            allowOutsideClick: false
                        }).then(function(){
                            $("#account").val("");
                            $("#password").val("");
                        });
                    }
                }
            });
        }
    })



})