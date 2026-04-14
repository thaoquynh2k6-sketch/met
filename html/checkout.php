<?php
include '../includes/db.php';

if (empty($_SESSION['cart'])) {
    echo json_encode(['status' => 'error', 'message' => 'Giỏ hàng trống']);
    exit();
}

$order_id = generateID('ORD');
$user_id = $_SESSION['user_id'] ?? 'GUEST';
$total = $_POST['total_all']; // Frontend gửi tổng đã tính (Backend nên tính lại để check)
$status = 'Pending';

// 1. Lưu thông tin đơn hàng chính
$sql_order = "INSERT INTO orders (id, user_id, total_price, status) VALUES ('$order_id', '$user_id', '$total', '$status')";

if (mysqli_query($conn, $sql_order)) {
    // 2. Lưu chi tiết từng món vào order_items
    foreach ($_SESSION['cart'] as $v_id => $qty) {
        $item_id = generateID('ITM');
        // Lấy thông tin giá và product_id từ variant
        $v_res = mysqli_fetch_assoc(mysqli_query($conn, "SELECT product_id, price FROM products_variants WHERE id = '$v_id'"));
        
        $p_id = $v_res['product_id'];
        $price = $v_res['price'];

        $sql_item = "INSERT INTO order_items (id, order_id, product_id, quantity, price) 
                     VALUES ('$item_id', '$order_id', '$p_id', '$qty', '$price')";
        mysqli_query($conn, $sql_item);
    }

    unset($_SESSION['cart']); // Xóa giỏ hàng sau khi đặt thành công
    echo json_encode(['status' => 'success', 'order_id' => $order_id]);
}
?>