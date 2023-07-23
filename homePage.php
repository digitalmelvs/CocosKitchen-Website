<!DOCTYPE html>
<html>
<head>
    <title>COCO's KITCHEN HOMEPAGE</title>
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

        .nav-link {
            color: white;
            font-size: larger;
            font-weight: 600;
            font-family: 'Times New Roman', Times, serif;
        }
        .nav-link:hover {
            text-shadow: 0 0 20px white;
        }
        .nav-item {
            margin-right: 30px;
        }
        .blur {
            backdrop-filter: blur(6px);
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style>

</head>
<body>
    <!--Navigation bar ni melvs-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent blur">
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

    <!--TEXT -->
    <div class="container my-5">
        <div class="row">
            
        </div>
        <div class="row ">
            <div class="col-12 mt-5"></div>
            <div class="col-12 mt-5"></div>
            <div class="col-md-4 mt-5">
                <div class="d-flex align-items-center h-100">
                    <div>
                        <h2 class="text-light border-bottom border-4 pt-2" style=" white-space: nowrap; font-family: serif; font-size: 40px;">QUALITY FOOD <br>DIRECT AT YOUR DOOR</h2>
                        <p class="text-light" style="font-family: serif; font-size: 25px;">Feels Like HOME, Taste Like HEAVEN</p>
                        
                        <!--ORDER BUTTON NA GREEN-->
                        <div class="form-group mb-3">
                            <a href="m_menuPage.php" class="btn btn-dark btn-block mt-3" style="background-color: green;">ORDER NOW</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
            <div class="col-4"></div>
        </div>
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4">
                <p class="text-light mb-4 pb-2 position-absolute bottom-0 end-0 me-5 mb-5" style="font-size: 20px;">Contact No: 0963 629 5321
                <br>Location: Camalig, Albay</p>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>