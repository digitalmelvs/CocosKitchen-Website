<?php
    include_once "conn_db.php";
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>COCO's KITCHEN MENU PAGE</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

    <!--CSS  stylesheet-->
    <style type="text/css">
        body {
            background-image: url('assets/1041uuuonPatreon.gif');
            background-attachment: fixed;
            overflow: auto; /* or overflow: scroll; */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh
        }

        body::after {
            content: "";
            position: fixed; 
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: -1; /* Set a negative z-index to place the overlay behind other elements */
        }

        .nav-link {
            color: white;
            font-size: larger;
            font-family: 'Times New Roman', Times, serif;
        }
        .nav-link:hover {
            text-shadow: 0 0 20px white;
        }
        .nav-item {
            margin-right: 30px;
        }
        .blur {
            backdrop-filter: blur(5px);
            background-color: rgba(255, 255, 255, 0.5);
        }
        .blurr {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.5);
        }
        input[type=email], input[type=password], input[type=text], input[type=number] {
            background-color: transparent;
            border: none;
            border-bottom: 1px solid white;
            color: white;
        }
        input[type=email]::placeholder, input[type=password]::placeholder, input[type=text]::placeholder, input[type=number]::placeholder {
            color: white;
        }
        table.table-bordered, table.table-bordered th, table.table-bordered td {
            color: white;
        }
        SELECT.form-control {
            background-color: transparent;
            border: none;
            border-bottom: 1px solid white;
            color: white;
        }
        SELECT.form-control::placeholder {
            color: white;
        }
    </style>

