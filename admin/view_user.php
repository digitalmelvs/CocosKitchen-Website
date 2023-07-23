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
                <h3 class="display">
                    USERS ACCOUNT
                </h3>
    <div class="container">
        <div class="row">
            <form action="" method="POST">
                <div class="input-group mb-3 w-50">
                    <input type="search" placeholder="Search for an Item" name="searchkey" class="form-control" />
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
            </form>

            <div class="col-12 p-3 mb-2 bg-transparent border border-dark" style="color: black;">
               <h3>Records</h3>
                <?php

                    if (isset($_POST['searchkey'])) {
                    $searchkey = $_POST['searchkey'];
                    $userlist = query($conn, "select user_id
                                        , firstname
                                        , lastname
                                        , email
                                        , username
                                        , password
                                        , address
                                        , contact_number 
                                        , user_type
                                        , user_status
                                        , last_update
                                        FROM users 
                                        WHERE firstname LIKE '%{$searchkey}%' OR lastname LIKE '%{$searchkey}%'
                                        ORDER BY user_status, user_type DESC");
                    }else{
                        $userlist = query($conn, "select user_id
                                        , firstname
                                        , lastname
                                        , email
                                        , username
                                        , password
                                        , address
                                        , contact_number 
                                        , user_type
                                        , user_status
                                        , last_update
                                        FROM users 
                                        ORDER BY user_status, user_type DESC");
                    }

                        echo "<table class='table table-bordered'>";
                        echo "<thead>";
                            echo "<th>Fullname</th>";
                            echo "<th>Username</th>";
                            echo "<th>Password</th>";
                            echo "<th>Address</th>";
                            echo "<th>contact Number</th>";
                            echo "<th>User Type</th>";
                            echo "<th>Last Update</th>";
                            echo "<th>Status</th>";
                            echo "<th>Update</th>";
                            echo "<th>Action</th>";
                            

                        echo "</thead>";
                    foreach($userlist as $key => $row){
                        echo "<tr>";
                            echo "<td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['password'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['contact_number'] . "</td>";
                            echo "<td>" . $row['user_type'] . "</td>";
                            echo "<td>" . $row['last_update'] . "</td>";

                            $active="<span class='text-success'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-patch-check-fill' viewBox='0 0 16 16'>
  <path d='M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z'/>
</svg> </span>";
                            $inactive="<span class='text-secondary'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-patch-minus' viewBox='0 0 16 16'>
  <path fill-rule='evenodd' d='M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z'/>
  <path d='m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z'/>
</svg></span>";
                            echo "<td>" . ($row['user_status']=='A'? $active :$inactive) . "</td>"; 

                            echo "<td> <a href='view_user_submit.php?password=" . $row['password'] . "&username=" . $row['username'] . "&email=" . $row['email'] . "&firstname=" . $row['firstname'] . "&lastname=" . $row['lastname'] . "&user_id=" . $row['user_id'] . "&address=" . $row['address'] . "&contact_number=" . $row['contact_number'] . "&user_type=" . $row['user_type'] . "'> 
                                    <button class='btn btn-primary'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/></svg></button></a></td>";

                            if ($row['user_status'] == 'A') { 
                                echo "<td><a href='view_user_delete.php?user_id=". $row['user_id'] . 
                                "' class='btn btn-outline-success'><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='currentColor' class='bi bi-toggle-off' viewBox='0 0 16 16'><path d='M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z'/></svg></a></td>";
                            }
                            if ($row['user_status'] == 'I') {
                                echo "<td><a tooltip='Reactivate' href='view_user_delete.php?user_id=". $row['user_id'] . 
                                "' class='btn btn-outline-danger'><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='currentColor' class='bi bi-toggle-on' viewBox='0 0 16 16'><path d='M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z'/></svg></a></td>";
                            }

                        echo "</tr>";
                    }
                    echo "</table>";
                
                ?>
                
                
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    <!-- Link to jQuery -->
<!--    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
    <!-- Link to Bootstrap JS -->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

</body>

</html>