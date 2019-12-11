$(document).ready(function() {
  $(".visibility-cart").on("click", function() {
    var $btn = $(this);
    var $cart = $(".cart");
    console.log($btn);

    if ($btn.hasClass("is-open")) {
      $btn.removeClass("is-open");
      $btn.text("O");
      $cart.removeClass("is-open");
      $cart.addClass("is-closed");
      $btn.addClass("is-closed");
    } else {
      $btn.addClass("is-open");
      $btn.text("X");
      $cart.addClass("is-open");
      $cart.removeClass("is-closed");
      $btn.removeClass("is-closed");
    }
  });

  // SHOPPING CART PLUS OR MINUS
  $("a.qty-minus").on("click", function(e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest("div").find("input");
    var value = parseInt($input.val());

    if (value > 1) {
      value = value - 1;
    } else {
      value = 0;
    }

    $input.val(value);
  });

  $("a.qty-plus").on("click", function(e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest("div").find("input");
    var value = parseInt($input.val());

    if (value < 100) {
      value = value + 1;
    } else {
      value = 100;
    }

    $input.val(value);
  });

  // RESTRICT INPUTS TO NUMBERS ONLY WITH A MIN OF 0 AND A MAX 100
  $("input").on("blur", function() {
    var input = $(this);
    var value = parseInt($(this).val());

    if (value < 0 || isNaN(value)) {
      input.val(0);
    } else if (value > 100) {
      input.val(100);
    }
  });



  $(".quantity").change(function(){
    subtotal(this);
	total(this);
	console.log($(this).val());
	console.log($(this).attr("id"));
	console.log( $(this).parent().parent().find(".subtotal").html());
	// console.log();
	$.ajax({
		type:"post",
		url:"../routes/product.php",
		data:{
			method:"qtyChange",
			id:$(this).attr("id"),
			quantity: $(this).val(),
			subtotal: $(this).parent().parent().find(".subtotal").html(),
		},
		success:function(res){
			res = JSON.parse(res);
			if (res["result"] === true) {
				// swal
				//   .fire({
				// 	type: "success",
				// 	title: "數量更改完畢",
				// 	timer: 1000,
				// 	allowOutsideClick: false
				//   })
			  } else {
				Swal.fire({
				  type: "error",
				  title: "更改失敗",
				  allowOutsideClick: false
				}).then(function() {
				  window.location.href = "cart.php";
				});
			  }
		}
	})
  })

//   $(".btn-update").click(function () { 
// 	 let subtotal = $(this).parent().parent().find(".subtotal");
// 	 let quantity = $(this).parent().parent().find(".quantity");
// 	// console.log($(".subtotal").html());
// 	let arr = new Array ;
// 	let c;
// 	quantity.each(function(){
// 		c = $(this).val();
// 		//   arr.push({
// 		// 	"quantity": c,
// 		// })
// 		console.log(c);
// 	  });
// 	subtotal.each(function(){
// 		let v = parseInt($(this).text());
// 		arr.push({
// 			"subtotal": v,
// 		})
// 		console.log(v);
// 	  });
// 	  console.log(arr);
// 	// console.log($(this).parent().parent().find(".subtotal").html());
// 	// console.log($(this).parent().parent().find(".quantity").val());
//   });

});

function subtotal(e){
    let unitPrice = $(e).parent().parent().find(".sprice").html();
    let subtotal = $(e).parent().parent().find(".subtotal");
    let qty = $(e).val();
    let total = unitPrice * qty;
    subtotal.text(total);
}

function total(e) {
    let total = $(e).parent().parent().parent().find(".total");
	let subtotal = $(e).parent().parent().parent().find(".subtotal");
	// let quantity = $(e).parent().parent().parent().find(".quantity");
	// let quantity = $(e);
	// console.log(quantity);
	let money = 0;
	// let arr = new Array ;
    // quantity.each(function(){
	//   let v = parseInt($(this).val());
	//   arr.push({
	// 	"quantity": quantity,
	// 	})
	// });
	// console.log(subtotal);

    subtotal.each(function(){
	  let v = parseInt($(this).text());
	//   arr.push({
	// 	"unitPrice": v,
	// 	})
      money += v;
	});
	// console.log(arr);
total.text(money);
}

function remove(e) {
  $.ajax({
    type: "post",
    url: "../routes/product.php",
    data: {
      method: "remove",
      del: e
    },
    success: function(res) {
      res = JSON.parse(res);
      if (res["result"] === true) {
        swal
          .fire({
            type: "success",
            title: "商品已移除",
            timer: 1000,
            allowOutsideClick:false,
          })
          .then(function() {
            // console.log(parseInt($(".total").text()));
            // console.log(parseInt($(".price" + e ).text()));
            // $(".total").text() = "";
            total = $(".total").text() - $(".price" + e ).text();
            $(".badge").text($(".badge").text() - 1 );
            // console.log(total);
            $(".total").text(total);
            // console.log($(".total").text(total));

            $(".list" + e).fadeOut("fast");
          });
      } else {
        Swal.fire({
            type: "error",
            title: "移除失敗",
            allowOutsideClick: false
          }).then(function () {
              window.location.href = "cart.php"
            })
      }
    }
  });
}
