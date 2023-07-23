<div class="container-fluid">
    <div class="row">
       <div class="col-lg-12">
        <h3 class="display-6">DELIVERY REPORT ni melvs</h3>
          
    <?php
    $courier = $_SESSION['user']['user_id'];

    // query the database
    $sql = "SELECT o.courier_user_id, o.order_ref_number, o.date_delivered, u.user_id, u.firstname, u.lastname, p.item_name, o.item_qty
        FROM orders o
        JOIN users u ON o.user_id = u.user_id
        JOIN products p ON o.item_id = p.item_id
        WHERE o.order_status = 'D' AND o.courier_user_id = '{$courier}'
        ORDER BY o.courier_user_id, o.date_delivered";
        $result = mysqli_query($conn, $sql);

    // display the results as an HTML table
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table class='table table-bordered bg-transparent blur'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Courier ID</th>";
        echo "<th>Reference Number</th>";
        echo "<th>Client</th>";
        echo "<th>Item Name</th>";
        echo "<th>Quantity</th>";   
        echo "<th>Date Delivered</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        }
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['courier_user_id'] . "</td>";
            echo "<td>" . $row['order_ref_number'] . "</td>";
            echo "<td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>";
            echo "<td>" . $row['item_name'] . "</td>";
            echo "<td>" . $row['item_qty'] . "</td>";
            echo "<td>" . $row['date_delivered'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

    // close the database connection
    mysqli_close($conn);
?>