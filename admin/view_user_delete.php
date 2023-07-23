<?php
include_once "../conn_db.php";

if(isset($_GET['user_id'])){
    $d_user_id = $_GET['user_id'];
    $table = "users";
    
    // Check the current status of the user
    $query = "SELECT user_status FROM $table WHERE user_id = $d_user_id";
    $result = mysqli_query($conn, $query);
    
    if($result && mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $current_status = $row['user_status'];
        
        // Determine the new status based on the current status
        if($current_status == 'A'){
            $new_status = 'I'; // Inactivate the user
            $msg="User Deactivated";
        }
        elseif($current_status == 'I'){
            $new_status = 'A'; // Reactivate the user
            $msg="User Reactivated";
        }
        
        // Update the user status in the database
        $fields = array( 'user_status' => $new_status );
        $filter = array( 'user_id' => $d_user_id );

        // Assuming you have a function called 'update()' to update the database
        if( update($conn, $table, $fields, $filter )){
            header("location: index.php?user&msg=$msg");
            exit();
        }
        else{
            header("location: index.php?user&update_status=failed");
            exit();
        }
    }
    else{
        header("location: index.php?user&update_status=failed");
        exit();
    }
}
?>
