<html lang="en">
<head>
    <title>COCO's KITCHEN ABOUT PAGE</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

    <style type="text/css">
        body {
            background-image: url('assets/Cell_waneella.gif');
            background-attachment: fixed;
            overflow: auto;
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
            backdrop-filter: blur(20px);
            background-color: rgba(255, 255, 255, 0.5);
        }

    .arrow-button {
        position: relative;
        font-size: 30px;
        padding: 10px;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .arrow-down {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 0;
        height: 0;
        border-left: 20px solid transparent;
        border-right: 20px solid transparent;
        border-top: 15px solid white;
    }
    .arrow-button:hover .arrow-down {
        border-top-color: orange;
    }

    .arrow-button:hover .arrow-down {
        transform: translate(-50%, -85%);
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
    
    <div class="container-fluid mt-3" style="color: White; font-weight: 600; font-family: Georgia, 'Times New Roman', Times, serif;">
        <div class="row">
            <div class="col-md-12 text-center mt-5 mb-3">
                <h1>Welcome to Coco's Kitchen! <br> Delivering Quality Food, Direct at your Doorstep.</h1>
                <h5 class="mt-4">Our mission is to provide you with delicious, budget-friendly meals <br> That will leave you satisfied and keep you coming back for more.</h5>
                <h4 class="mt-4" data-value="ABOUT US">ABOUT US</h4>
            </div>
        </div>
        <div class="col d-flex justify-content-center">
            <div class="arrow-button">
                <button class="btn btn-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#about" aria-expanded="false" aria-controls="about">
                    <span class="arrow-down"></span>
                </button>
            </div>
        </div>

        <div class="collapse" id="about">
            <div class="card card-body bg-transparent border border-warning text-light mt-3 text-center">
                <h5>
                    We are a tapsilogan located in the charming town of Camalig in Albay, Philippines. <br>
                    Our mission is to provide you with delicious, budget-friendly meals that will leave you satisfied and coming back for more. <br><br>
                    At Coco's Kitchen, we offer a variety of silog meals, short orders, sizzling plates, and other dishes <br>
                    Whether you prefer dining in, taking out, or having your food delivered, we've got you covered.<br><br>
                    We accept orders from 8am to 8pm, 7 days a week.<br><br>

                    At Coco's Kitchen, we are committed to providing you with quality food that will make you want to order again and again. <br>
                    So why not give us a try? Visit our Facebook page at Coco's Kitchen or contact us at 09636295321 or coco'skitchen@gmail.com to learn more.
                </h5>
            </div>
        </div> 
    </div>
</body>
    <script src="bootstrap/js/bootstrap.js"></script>

    <script>
        const audio = document.getElementById('audio');
        const playButton = document.getElementById('playButton');
        const letters = "ABOSTVXU"

        document.querySelector("h4").onmouseover = event => {
            let iterations = 0;
            let interval = setInterval(() => {
                event.target.innerText = event.target.innerText.split("")
                    .map((letter, index) => {
                    if (index < iterations) {
                    return event.target.dataset.value[index];
                    }

                    return letters[Math.floor(Math.random() * 8)]
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