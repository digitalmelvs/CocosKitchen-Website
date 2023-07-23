<?php
    include_once "conn_db.php";
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Tracking</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

    <!--CSS  stylesheet-->
    <style type="text/css">
        body {
            background-image: url('assets/Cell_waneella.gif');
            background-attachment: fixed;
            overflow: auto; /* or overflow: scroll; */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh
        }
        .blur {
            backdrop-filter: blur(15px);
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style>

</head>
<body>
    <div class="container text-light mt-3" style="font-family: Georgia, 'Times New Roman', Times, serif;">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-5" data-value="TRACKING MY ORDERS STATUS">TRACKING MY ORDERS STATUS</h1>
            </div>
        </div>

        <ul class="nav nav-tabs bg-transparent" id="myTab" role="tablist">
            <li class="nav-item bg-warning" role="presentation">
                <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">Order Pending</button>
            </li>
            <li class="nav-item bg-warning" role="presentation">
                <button class="nav-link" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery" type="button" role="tab" aria-controls="delivery" aria-selected="false">Out For Delivery</button>
            </li>
            <li class="nav-item bg-warning" role="presentation">
                <button class="nav-link" id="history-tab" data-bs-toggle="tab" data-bs-target="#history" type="button" role="tab" aria-controls="history" aria-selected="false">Order History</button>
            </li>
        </ul>

        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                <div class="row">
                    <div class="col">
                        <div class="card bg-transparent blur">
                            <!-- Order Pending content (e.g., table) -->
                            <?php echo displayOrdersByStatus($conn, 'P'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                <div class="row">
                    <div class="col">
                        <div class="card bg-transparent blur">
                            <!-- Out For Delivery content (e.g., list) -->
                            <?php echo displayOrdersByStatus($conn, 'O'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                <div class="row">
                    <div class="col">
                        <div class="card bg-transparent blur">
                            <!-- Order History content (e.g., table) -->
                            <?php echo displayOrdersByStatus($conn, 'D'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-3 mb-3 bg-transparent blur">
                <a class="btn btn-outline-primary d-block mx-auto w-100" href="m_menuPage.php">Back to Menu</a>
            </div>
        </div>

    </div>
        
</body>
    <script src="bootstrap/js/bootstrap.js"></script>

    <script>
        const audio = document.getElementById('audio');
        const playButton = document.getElementById('playButton');
        const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"

        document.querySelector("h1").onmouseover = event => {
            let iterations = 0;
            let interval = setInterval(() => {
                event.target.innerText = event.target.innerText.split("")
                    .map((letter, index) => {
                    if (index < iterations) {
                    return event.target.dataset.value[index];
                    }

                    return letters[Math.floor(Math.random() * 26)]
                    })

                    .join("");

                if (iterations >= event.target.dataset.value.length) {
                    clearInterval(interval);
                }

                iterations += 1;
                }, 150);
            }
    </script>

</html>