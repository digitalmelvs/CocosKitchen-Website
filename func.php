<?php
/**
 * Check if a value exists in a column of a table
 *
 * @param mysqli $conn The database connection object
 * @param string $value The value to check
 * @param string $column The column name to check
 * @param string $table The table name to check
 * @return bool Returns true if the value exists in the column, false otherwise
 */

function is_existing(mysqli $conn, string $value, string $column, string $table): bool
{
    $value = mysqli_real_escape_string($conn, $value);
    $column = mysqli_real_escape_string($conn, $column);
    $table = mysqli_real_escape_string($conn, $table);

    $query = "SELECT COUNT(*) AS count FROM $table WHERE $column = '$value'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return ($row['count'] > 0);
    }

    return false;
}

function count_cart_items($conn, $user) {
    $sql = "SELECT COUNT(ORDER_ID) as cart FROM orders WHERE order_status='X' and user_id = ? ";
    $res = query($conn, $sql, array($user));
    foreach($res as $r){
        return $r['cart'];
    }
}

// function get_items_from_order($conn, $order_id){
//     return query($conn, "SELECT p.item_name, p.item_id, o.item_qty, pr.item_price
//                            FROM orders o
//                         inner join products p
//                               on o.item_id = p.item_id
//                      LEFT JOIN (
//                         SELECT item_id, MAX(price_id) AS price_id
//                         FROM pricing
//                         WHERE (CURRENT_DATE between eff_start_dt and eff_end_dt)
//                         or (eff_start_dt is null)
//                         GROUP BY item_id
//                     ) AS prmax 
//                       ON p.item_id = prmax.item_id
//                     JOIN pricing pr 
//                       ON prmax.item_id = pr.item_id
//                      AND prmax.price_id = pr.price_id
//                           WHERE order_id = ?
//                             AND order_status = 'X' ", array($order_id));
// }

