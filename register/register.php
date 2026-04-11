<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Đăng ký</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body {
    font-family: Arial, sans-serif;
    background:#f5f5f5;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.register-box{
    width:360px;
    background:#f7f5f3;
    padding:25px;
    border-radius:15px;
    box-shadow:0 0 0 2px #c9b7a6;
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    color:#6b3f26;
}

.title{
    margin:15px 0 25px 0;
    color:#6b3f26;
    text-align:center;
}

.input-group{
    display:flex;
    align-items:center;
    color:#6b3f26;
    border-bottom:1px solid #ddd;
    margin-bottom:18px;
}

.input-group input{
    border:none;
    outline:none;
    background:none;
    color:#6b3f26;
    padding:10px 0;
    width:100%;
    flex:1;
}
.input-group input::placeholder{
    border:none;
    outline:none;
    background:none;
    color:#6b3f26;
    padding:10px 0;
    width:100%;
    flex:1;
}
.btn-register{
    width:100%;
    padding:12px;
    background:#6b3f26;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
}
.btn-close {
      background: none;
      border: none;
      font-size: 22px;
      color: #999;
      cursor: pointer;
      line-height: 1;
      padding: 0 2px;
      transition: color 0.15s;
}
.input-group i{
    margin-right:10px;
    color:#6b3f26;
    display:flex;
    align-items:center;
}

</style>
</head>

<body>

<div class="register-box">
    <?php
    if (isset($_POST['register'])) {
        require_once "config.php"; 

        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $phone    = $_POST['phone'];
        $email    = $_POST['email'];
        $password = $_POST['password'];
        
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
        $errors = array();

        if (empty($username) || empty($fullname) || empty($email) || empty($password) || empty($phone)) {
            array_push($errors, "Vui lòng nhập đầy đủ các trường!");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email không hợp lệ!");
        }
        if (!preg_match('/^(0)[0-9]{9}$/', $phone)) {
            array_push($errors, "Số điện thoại phải bắt đầu bằng số 0 và có đúng 10 chữ số!");
        }
        if (strlen($password) < 8) {
            array_push($errors, "Mật khẩu phải dài ít nhất 8 ký tự!");
        }
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql); 
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) { 
            array_push($errors, "Email đã tồn tại");
        }
        $sql = "SELECT * FROM users WHERE phone = '$phone'";
        $result = mysqli_query($conn, $sql); 
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) { 
            array_push($errors, "Số điện thoại đã tồn tại");
        }
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        } else {

            $sql = "INSERT INTO users (username, fullname, phone, email, password) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "sssss", $username, $fullname, $phone, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>Chúc mừng! Bạn đã đăng ký thành công.</div>";
                
            } else {

                echo "<div class='alert alert-danger'>Lỗi SQL: " . mysqli_error($conn) . "</div>";
            }
        }
    }
    ?>

    <form action="register.php" method="post">
        <div class="header">
            <span><i class="fa-solid fa-arrow-left"></i></span>
            <h3>Đăng ký</h3>
            <button type="button" class="btn-close" id="btnClose">×</button>
        </div>
        <p class="title">Tạo tài khoản 8 a.m của bạn</p>
        
        <div class="input-group">
            <i class="fa-solid fa-user"></i>
            <input id="username" name="username" type="text" placeholder="Tên đăng nhập" required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-id-card"></i>
            <input id="fullname" name="fullname" type="text" placeholder="Họ và tên" required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-phone"></i>
            <input id="phone" name="phone" type="text" placeholder="Nhập số điện thoại" 
            minlength="10" maxlength="10" 
            pattern="[0-9]{10}"required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-envelope"></i>
            <input id="email" name="email" type="email" placeholder="Mail" required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-lock"></i>
            <input id="password" name="password" type="password" placeholder="Mật khẩu" required>
        </div>

        <button id="register" name="register" type="submit" class="btn-register">ĐĂNG KÝ</button>
    </form>
</div>

</body>
<script src="register.js"></script>
</html>