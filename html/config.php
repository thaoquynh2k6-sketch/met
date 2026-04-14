<?php
$host = "localhost";
$user = "root";
$pass = "root"; // MAMP trên Mac mặc định mật khẩu là "root"
$db   = "8am_db";
$port = 8889;    // Cổng MySQL mặc định của MAMP là 8889

// Kết nối database
$conn = new mysqli($host, $user, $pass, $db, $port);

// Kiểm tra kết nối
if ($conn->connect_error) {
    echo "Kết nối thất bại: " . $conn->connect_error;
}
?>