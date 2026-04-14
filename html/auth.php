<?php
header('Content-Type: application/json');
require_once "db.php";
require_once "api-controllers.php"; // Đảm bảo bạn đã tách logic ra file này để dễ quản lý
$action = $_GET['action'] ?? '';

if ($action == 'register') {
    $id = generateID('USR');
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);

    $sql = "INSERT INTO users (id, username, fullname, password) VALUES ('$id', '$user', '$fullname', '$pass')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Đăng ký thành công']);
    }
}

if ($action == 'login') {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $sql = "SELECT * FROM users WHERE username = '$user'";
    $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    if ($res && password_verify($_POST['password'], $res['password'])) {
        $_SESSION['user_id'] = $res['id'];
        echo json_encode(['status' => 'success', 'user' => $res['fullname']]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Sai tài khoản hoặc mật khẩu']);
    }
}
?>