const username = document.getElementById("username");
const fullname = document.getElementById("fullname");
const phone = document.getElementById("phone");
const email = document.getElementById("email");
const password = document.getElementById("password");
const btn = document.getElementById("register");
const icon = document.getElementById("iconSubmit");

btn.addEventListener("click", handleRegister);
// Hàm xử lý chung
function handleRegister(e) {
    e.preventDefault();

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

    // Email
    const validateEmail = (email) => {
        return String(email)
            .toLowerCase()
            .match(
                /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
    };

    // Phone
    const phoneRegex = /^(0[3|5|7|8|9])[0-9]{8}$/; 

    if (!phoneRegex.test(phoneValue)) {
    alert("Số điện thoại không hợp lệ! Vui lòng nhập đúng 10 chữ số.");
    return false; 
    }
    

    // Email check
    if (!validateEmail(emailValue)) {
        alert("Email không hợp lệ!");
        return;
    }

    // Password
    if (pass.length < 6) {
        alert("Mật khẩu phải có ít nhất 6 ký tự!");
        return;
    }

    // Thành công
    alert("Đăng ký thành công!");
    window.location.href = "login.php";
}
document.getElementById('btnClose').addEventListener('click', () => {
    window.location.href = "login.php";
});
