<?php
include_once "../conn_db.php";


if(isset($_POST['user_id'])){
    $table = "users";
    
    $p_user_id  = $_POST['user_id'];
    $p_firstname = $_POST['firstname'];
    $p_lastname = $_POST['lastname'];
    $p_email = $_POST['email'];
    $p_username = $_POST['username'];
    $p_password = $_POST['password'];
    $p_address = $_POST['address'];
    $p_contact = $_POST['contact_number'];
    
    $p_user_type = $_POST['user_type'];
    $p_user_type = strtoupper($p_user_type);
    
    
    $fields = array( 'username' => $p_username
                    , 'firstname' => $p_firstname 
                    , 'lastname' => $p_lastname 
                    , 'email' => $p_email
                    , 'password' => $p_password
                    , 'address' => $p_address
                    , 'contact_number' => $p_contact
                    , 'user_type' => $p_user_type
                    );
    $filter = array( 'user_id' => $p_user_id );
    
   
   if( update($conn, $table, $fields, $filter )){
       header("location: index.php?user&update_status=success");
       exit();
   }
    else{
        header("location: index.php?user&update_status=failed");
        exit();
    }
 }
?>