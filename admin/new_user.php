<!DOCTYPE html>
<html>

<head>
    <title>Users</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <!-- Link to Bootstrap CSS -->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
</head>

<body class="bg-dark text-light">
    <div class="container-fluid bg-light text-dark">   
        <div class="row">
            <div class="col-12">
                <h3 class="display text-center mt-3 mb-3">
                    CREATE USERS ACCOUNT
                </h3>
    <div class="container">
        <div class="row">
        <div class="col-2"></div>
        <div class="col-8 blur bg-warning border border-dark mb-2" style="color: black; text-align: center;">
                <h3 class="mt-3">New Record</h3>
                <?php
                     if(isset($_GET['new_record'])){
                            switch($_GET['new_record']){
                                case "added": echo "<div class='alert alert-success'>User Added.</div>";
                                      break;
                                case "failed":  echo "<div class='alert alert-danger'>User Not Added</div>";
                                      break;
                                        
                            }
                       }
                ?>
                <form action="new_user_record.php" method="post">
                    <div class="mb-3 mt-3">
                        <input type="text" required id="new_firstname" placeholder="Firstname" name="firstname" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="text" required id="new_lastname" placeholder="Lastname" name="lastname" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="text" id="email" required placeholder="Email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="text" id="new_username" required placeholder="Username" name="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="password" required id="new_password" placeholder="Password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="text" required id="new_address" placeholder="Address" name="address" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="number" required id="new_contact_number" placeholder="Contact Number" name="contact_number" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>C = Client , D = Delivery Service , A = ADMIN</label>
                        <input type="text" required id="user_type" placeholder="User Type" name="user_type" class="form-control">
                    </div>
                        <input type="submit" class="btn btn-primary float-end mt-3 mb-3">
                </form>
            </div>
            <div class="col-2"></div>
            
        </div>
    </div>

    <!-- Link to jQuery -->
<!--    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
    <!-- Link to Bootstrap JS -->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

</body>

</html>