function admin_retrieve_orders($conn, $sql_1,$sql_2, $status, $mode = 'V'){
    //mode = V = view or E = edit or C = count_order_reference
       if($mode == 'C'){
           return count(query($conn,$sql_1,array($status)));
       }
    else if($mode == 'V'){
     echo "<table class='table table-responsive table-striped table-borderless'>";  
      
            echo "<thead>";   
            echo "<tr>";  
            echo "<th>Ref Number</th>"; 
            echo "<th>Date Ordered</th>";  
            echo "<th>Quantity</th>";
            echo "<th>Amount</th>"; 
            echo "<th>Client Information</th>";   

            echo "</tr>";   
            echo "</thead>";    
            echo "<tbody>";

      $f_orders=query($conn, $sql_1, array($status));
        if(count($f_orders) > 0){
            foreach($f_orders as $ord){ ?>
              <tr class='border border-1' data-bs-toggle="collapse" href="#<?php echo $ord['order_ref_number']; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $ord['order_ref_number'];?>">
              <?php 
                                       echo "<td><b>" . $ord['order_ref_number'] . "<b></td>" ;
                                       echo "<td>" . $ord['date_ordered'] . "</td>" ;
                                       echo "<td>" . $ord['order_count'] . "</td>" ; 
                                       $total_amt=0;
                                      $order_ref_number =  $ord['order_ref_number'];
                                      $show_order_item = query($conn, $sql_2, array($status, $order_ref_number));
                                       foreach($show_order_item as $idet){
                                            $total_amt += $idet['item_price'] * $idet['item_qty'];
                                       }
                                       echo "<td>" . CURRENCY . number_format($total_amt,2) . "</td>" ;  ?>
                                       <td><?php echo strtoupper($ord['firstname']). ' ' . strtoupper($ord['lastname']) . ", " . ucwords($ord['address']) . ", (". $ord['contact_number'] .")"; ?></td>
              </tr>
              <?php 
            
            // echo "<div id=". $ord['order_ref_number'] . " class='collapse'>";
              foreach($show_order_item as $idet){
                  $total_amt += $idet['item_price'] * $idet['item_qty']; ?>
              <tr class="collapse" id="<?php echo $ord['order_ref_number'];?>">
              <?php
                 echo "<td class='float-end'>" . $idet['item_name'] ."</td>";
                 echo "<td class='float-end'>" . $idet['item_price'] . " x " . $idet['item_qty'] ."</td>";
                 echo "<td>" . number_format($idet['item_price'] * $idet['item_qty'],2) ."</td>"; ?>
              </tr>
              <?php }
             // echo "<tr><td colspan='2'>Total Amount</td><td><i class='text-danger'>Php" . number_format($total_amt,2) . "</i></td></tr>";

            //echo "</div>";          
                }
       }
      else{
            echo "<tr><td>No Orders.</td></tr>";
      }
     echo "</table>";
    }
    else if($mode == 'E'){
        echo "<table class='table table-responsive table-striped table-borderless'>";               
      $f_orders=query($conn, $sql_1, array($status));
        if(count($f_orders) > 0){
            echo "<tr>";
                echo "<td></td>";
                echo "<td>Reference No.</td>";
                echo "<td>Total Amount</td>";
                echo "<td>Date Ordered</td>";
                echo "<td>Shipping Details</td>";
            echo "</tr>";
            foreach($f_orders as $ord){ ?>
              <tr>
                 <td>
                   <?php 
                     switch($status){ 
                         case 'P':
                           ?>
                             <a href="process_orders.php?conf_ord=<?php echo $ord['order_ref_number']; ?>" class="btn btn-primary z-1"> Confirm Order</a>
                            <?php break; ?>
                         <?php 
                         case 'C': ?>
                              <a href="process_orders.php?ship_ord=<?php echo $ord['order_ref_number']; ?>" class="btn btn-primary z-1"> Ship Order</a>
                            <?php break; ?>
                        <?php 
                         case 'O': ?>
                              <a href="process_orders.php?update_delivery=<?php echo $ord['order_ref_number']; ?>" class="btn btn-primary z-1"> Delivered Order</a>
                            <?php break; ?>
                        
                        
                     <?php }
                     ?>
                    
                 </td>
                 <td><a data-bs-toggle="collapse" href="#<?php echo $ord['order_ref_number']; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $ord['order_ref_number'];?>" ><?php echo $ord['order_ref_number']; ?></a></td>
                 <td style='text-align:right'>
                     <?php 
                        $order_ref_number=$ord['order_ref_number'];
                        $show_order_item = query($conn, $sql_2, array($status, $order_ref_number));
                        $total_amt=0;
                        foreach($show_order_item as $i){
                           $total_amt += $i['item_price'] * $i['item_qty'];
                        }
                     echo CURRENCY . number_format($total_amt,2);
                     ?>
                 </td>
                  <td><?php echo $ord['date_ordered']; ?></td>
                  <td><?php echo strtoupper($ord['firstname']) . strtoupper($ord['lastname']) . ", " . ucwords($ord['address']) . ", (". $ord['contact_number'] .")"; ?></td>
              </tr>
              <?php 
             
            // echo "<div id=". $ord['order_ref_number'] . " class='collapse'>";
              foreach($show_order_item as $idet){
                 ?>
              <tr class="collapse fade align-items-center" id="<?php echo $ord['order_ref_number'];?>">
                  <td><img style="width:100px" src="../img/<?php echo $idet['item_file'];?>" alt="" class="img-thumbnail"></td>
              <?php
                 echo "<td style='text-align:right'>" . $idet['item_name'] ."</td>";
                 echo "<td>" . $idet['item_price'] . " x " . $idet['item_qty'] ."</td>";
                 echo "<td style='text-align:right'>" . CURRENCY . number_format($idet['item_price'] * $idet['item_qty'],2) ."</td>"; ?>
              </tr>
              <?php }
             // echo "<tr><td colspan='2'>Total Amount</td><td><i class='text-danger'>Php" . number_format($total_amt,2) . "</i></td></tr>";

            //echo "</div>";          
                }
       }
      else{
            echo "<tr><td>No Orders.</td></tr>";
      }
     echo "</table>";
    }
}

//this is to check if the user is logged. if not, it will be redirected to specific $location.
//@param $usertype = array('A','D')
function session_check($usertype, $loc){
    if(isset($_SESSION['user']['user_type'] )){
        if(!in_array($_SESSION['user']['user_type'], $usertype) ){
           header("location: $loc ");
        //   exit();
        }
    }
    else{
          header("location: $loc");
          // exit();
    }
}


