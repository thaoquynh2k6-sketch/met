
// Lấy phần tử
const username = document.getElementById("username");
const fullname = document.getElementById("fullname");
const phone = document.getElementById("phone");
const email = document.getElementById("email");
const password = document.getElementById("password");
const registerBtn = document.getElementById("registerBtn");

// Regex kiểm tra
const phoneRegex = /^[0-9]{9,11}$/;
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

// Hàm validate
function validateForm() {

    if (username.value.trim() === "") {
        alert("Vui lòng nhập tên đăng nhập");
        return false;
    }

    if (fullname.value.trim() === "") {
        alert("Vui lòng nhập họ và tên");
        return false;
    }

    if (!phoneRegex.test(phone.value)) {
        alert("Số điện thoại không hợp lệ");
        return false;
    }

    if (!emailRegex.test(email.value)) {
        alert("Email không hợp lệ");
        return false;
    }

    if (password.value.length < 6) {
        alert("Mật khẩu phải từ 6 ký tự trở lên");
        return false;
    }

    return true;
}

// Xử lý khi bấm nút
registerBtn.addEventListener("click", function() {

    if (validateForm()) {

        const userData = {
            username: username.value,
            fullname: fullname.value,
            phone: phone.value,
            email: email.value,
            password: password.value
        };

        console.log("Dữ liệu đăng ký:", userData);

        alert("Đăng ký thành công!");

        // Reset form
        username.value = "";
        fullname.value = "";
        phone.value = "";
        email.value = "";
        password.value = "";
    }
});
</script>