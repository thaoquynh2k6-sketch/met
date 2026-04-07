const username = document.getElementById("username");
const fullname = document.getElementById("fullname");
const phone = document.getElementById("phone");
const email = document.getElementById("email");
const password = document.getElementById("password");
const btn = document.getElementById("registerbtn");

btn.addEventListener("click", function () {

    // Lấy giá trị
    const user = username.value.trim();
    const name = fullname.value.trim();
    const phoneValue = phone.value.trim();
    const emailValue = email.value.trim();
    const pass = password.value.trim();

    // Kiểm tra rỗng
    if (!user || !name || !phoneValue || !emailValue || !pass) {
        alert("Vui lòng nhập đầy đủ thông tin!");
        return;
    }

    // Kiểm tra số điện thoại
    const phoneRegex = /^[0-9]{9,11}$/;
    if (!phoneRegex.test(phoneValue)) {
        alert("Số điện thoại không hợp lệ!");
        return;
    }

    // Kiểm tra email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailValue)) {
        alert("Email không hợp lệ!");
        return;
    }

    // Kiểm tra mật khẩu
    if (pass.length < 6) {
        alert("Mật khẩu phải có ít nhất 6 ký tự!");
        return;
    }

    // Thành công
    alert("Đăng ký thành công!");
});