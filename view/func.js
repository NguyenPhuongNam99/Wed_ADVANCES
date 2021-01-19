function GetKL(id) {
  var kl = prompt("Nhập số lượng muốn mua(kg)", 10);
  if (kl != null) {
    kl = Number(kl);
    if (Number.isInteger(kl)) {
      if (kl <= 5) {
        alert("Khối lượng phải lớn hơn 5kg");
        return;
      }
      document.cookie = "kl=" + kl;
      alert("Thêm giỏ hàng thành công");
      window.location = "sanpham.php?ID=" + id;
    }
    else
      alert("Gía trị không hợp lệ");
  }
}

function Valid(f_name) {
  var mail_regex = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
  var sdt_regex = /\+?(0|84)\d{9}/;
  var email = document.forms[f_name]["Email"].value;
  var sdt = document.forms[f_name]["SDT"].value;
  if (!mail_regex.test(email)) {
    alert("Sai email");
    return false;
  } else if (!sdt_regex.test(sdt)) {
    alert("Nhập lại SDT");
    return false;
  }
  return confirm("Bạn đã chắc chắn");
}

function ValidPass(f_name) {
  var old = document.forms[f_name]["old"].value;
  var confirm = document.forms[f_name]["confirm"].value;
  var newp = document.forms[f_name]["new"].value;
  if (old == "" || confirm == "" || newp == "") {
    alert("Không được để trống mật khẩu")
    return false;
  }
  else if (old != confirm) {
    alert("Mật khẩu cũ không trùng khớp");
    return false;
  } else if (old == newp) {
    alert("Nhập mật khẩu mới khác với mật khẩu cũ");
    return false;
  }
}

function Update(form, type) {
  if (confirm("Lưu thay đổi") == false)
    return false;
  if (type == "info")
    Valid(form);
  ValidPass(form);
}