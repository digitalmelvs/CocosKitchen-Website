<?php

    include_once 'conn_db.php';

    // Retrieve the form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
  
    // Prepare SQL statement to retrieve user information from the database
    $sql = "SELECT * FROM users WHERE username='$username' AND user_status = 'A' ";

    $chk_user = query($conn, $sql);
    if(count($chk_user) < 1){
        header("location:index.php?username_invalid");
    }
    else{
        if(count($chk_user) == 1) {
            // Fetch user information from the result set
            foreach($chk_user as $row){
                /*A = Admin , D = Delivery Services*/
                if( in_array($row['user_type'] , array('A','D') ) ){
                        if($row['password'] === $password ){
                        // Store user ID and user type in session variables

                        $_SESSION['user'] = array(
                            "user_id" => $row['user_id'],
                            "username" => $row['username'],
                                            
                            "firstname" => $row['firstname'],
                            "lastname" => $row['lastname'],
                                            
                            "address" => $row['address'],
                            "email" => $row['email'],
                            "contact_number" => $row['contact_number'],

                            "user_type" => $row['user_type'],
                            "user_status" => $row['user_status']
                            );

                        switch($_SESSION['user']['user_type']){
                            case 'A':  header("Location: admin/index.php?Welcome_Admin_{$_SESSION['user']['fullname']}");
                                       break;
                            case 'D':  header("Location: courier/index.php?Welcome_Courier_{$_SESSION['user']['fullname']}");
                                       break;
                            default: header("location: index.php?not_staff");
                        }

                      }
                      else{
                          header("location:index.php?wrong_password");
                      }
                }else {
                   /* C = Client*/
                    if($password === $row['password']){
                        $user_id = $row['user_id'];
                        $user_type = $row['user_type'];

                        // Store user ID and user type in session variables
                        $_SESSION['user_id'] = $row['user_id'];

                        $_SESSION['user'] = array(
                            "user_id" => $row['user_id'],
                            "username" => $row['username'],
                                            
                            "firstname" => $row['firstname'],
                            "lastname" => $row['lastname'],
                                            
                            "address" => $row['address'],
                            "email" => $row['email'],
                            "contact_number" => $row['contact_number'],

                            "user_type" => $row['user_type'],
                            "user_stats" => $row['user_stats']
                            );

                        // Redirect to appropriate page depending on user type
                        if ($_SESSION['user']['user_type'] == 'C') {
                          header("Location: homePage.php");
                        } 
                    }
                    else{
                        header("location:index.php?wrong_password");
                    }
                   
               }
                
            }
            
        }
      else if($chk_user > 1){
          header("location:index.php?duplicate_user_found");
      }
      else{
          header("location:index.php?no_user_found");
      }
  }


// Close database connection
mysqli_close($conn);

?>
