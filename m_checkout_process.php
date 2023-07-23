<?php
    // this is the the php process 
    // for submitting the data of the checkout to the database 

include('conn_db.php');

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM Users WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "Error: User not found.";
    exit();
}

$item_ids = array_keys($_SESSION['cart']);
$item_ids_str = implode(",", $item_ids);

$sql = "SELECT * FROM Products WHERE item_id IN ($item_ids_str)";
$result = mysqli_query($conn, $sql);
$items = mysqli_fetch_all($result, MYSQLI_ASSOC);

$date_ordered = date('Y-m-d H:i:s');
$order_status = 'P';

$ref_number = gen_order_ref_number(12);
$table = "Orders";
$field = "order_ref_number";
while (is_existing($conn, $ref_number, $field, $table)) {
    $ref_number = gen_order_ref_number(12);
}

$sql = "INSERT INTO Orders (user_id, item_id, item_qty, date_ordered, order_status, order_ref_number) VALUES ";

foreach ($items as $item) {
    $item_id = $item['item_id'];
    $item_qty = $_SESSION['cart'][$item_id];

    $sql .= "($user_id, $item_id, $item_qty, '$date_ordered', '$order_status', '$ref_number'),";
}

$sql = rtrim($sql, ',');
mysqli_query($conn, $sql);

header('Location: m_order_list.php');
exit;

?>
