<?php 
include_once("../conn_db.php");

if(isset($_GET['update_delivery'])){
    $ord_ref = mysqli_real_escape_string($conn, htmlentities($_GET['update_delivery']));
    
    $table="orders";
    $fields=array("order_status" => 'D',
                   "courier_user_id" => $_SESSION['user']['user_id'],
                   "date_delivered" => date('Y-m-d H:i:s'));
    $filter=array("order_ref_number" => $ord_ref);
    
    if(update($conn, $table, $fields , $filter )){
        header("location: index.php?ship_order&status=$stat");
    }
                                         
}

?>