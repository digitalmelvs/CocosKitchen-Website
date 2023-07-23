<!DOCTYPE html>
        <!-- http://localhost/cocoskitchenwebsite/bRegisterPage.html -->
<html>
<head>
    <title>COCO's KITCHEN REGISTER PAGE</title>
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
        
        .signup-form h2 {
            font-family: 'Times New Roman', Times, serif;
        }

        .signup-form .form-control {
            
            height: 40px;
            font-size: 15px;
            margin-bottom: 20px;
        }
        .blur {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.5);
        }
        input[type=email], input[type=password], input[type=text] {
            background-color: transparent;
            border: none;
            border-bottom: 1px solid white;
            color: white;
        }
        input[type=email]::placeholder, input[type=password]::placeholder, input[type=text]::placeholder {
            color: white;
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
    
    <!--Sign up Form-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="signup-form blur" style="border-radius: 2%; border: 2px solid #ccc; padding: 20px; width: 700px; margin: 5px auto; background: transparent; box-shadow: 5px 5px 10px black;">
                    
                    <?php if(isset($_GET['msg'])){ ?>
                        <div class="alert-primary alert text-center"><?php echo $_GET['msg'];?></div>
                    <?php }?>

                    <form action = "register_submit.php" method="post">
                        <h2 class="text-center mb-4" style="color: white;" data-value="REGISTRATION FORM">REGISTRATION FORM</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name" name="firstname" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name" name="lastname" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address" name="address" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Contact Number" name="contactNumber" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirmPassword" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-check mb-3 ms-3">
                            <input type="checkbox" class="form-check-input" id="terms" required>
                            <label class="form-check-label" for="terms" style="color: white;">I agree to the <a href="register_terms.php">terms and conditions</a></label>
                        </div>
                        <div class="d-grid gap-2 ">
                            <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                            <a href="index.php" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.js"></script>
    <script>
        // Get the password and confirm password fields
        var passwordField = document.getElementsByName("password")[0];
        var confirmPasswordField = document.getElementsByName("confirmPassword")[0];
      
        // Add an event listener to the form submission
        document.getElementsByTagName("form")[0].addEventListener("submit", function(event) {
          // Check if the password and confirm password fields have the same value
          if (passwordField.value !== confirmPasswordField.value) {
            // If they don't match, prevent the form from submitting and show an error message
            event.preventDefault();
            alert("Passwords do not match. \nPlease make sure the passwords you entered match.");
          }
        });
      </script> 
      <script>
        const audio = document.getElementById('audio');
        const playButton = document.getElementById('playButton');
        const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"

        document.querySelector("h2").onmouseover = event => {
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
</body>
</html>