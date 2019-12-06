$(document).ready(function() {
  Swal.fire({
    type: "error",
    title: "發生不知明錯誤",
    text: "回首頁",
    timer: 1500,
    allowOutsideClick: false
  }).then(function() {
    window.location.href = "../templates/login.html";
  });
  
});