<?php include_once "../conn_db.php"; 
if(isset($_GET['signout'])){
    session_destroy();
    header("Location:../index.php");
    exit();
}
session_check(array('D'), '../index.php?not_admin');


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Courier DASHBOARD</title>
    <!-- Bootstrap CSS -->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
<!--     Custom CSS -->
   
    <!-- Link to Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <style>
        body {
            background-image: url('../assets/Cell_waneella.gif');
            background-attachment: fixed;
            overflow: auto; /* or overflow: scroll; */
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
            height: 100%
        }
        .blur {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.5);
        }
        /* set the height of the accordion content */
        .accordion-content {
            height: 75%;
            overflow-y: auto;
        }
    </style>
</head>

<body class=" text-dark">

    <!-- Sidebar navigation -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center bg-warning border border-dark">
                <h1>COURIER DASHBOARD</h1>
            </div>
        </div>

        <div class="row">
            <div class="px-0 bg-warning text-dark col-md-3 col-lg-3 d-none d-md-block sidebar h-100">
                <div class="card pt-3">
                    <img src="../img/user.png" width="100px" alt="" class="img-responsive d-block mx-auto mt-1">
                    <div class="card-body">
                        <div class="mx-auto d-block text-center">
                            <h6 class="display-6">@<?php echo $_SESSION['user']['username'];?></h6>
                            <h6 class="display">Email: <?php echo $_SESSION['user']['email'];?></h6>
                            <a href="?profile" class="btn btn-link">Profile</a> | 
                            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#signOutModal">
                                Sign out
                            </button>
                        </div>
                    </div>
                </div>
                <hr>

                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Manage Deliveries
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body accordion-content">
                                <!-- content for Manage Orders -->
                                <ul>
                                    <li><a href="?ship_order">Out for Delivery Orders</a></li>
                                    <li><a href="?delivered">Delivered Orders</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-warning" id="headingThree">
                            <h5 class="mb-0 ">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Show Reports
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body accordion-content">
                                <!-- content for Show Reports -->
                                <ul>
                                    <li><a href="?del_rep">Delivery Report</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal for Signout -->
            <div class="modal fade" id="signOutModal" tabindex="-1" aria-labelledby="signOutModalLabel" aria-hidden="true" style="font-family: Georgia, 'Times New Roman', Times, serif;">
                <div class="modal-dialog">
                    <div class="modal-content border border-danger">
                        <div class="modal-header" style="background: orange;">
                            <h5 class="modal-title" id="signOutModalLabel">Sign Out</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to sign out?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="?signout" class="btn btn-outline-danger">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-9 col-lg-9 bg-light py-3 overflow-y-auto z-0 blur" style="height:100%">
            <!-- contents-->
                    <form action="" method="POST">
                        <div class="input-group mb-3 w-50">
                            <input type="search" required name="search" value="<?php if(isset($_POST['search'])){ echo $_POST['search']; }else{ echo ""; }?>" placeholder="SEARCH ORDER REFERENCE NUMBER" class="form-control">
                            <input type="hidden" name="orders" class="form-control">
                            <button class="btn btn-outline-primary">Search</button>
                        </div>
                    </form>

                    <?php
                if(isset($_POST['search'])){
                    $k = htmlentities($_POST['search']);
                    $order_sql = "SELECT o.order_ref_number AS order_ref_number,
                                        u.firstname AS firstname,
                                        u.lastname AS lastname,
                                        u.address AS address,
                                        u.contact_number AS contact_number,
                                        CAST(o.date_ordered AS date) AS date_ordered,
                                        COUNT(*) AS order_count
                                    FROM orders o
                                    INNER JOIN users u ON o.user_id = u.user_id
                                    WHERE o.order_ref_number LIKE '%$k%'
                                    AND o.order_status = ?
                                    GROUP BY o.order_ref_number,
                                        u.firstname, 
                                        u.lastname,
                                        u.address,
                                        u.contact_number,
                                        CAST(o.date_ordered AS date)
                                    ORDER BY o.date_ordered DESC;
                                    ";
                }
                else{
                    $order_sql = "SELECT o.order_ref_number AS order_ref_number,
                                    u.firstname AS firstname,
                                    u.lastname AS lastname,
                                    u.address AS address,
                                    u.contact_number AS contact_number,
                                    CAST(o.date_ordered AS date) AS date_ordered,
                                    COUNT(*) AS order_count
                                FROM orders o
                                INNER JOIN users u ON o.user_id = u.user_id
                                WHERE o.order_status = ?
                                GROUP BY o.order_ref_number,
                                    u.firstname,
                                    u.lastname,
                                    u.address,
                                    u.contact_number,
                                    CAST(o.date_ordered AS date)
                                 ORDER BY o.date_ordered DESC
                                LIMIT 50;
                                ";                                   
                   }
                   
                    $sql_itemize = "SELECT p.item_id,
                                p.item_name,
                                p.item_file,
                                o.order_id,
                                p.item_price,
                                o.item_qty
                            FROM orders o
                            INNER JOIN products p ON o.item_id = p.item_id
                            WHERE order_status = ?
                            AND o.order_ref_number = ?;
                        ";

                
                if(isset($_GET['msg'])){ ?>
                     <div class="alert alert-success"><?php echo $_GET['msg']; ?></div>
                <?php }

                if(isset($_GET['orders'])){
                    include_once "orders.php";
                }

                if(isset($_GET['profile'])){
                    include_once "profile.php";
                }

                if(isset($_GET['del_rep'])){
                    include_once "delivery_report.php";
                }

                if(isset($_GET['confirm_pending_orders'])){  ?>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                  
                                      <h3 class="display-6">Confirm Pending Orders</h3> 
                                    <?php admin_retrieve_orders($conn, $order_sql,$sql_itemize, 'P' , 'E'); ?>
                                </div>
                            </div>
                        </div>
            <?php    
                }
                
                if(isset($_GET['ship_order'])){ ?>
                     <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                  
                                      <h3 class="display-6">Ship Orders</h3> 
                                    <?php admin_retrieve_orders($conn, $order_sql,$sql_itemize, 'O' , 'E'); ?>
                                </div>
                            </div>
                        </div>
                <?php } 
                
                if(isset($_GET['delivered'])){ ?>
                     <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                  
                                      <h3 class="display-6">Delivered by Couriers</h3> 
                                    <?php admin_retrieve_orders($conn, $order_sql,$sql_itemize, 'D' , 'E'); ?>
                                </div>
                            </div>
                        </div>
                <?php } ?>
            </div>
        </div>

    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <!-- Link to jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Link to Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    
</body>
</html>