</head>
<body>
    <!--Navigation bar ni melvs-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent mb-3">
        <div class="container mt-3">
            <a class="navbar-brand" href="#" style="color: White; font-size: 20px; font-weight: 600; font-family: Georgia, 'Times New Roman', Times, serif;">
                <img src="assets/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top me-2">
                COCO's KITCHEN
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto" style="font-weight: bolder;">
                    <li class="nav-item">
                        <a class="nav-link active" href="homePage.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="m_menuPage.php">MENU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="service.php">SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.php">ABOUT</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="modal" data-bs-target="#logoutModal">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true" style="font-family: Georgia, 'Times New Roman', Times, serif;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"  style="background: orange;">
                    <h5 class="modal-title" id="logoutModalLabel">Log out</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"  style="font-size: 20px;">
                    Are you sure you want to log out?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="logout.php" class="btn btn-primary">Log out</a>
                </div>
            </div>
        </div>
    </div>

    <!-- SEARCH BAR -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form class="d-flex" role="search" action="?search" method="GET">
                    <div class="input-group">
                        <input type="search" class="form-control" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-3">
                <a href="m_order_list.php"><button class="btn btn-primary">PURCHASE STATUS</button></a>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-3 border border-info blurr bg-transparent">
        <div class="row">
            <!-- CATEGORY NAVIGATION -->
            <div class="col-md-12">
                <h2 style="text-align: center; color: white; font-family: Georgia, 'Times New Roman', Times, serif; margin-top: 5px;">CATEGORIES</h2>
                <?php
                    // connect to your database here
                    // define your query to get the categories
                    $query = "SELECT * FROM category";
                    $result = mysqli_query($conn, $query);

                    // start the loop to generate the navigation items
                    echo '<ul class="nav nav-underline justify-content-center">';
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link active" aria-current="page" href="m_menuPage.php">ALL PRODUCT</a>';
                    echo '</li>';

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="m_menuPage.php?cat_id=' . $row['cat_id'] . '">' . $row['cat_desc'] . '</a>';
                        echo '</li>';
                    }

                    echo '</ul>';
                    // close the database connection here
                ?>

            </div>
        </div>
    </div>

    <!-- PRODUCT DISPLAY -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 blur bg-transparent border border-info" style="color: black;"> <!-- Displaying the list of products -->
                <h2 class="mt-3" style="background: linear-gradient(to bottom right, #FF4E50, #FC913A, #ED1C24, #911E4B); text-align: center; font-family:'Times New Roman', Times, serif;">List of Products</h2>
                <div class="container-fluid">
                    <?php 
                        echo "<hr>";
                        // Query the database to get the categories
                        $sql_cat = "SELECT * FROM category";
                        $stmt_cat = $db->prepare($sql_cat);
                        $stmt_cat->execute();
                        $categories = $stmt_cat->fetchAll(PDO::FETCH_ASSOC);

                        // Loop through the categories
                        foreach ($categories as $cat) {
                            // Query the database to get the products of the current category

                            // query for teh search bar
                            if(isset($_GET['search'])){
                                $searchkey=htmlentities($_GET['search']);
                                $sql_products = "SELECT item_id, item_name, item_desc, item_file, item_price
                                        FROM products
                                        WHERE item_status = 'A' AND cat_id = '{$cat['cat_id']}' AND item_name LIKE '%{$searchkey}%'";
                            }
                            // query for the CATEGORY NAVIGATION bar
                            else if (isset($_GET['cat_id'])){
                                $sql_products = "SELECT item_id, item_name, item_desc, item_file, item_price
                                        FROM products
                                        WHERE item_status = 'A' AND cat_id = $_GET[cat_id] AND cat_id = '{$cat['cat_id']}'" ;
                            
                            } else{
                                // query for all the products by category
                                $sql_products = "SELECT item_id, item_name, item_desc, item_file, item_price
                                        FROM products
                                        WHERE item_status = 'A' AND cat_id = '{$cat['cat_id']}'";
                            }

                            $stmt_products = $db->prepare($sql_products);
                            $stmt_products->execute();
                            $products = $stmt_products->fetchAll(PDO::FETCH_ASSOC);

                    // Only display the category if there are products in it
                    if (count($products) > 0) {
                        echo '<div class="container-fluid"><hr>';
                        echo '<h3 class="text-center text-light border border-info p-3" style="color: white; background: linear-gradient(to bottom right, #FF4E50, #FC913A, #ED1C24, #911E4B); ">' . $cat['cat_desc'] . '</h3>';
                        echo '<div class="row">';

                        // Loop through the products of the current category
                        foreach ($products as $row) {
                            echo '<div class="col-md-3 border border-white" style="background: linear-gradient(to bottom right, #FF4E50, #FC913A, #ED1C24, #911E4B); margin: 10px;">';
                            echo '<div class="product mt-3">';
                            echo '<img style="border: solid green 2px; max-width: 100%;" src="img/' . $row['item_file'] . '" alt="' . $row['item_name'] . '">';
                            
                            echo '<div class="overlay mt-3">';
                            echo '<div class="caption">';
                            echo '<h3>' . $row['item_name'] . '</h3>';
                            echo '<p>' . $row['item_desc'] . '</p>';
                            echo '<b><p>Price: ' . $row['item_price'] . '</p></b>';
                            
                            echo "<form action='m_displaycart.php' method='POST'>";
                            echo '<input type="hidden" name="item_id" value="' . $row['item_id'] . '" />';
                            echo '<label style="display: inline-block; width: 100px;"><b>Quantity:</b></label>';
                            echo '<input type="number" name="item_qty" value="1" min="1" max="99" style="display: inline-block; width: 50px;">';
                            echo '<button type="submit" class="btn btn-primary mt-2 mb-2 ms-2">Add to Cart</button>';
                            echo '</form>';
                            
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }

                        echo '</div>';
                        echo '</div>';
                    }
                }
                    ?>
                </div>
            </div>

            <!-- CART -->
            <div class="col-md-4 p-3 bg-transparent border border-info blur" style="color: white;">
                <h2 style="background: linear-gradient(to bottom right, #FF4E50, #FC913A, #ED1C24, #911E4B); text-align: center; font-family:'Times New Roman', Times, serif; color: black">Cart</h2>
                <?php
                    // Display the contents of the cart that the user ordered, m_displaycart.php
                    echo "<hr>";
                    if (!empty($_SESSION['cart'])) { // check if the cart is not empty
                        echo "<table class='table table-bordered'>";    
                        echo "<thead>";             
                        echo "<th>Item Name</th>";
                        echo "<th>Item Qty.</th>";
                        echo "<th>Subtotal</th>";   
                        echo "<th>Action</th>";

                        $total = 0; // initialize total variable
                        foreach ($_SESSION['cart'] as $item_id => $item_qty) {          
                            // Get the details of the item from the database
                            $query = "SELECT item_name, item_price
                                FROM products
                                WHERE item_id = ?";
                        
                            $stmt = $db->prepare($query);
                            $stmt->execute([$item_id]);
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            // Calculate the subtotal for the item
                            $subtotal = $item_qty * $result['item_price'];
                            // Add the subtotal to the total amount
                            $total += $subtotal;

                            // Display a row for the item in the cart
                            echo '<tr>';
                            echo '<td>' . $result['item_name'] . '</td>';
                            echo '<td>' . $item_qty . '</td>';
                            echo '<td>' . $subtotal . '</td>';
                            echo '<td><a class="btn btn-danger" href="m_displaycart.php?remove=' . $item_id . '">Remove</a></td>';
                            echo '</tr>';
                        }

                        // Add a button to the bottom of the cart

                        echo "<tr>";
                        echo "<td colspan='3'><strong>Grand Total: </strong>Php " . $total . "</td>";           
                        echo '<td><a class="btn btn-success me-5" href="m_checkout.php">Checkout</a></td>';                 
                        echo "</tr>";
                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        // Display a message if the cart is empty
                        echo "<hr>";
                        echo "<table class='table table-bordered'>";    
                        echo "<thead>";             
                        echo "<th>Item Name</th>";
                        echo "<th>Item Qty.</th>";
                        echo "<th>Subtotal</th>";   
                        echo "<th>Action</th>";

                        echo "<p>Your cart is currently empty, Place an order.</p>";
                    }
                ?>
            </div>
        </div>
    </div>

</body>
<script src="bootstrap/js/bootstrap.js"></script>
</html>