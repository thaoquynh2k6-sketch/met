<?php
header('Content-Type: application/json');
session_start();

// 1. KẾT NỐI DATABASE (Dùng chung cho tất cả)
$conn = mysqli_connect("b5vgtarq20bz49perd1a-mysql.services.clever-cloud.com", "ujrwwrzik0pzmz9s", "cs1mvrPzccsSVLFMQrQi", "b5vgtarq20bz49perd1a");
mysqli_set_charset($conn, "utf8");

if (!$conn) {
    echo json_encode(['status' => 'error', 'message' => 'Lỗi kết nối server']);
    exit();
}

// Hàm bổ trợ tạo ID vì bạn dùng varchar(50)
function generateID($prefix) {
    return $prefix . bin2hex(random_bytes(8));
}

// 2. ĐIỀU HƯỚNG LOGIC (Dựa vào biến action trên URL)
$action = $_GET['action'] ?? '';

switch ($action) {
    
    // --- LOGIC ĐĂNG NHẬP ---
    case 'login':
        $user = mysqli_real_escape_string($conn, $_POST['username']);
        $sql = "SELECT * FROM users WHERE username = '$user'";
        $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        if ($res && password_verify($_POST['password'], $res['password'])) {
            $_SESSION['user_id'] = $res['id'];
            echo json_encode(['status' => 'success', 'fullname' => $res['fullname']]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Sai tài khoản']);
        }
        break;

    // --- LOGIC LẤY GIÁ KHI ĐỔI SIZE ---
    case 'get_variant':
        $p_id = $_GET['product_id'];
        $size = $_GET['size_name'] ?? "";
        
        // Xử lý logic size NULL cho bánh không có kích cỡ
        if ($size === "" || $size === "null") {
            $sql = "SELECT * FROM products_variants WHERE product_id = '$p_id' AND size_name IS NULL";
        } else {
            $sql = "SELECT * FROM products_variants WHERE product_id = '$p_id' AND size_name = '$size'";
        }
        $variant = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        echo json_encode($variant);
        break;

    // --- LOGIC GIỎ HÀNG & CỘNG TỔNG ---
    case 'cart_view':
        $items = [];
        $subtotal = 0;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $v_id => $qty) {
                $sql = "SELECT v.id, p.name, v.size_name, v.price 
                        FROM products_variants v JOIN products p ON v.product_id = p.id 
                        WHERE v.id = '$v_id'";
                $data = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                $line_total = (float)$data['price'] * $qty;
                $subtotal += $line_total;
                $items[] = array_merge($data, ['qty' => $qty, 'subtotal' => $line_total]);
            }
        }
        // Logic tính phí ship: Freeship cho đơn trên 500k
        $ship = ($subtotal > 500000 || $subtotal == 0) ? 0 : 20000;
        echo json_encode(['items' => $items, 'subtotal' => $subtotal, 'ship' => $ship, 'grand_total' => $subtotal + $ship]);
        break;

    // --- LOGIC CHỐT ĐƠN & TRỪ KHO ---
    case 'checkout':
        if (empty($_SESSION['cart'])) {
            echo json_encode(['status' => 'error', 'message' => 'Giỏ hàng trống']);
            break;
        }

        $order_id = generateID('ORD');
        $user_id = $_SESSION['user_id'] ?? 'GUEST';
        $total = (float)$_POST['grand_total']; // Tổng tiền sau khi JS đã gọi cart_view để check

        // 1. Lưu Đơn hàng
        $sql_order = "INSERT INTO orders (id, user_id, total_price, status) VALUES ('$order_id', '$user_id', '$total', 'Pending')";
        
        if (mysqli_query($conn, $sql_order)) {
            foreach ($_SESSION['cart'] as $v_id => $qty) {
                // 2. Lưu chi tiết & Tính toán trừ kho
                $v_info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT product_id, price FROM products_variants WHERE id = '$v_id'"));
                $p_id = $v_info['product_id'];
                $price = $v_info['price'];
                $item_id = generateID('ITM');

                mysqli_query($conn, "INSERT INTO order_items (id, order_id, product_id, quantity, price) VALUES ('$item_id', '$order_id', '$p_id', '$qty', '$price')");
                
                // Logic: Cập nhật số lượng tồn kho thực tế
                mysqli_query($conn, "UPDATE products_variants SET stock_quantity = stock_quantity - $qty WHERE id = '$v_id'");
            }
            unset($_SESSION['cart']);
            echo json_encode(['status' => 'success', 'order_id' => $order_id]);
        }
        break;

    default:
        echo json_encode(['status' => 'error', 'message' => 'Action không hợp lệ']);
}
?>
