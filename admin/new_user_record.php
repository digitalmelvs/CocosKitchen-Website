<?php
include_once "../conn_db.php";

if(isset($_POST['username'])){
    $n_firstname=$_POST['firstname'];
    $n_lastname=$_POST['lastname'];
    $n_email=$_POST['email'];
    $n_username=$_POST['username'];
    $n_password=$_POST['password'];
    $p_address = $_POST['address'];
    $p_contact = $_POST['contact_number'];
    
    $p_user_type = $_POST['user_type'];
    $p_user_type = strtoupper($p_user_type);
    
    $table = "users";
    $fields = array('username' => $n_username
                    , 'firstname' => $n_firstname
                    , 'lastname' => $n_lastname  
                    , 'email' => $n_email  
                    , 'password' => $n_password
                    , 'address' => $p_address
                    , 'contact_number' => $p_contact
                    , 'user_type' => $p_user_type 
                   );
    
    if(insert($conn, $table, $fields) ){
        header("location: index.php?newuser&new_record=added");
        exit();
    }  
    else{
        header("location: new_user.php?newuser&new_record=failed");
        exit();
    }
}
?>