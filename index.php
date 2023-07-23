<!DOCTYPE html>
<html>
<head>
    <title>COCO's KITCHEN</title>
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
            background-color: rgba(0, 0, 20, 0.5);
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

        .login-form .form-control {
            height: 40px;
            font-size: 15px;
            margin-bottom: 20px;
        }
        .login-form .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            height: 40px;
            width: 100%;
            font-size: 15px;
            font-weight: 500;
        }

        .login-form .form-check-label {
            font-size: 15px;
            color: white;
        }

        .transparent-input {
            background-color: transparent;
        }
        .blur {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.5);
        }

        input[type=username], input[type=password] {
            background-color: transparent;
            border: none;
            border-bottom: 2px solid white;
            color: white;
        }
        input[type=username]::placeholder, input[type=password]::placeholder {
            font-weight: 600;
            color: white;
        }
        .blur {
            backdrop-filter: blur(6px);
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


    <!--TEXT and Login-->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4 mt-4">
                <div class="d-flex align-items-center h-100">
                    <div>
                        <h2 class="text-light border-bottom border-4 pt-2" style=" white-space: nowrap; font-family: serif; font-size: 40px;">QUALITY FOOD <br>DIRECT AT YOUR DOOR</h2>
                        <p class="text-light" style="font-family: serif; font-size: 25px;">Feels Like HOME, Taste Like HEAVEN</p>
                        <div class="form-group mb-3">
                            <p>
                                <button class="btn btn-success border border-light mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    ORDER NOW
                                </button>

                                <a href="view_product.php" class="btn btn-primary border border-light ms-3 mt-3">
                                    VIEW PRODUCTS
                                </a>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body" style="border-radius: 5px;">
                                    Please Login to Proceed with the ORDER, Thank you!
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4"></div>

            <!--Login Form-->
            <div class="col-md-4 mt-4">
                <div class="login-form blur" style="color: white; background: transparent; width: 350px; margin: 50px auto; padding: 20px; border: 2px solid white; box-shadow: 5px 5px 10px black; border-radius: 20px;">
                    
                    <?php if(isset($_GET['msg'])){ ?>
                        <div class="alert-danger alert text-center"><?php echo $_GET['msg'];?></div>
                    <?php }?>

                    <form action="login_con.php" method="post">
                        <h3 class="text-center mb-4 mt-4" style="font-family: 'Times New Roman', Times, serif;" data-value="MEMBER LOGIN">MEMBER LOGIN</h3>       
                        <div class="col-6">
                            <div class="form-group">
                                <input type="username" class="form-control" placeholder="Username" name="username" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password" required="required">
                            </div>
                        </div>
            
                         <!--Check box for remember me sabi ni melvs-->
                        <div class="form-group form-check mb-2" style="font-weight: 400;">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
            
                        <!--Submit button ko-->
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="submit" class="btn btn-primary btn-block" value="Login" style="border-radius: 10px;">Log in</button>
                        </div>
                        
                        <div class="d-flex justify-content-center" style="font-weight: 600; ">
                            <label class="mr-2" style="color: white;">Not a member?</label>
                            <a href="registerPage.php" style="font-size: 14px; margin-left: 5px;">Register Here!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4">
                <p class="text-light mb-4 pb-2 position-absolute bottom-0 end-0 me-5 mb-5" style="font-size: 20px;">Contact No: 0963 629 5321
                <br>Location: Camalig, Albay</p>
            </div>
        </div>
        
    </div>

</body>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script>
        const audio = document.getElementById('audio');
        const playButton = document.getElementById('playButton');
        const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"

        document.querySelector("h3").onmouseover = event => {
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