// function encrypt_password($password, $salt ) {
//     $hash = hash('sha256', $password . $salt);
//     return $hash;
// }
// function verify_password($password, $hash, $salt) {
 
//     $hash_to_verify = hash('sha256', $password . $salt);
//     return $hash_to_verify === $hash;
// }
// //This function takes in a password and a hash (which would be retrieved from a database or other storage), adds the same salt string as the encryption function, and generates a hash using the SHA256 algorithm. It then compares this hash to the original hash, and returns true if they match, indicating that the password is correct.

// function gen_private_key($len){
//     $alpha_num=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9','0');
//     $key="";
//     for ($i = 0; $i <= $len; $i++){
//         if($i%2 == 0 && $i > 0){
//            $key .= $alpha_num[rand(0,52)];
//         }
//         else{
//              $key .= $alpha_num[rand(53,62)];
//         }
//      }
//     return $key;
// }

function gen_order_ref_number($len){
    $alpha_num=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9');
    $key="";
    for ($i = 0; $i <= $len; $i++){
        if($i%2 == 0 && $i > 0){
           $key .= $alpha_num[rand(0,25)];
        }
        else{
             $key .= $alpha_num[rand(26,sizeof($alpha_num)-1)];
        }
     }
    return $key;
    
}

function getSalesReportByDay($conn, $date) {
    
    // Perform the SQL query to retrieve items sold on the given day
    $query = "SELECT p.item_name, o.date_delivered, SUM(o.item_qty) as total_qty, SUM(p.item_price*o.item_qty) as total_sales
                FROM orders o
                INNER JOIN products p ON o.item_id = p.item_id
                WHERE o.order_status = 'D' AND DATE(o.date_delivered) = '$date'
                GROUP BY p.item_name, o.date_delivered";
    $result = mysqli_query($conn, $query);

    // Perform the SQL query to retrieve the overall total sales for the given day
    $query2 = "SELECT SUM(o.item_qty * p.item_price) as overall_total_sales
                FROM orders o
                JOIN products p ON o.item_id = p.item_id
                WHERE o.order_status = 'D' AND DATE(o.date_delivered) = '$date'";
               
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $overall_total_sales = $row2['overall_total_sales'];

    // Display the result in a table format
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h3 class='text-center display-6'>SALES ON <strong>" . date('F j, Y', strtotime($date)) . "</strong></h3>";

        echo "<table class='table table-bordered bg-transparent blur'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Date Delivered</th>";
        echo "<th>Total Quantity Sold</th>";
        echo "<th>Total Sales</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['item_name'] . "</td>";
            echo "<td>" . $row['date_delivered'] . "</td>";
            echo "<td>" . $row['total_qty'] . "</td>";
            echo "<td>" . $row['total_sales'] . "</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td colspan='2'>Overall Total Sales:</td>";
        echo "<td>" . $overall_total_sales . "</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    } else {
        // If there is no data, display a message
        echo "No sales data found for this day.";
    }
    // Close the database connection
    mysqli_close($conn);
}


function getSalesReportByRange($conn, $start_date, $end_date) {
    // Perform the SQL query to retrieve items sold within the given date range
    $query = "SELECT p.item_name, o.date_delivered, SUM(o.item_qty) as total_qty, SUM(p.item_price*o.item_qty) as total_sales
                FROM orders o
                INNER JOIN products p ON o.item_id = p.item_id
                WHERE o.order_status = 'D' AND o.date_delivered >= '$start_date' AND o.date_delivered <= '$end_date'
                GROUP BY p.item_name";
    $result = mysqli_query($conn, $query);

    // Perform the SQL query to retrieve the overall total sales for the given date range
    $query2 = "SELECT SUM(o.item_qty * p.item_price) as overall_total_sales
                FROM orders o
                JOIN products p ON o.item_id = p.item_id
                WHERE o.order_status = 'D' AND o.date_delivered >= '$start_date' AND o.date_delivered <= '$end_date'";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $overall_total_sales = $row2['overall_total_sales'];

    // Display the result in a table format
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h4 class='text-center display-6 mb-3'>SALES BETWEEN <strong>" . date('M j, Y', strtotime($start_date)) . "</strong> to <strong>" . date('M j, Y', strtotime($end_date)) . "</strong></h4>";
        
        echo "<table class='table table-bordered bg-transparent blur'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Date Delivered</th>";
        echo "<th>Total Quantity Sold</th>";
        echo "<th>Total Sales</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['item_name'] . "</td>";
            echo "<td>" . $row['date_delivered'] . "</td>";
            echo "<td>" . $row['total_qty'] . "</td>";
            echo "<td>" . $row['total_sales'] . "</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td colspan='2'>Overall Total Sales:</td>";
        echo "<td>" . $overall_total_sales . "</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    } else {
        // If there is no data, display a message
        echo "No sales data found for this date range.";
    }
    // Close the database connection
    mysqli_close($conn);
}

