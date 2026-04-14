<?php
include '../includes/db.php';
$action = $_GET['action'] ?? '';

if ($action == 'add') {
    $v_id = $_POST['variant_id'];
    $qty = (int)$_POST['quantity'];
    $_SESSION['cart'][$v_id] = ($_SESSION['cart'][$v_id] ?? 0) + $qty;
    echo json_encode(['status' => 'success', 'total_items' => count($_SESSION['cart'])]);
}

if ($action == 'view') {
    $items = [];
    $grand_total = 0;

    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $v_id => $qty) {
            $sql = "SELECT v.id as v_id, p.name, v.size_name, v.price 
                    FROM products_variants v JOIN products p ON v.product_id = p.id 
                    WHERE v.id = '$v_id'";
            $data = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            
            $subtotal = $data['price'] * $qty;
            $grand_total += $subtotal;
            
            $items[] = [
                'name' => $data['name'],
                'size' => $data['size_name'] ?? 'Mặc định',
                'qty' => $qty,
                'price' => (float)$data['price'],
                'subtotal' => $subtotal
            ];
        }
    }
    echo json_encode(['items' => $items, 'grand_total' => $grand_total]);
}
?>