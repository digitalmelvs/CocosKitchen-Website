<!DOCTYPE html>
<html>

<head>
    <title>Users</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <!-- Link to Bootstrap CSS -->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
</head>

<body class="bg-dark text-light">
    <div class="container-fluid bg-light text-dark">   
        <div class="row">
            <div class="col-12">
                <h3 class="display text-center mt-5 mb-3">
                    ADMIN PROFILE
                </h3>
            </div>
            <div class="col-3"></div>
                <div class="col-md-6">          
                    <div class="card">
                        <div class="card-body border border-info">
                            <h5 class="card-title">ADMIN INFORMATION</h5>
                            <hr>
                        <div class="row">
                            <div class="col-12">
                                <h6><strong>Name: </strong><?php echo $_SESSION['user']['firstname'] . " " . $_SESSION['user']['lastname']; ?></h6>
                            </div>
            
                            <div class="col-12 mt-3">
                                <h6><strong>Address: </strong><?php echo $_SESSION['user']['address']; ?></h6>
                            </div>

                            <div class="col-12 mt-3">
                                <h6><strong>Contact Number: </strong><?php echo $_SESSION['user']['contact_number']; ?></h6>
                            </div>
                            <div class="col-12 mt-3">
                                <h6><strong>Username: </strong><?php echo $_SESSION['user']['username']; ?></h6>
                            </div>
                            <div class="col-12 mt-3">
                                <h6><strong>Email: </strong><?php echo $_SESSION['user']['email']; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-3"></div>
        </div>
    </div>
</div>

    <!-- Link to jQuery -->
<!--    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
    <!-- Link to Bootstrap JS -->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

</body>

</html>