function DeliveredByDay($conn, $date, $courierId) {

    // Query the database
    $sql = "SELECT o.courier_user_id, o.order_ref_number, o.date_delivered, u.user_id, u.firstname, u.lastname, p.item_name, o.item_qty
        FROM orders o
        JOIN users u ON o.user_id = u.user_id
        JOIN products p ON o.item_id = p.item_id
        WHERE o.order_status = 'D' AND o.courier_user_id = '{$courierId}' AND DATE(o.date_delivered) = '{$date}'
        ORDER BY o.courier_user_id, o.date_delivered";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h3 class='text-center display-6'>DELIVERED ON <strong>" . date('F j, Y', strtotime($date)) . "</strong></h3>";

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

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No delivered orders found for today.";
    }
}

function DeliveredByDateRange($conn, $courierId, $start_date, $end_date) {
    // Query the database
    $sql = "SELECT o.courier_user_id, o.order_ref_number, o.date_delivered, u.user_id, u.firstname, u.lastname, p.item_name, o.item_qty
        FROM orders o
        JOIN users u ON o.user_id = u.user_id
        JOIN products p ON o.item_id = p.item_id
        WHERE o.order_status = 'D' AND o.courier_user_id = '{$courierId}' AND DATE(o.date_delivered) BETWEEN '{$start_date}' AND '{$end_date}'
        ORDER BY o.courier_user_id, o.date_delivered";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h4 class='text-center display-6 mb-3'>DELIVERED BETWEEN <strong>" . date('M j, Y', strtotime($start_date)) . "</strong> to <strong>" . date('M j, Y', strtotime($end_date)) . "</strong></h4>";
        
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

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No delivered orders found within the specified date range.";
    }
}

// for displaying the tracking of order status in the client side

function displayOrdersByStatus($conn, $order_status)
{
    // Retrieve user ID to use in the query
    if (isset($_SESSION['user_id'])) {
        // User is logged in, retrieve user ID from session
        $user_id = $_SESSION['user_id'];
    } else {
        // User is not logged in, redirect to login page
        header("Location: index.php");
        exit;
    }

    // Perform the join query
    $query = "SELECT o.order_ref_number, p.item_name, p.item_price, o.item_qty, o.date_ordered, o.order_status
              FROM orders o
              JOIN users u ON u.user_id = o.user_id
              JOIN products p ON p.item_id = o.item_id
              WHERE o.user_id = $user_id
              AND o.order_status = '$order_status'
              ORDER BY o.order_id DESC";

    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        // Display the order list
        echo "<table class='table table-bordered text-light'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='white-text'>Reference Number</th>";
        echo "<th class='white-text'>Product</th>";
        echo "<th class='white-text'>Quantity</th>";
        echo "<th class='white-text'>Subtotal</th>";
        echo "<th class='white-text'>Date Ordered</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td class='white-text'>" . $row['order_ref_number'] . "</td>";
            echo "<td class='white-text'>" . $row['item_name'] . "</td>";
            echo "<td class='white-text'>" . $row['item_qty'] . "</td>";
            echo "<td class='white-text'>Php " . $row['item_price'] * $row['item_qty'] . "</td>";
            echo "<td class='white-text'>" . $row['date_ordered'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        // If the query was empty, display a message
        echo "<br>" . "PROCESS IS EMPTY" . "<br>" . "<br>";
    }
}