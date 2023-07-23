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
            background-image: url('assets/WarmthbyminimossonDeviantArt.gif');
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
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.5);
        }
        .blurcard {
            backdrop-filter: blur(20px);
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style>

</head>
<body>
    <!--Navigation bar ni melvs-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container mt-3">
            <a class="navbar-brand" href="#" style="color: White; font-size: 20px; font-weight: 600; font-family: Georgia, 'Times New Roman', Times, serif;">
                <img src="assets/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top me-2">
                COCO's KITCHEN
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown" >
                <ul class="navbar-nav ms-auto" style="font-weight: bolder;">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">HOME</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link active" href="view_product.php">MENU</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="service_out.php">SERVICES</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="about_out.php">ABOUT</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container bg-transparent text-light">
        <div class="row z-1">
            <h3 class="display-3" style="font-family: Georgia, 'Times New Roman', Times, serif; margin-top: 5px;">Products</h3>

            <div class="col-md-3"></div>

            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="search" placeholder="Search for an Item" name="searchkey" class="form-control" />
                        <button class="btn btn-success" type="submit">Search</button>
                    </div>
                </form>
            </div>

            <div class="col-md-3"></div>

            <div class="col-12">
                <?php
                    if (isset($_POST['searchkey'])) {
                    $searchkey = $_POST['searchkey'];
                    $items = query($conn, "SELECT p.item_id as item_id
                                , p.item_name as item_name
                                , p.item_file as item_file 
                                , p.date_added as date_added
                                , p.item_price as item_price
                                , p.item_desc as item_desc
                                , p.item_status
                                , c.cat_desc as cat_desc
                                , c.cat_id as cat_id
                            FROM products p
                            JOIN category c on p.cat_id = c.cat_id
                            WHERE p.item_name LIKE '%{$searchkey}%'");
                    } else {
                        $items = query($conn, "SELECT p.item_id as item_id
                                , p.item_name as item_name
                                , p.item_file as item_file 
                                , p.date_added as date_added
                                , p.item_price as item_price
                                , p.item_desc as item_desc
                                , p.item_status
                                , c.cat_desc as cat_desc
                                , c.cat_id as cat_id
                            FROM products p
                            JOIN category c on p.cat_id = c.cat_id
                            ORDER BY c.cat_id");
                    }
                ?>

                <div class="row">
                    <?php foreach($items as $item){ ?>

                        <div class="col-md-3 mt-3 bg-transparent blurcard border border-info">
                            <div class="product mt-2 ">
                                <img style="border: solid green 2px; max-width: 100%;" src="img/<?php echo $item['item_file'];?>" alt="<?php echo $item['item_name']; ?>" height="300px">
                                    <div class="overlay">
                                        <div class="caption">
                                        <div class="caption">  
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush mb-0 pb-0">
                                <!-- item informtation -->
                                <div class="row">
                                    <div class="col-md-12"  style="text-align: center;">
                                        <h3 class="card-title mt-2"> <?php echo ucwords($item['item_name']); ?></h3>
                                        <h6 class="card-title mt-3 mb-1"> <?php echo ucwords($item['cat_desc']); ?></h6>
                                        <small class="card-text text-truncate overflow-y-visible"> <?php echo $item['item_desc']; ?> </small>
                                        <blockquote class="blockquote"><?php echo CURRENCY . number_format($item['item_price'],2) ;?></blockquote>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                </div>

            </div>
        </div>

</body>
<script src="bootstrap/js/bootstrap.js"></script>
</html>