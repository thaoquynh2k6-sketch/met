<?php
$host = "b5vgtarq20bz49perd1a-mysql.services.clever-cloud.com";
$user = "ujrwwrzik0pzmz9s";
$pass = "cs1mvrPzccsSVLFMQrQi"; 
$db   = "b5vgtarq20bz49perd1a";
$port = 3306;    

// Kết nối database
$conn = new mysqli($host, $user, $pass, $db, $port);

// Kiểm tra kết nối
if ($conn->connect_error) {
    echo "Kết nối thất bại: " . $conn->connect_error;
}
?>