<?php
include_once "conn_db.php";

if(isset($_POST['username'])){
    $n_firstname=$_POST['firstname'];
    $n_lastname=$_POST['lastname'];
    $n_address = $_POST['address'];
    $n_contact = $_POST['contactNumber'];
    $n_email=$_POST['email'];
    $n_username=$_POST['username'];
    $n_password=$_POST['password'];

    // check if the user already exists
    $sql = "SELECT * FROM users WHERE username = '$n_username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // the user already exists, so do not insert a new record
        $msg="Username Already Taken, Please Choose Another One.";
    } else {
        // insert the new user record into the users table
        $sql = "INSERT INTO users (username, password, firstname, lastname, address, email, contact_number) 
                VALUES ('$n_username', '$n_password' ,'$n_firstname', '$n_lastname', '$n_address', '$n_email', '$n_contact')";
        
        if (mysqli_query($conn, $sql)) {
            $msg="The new user account has been successfully created.";
        } 
        else {
            $msg="Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    header("location: registerPage.php?register&msg=$msg");
}

// close the database connection
mysqli_close($conn);
?>