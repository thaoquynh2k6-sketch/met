<?php
include '../includes/db.php';

$p_id = $_GET['product_id'];
$size = $_GET['size_name'] ?? null;

// Logic: Nếu size là null hoặc chuỗi "null", tìm bản ghi có size_name IS NULL
if ($size === null || $size === "null" || $size === "") {
    $sql = "SELECT * FROM products_variants WHERE product_id = '$p_id' AND size_name IS NULL";
} else {
    $sql = "SELECT * FROM products_variants WHERE product_id = '$p_id' AND size_name = '$size'";
}

$result = mysqli_query($conn, $sql);
$variant = mysqli_fetch_assoc($result);

if ($variant) {
    echo json_encode(['status' => 'success', 'variant' => $variant]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy biến thể']);
}
?>