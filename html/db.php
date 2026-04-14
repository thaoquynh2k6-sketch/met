<?php
header('Content-Type: application/json');
session_start();

$conn = mysqli_connect("bqk...clever-cloud.com", "ujr...", "mật_khẩu", "b3qce...");
mysqli_set_charset($conn, "utf8");

if (!$conn) {
    echo json_encode(['status' => 'error', 'message' => 'Không thể kết nối Database']);
    exit();
}

// Hàm hỗ trợ tạo ID ngẫu nhiên vì bạn dùng Varchar(50)
function generateID($prefix) {
    return $prefix . bin2hex(random_bytes(8)); 
}
?>