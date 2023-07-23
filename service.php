<!DOCTYPE html>
<html>
<head>
    <title>COCO's KITCHEN TERMS and SERVICE SERVICE PAGE</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
        body {
            /* background: linear-gradient(to bottom, #009efd, #2af598); */
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
            backdrop-filter: blur(10px);
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
     <!--Navigation bar-->
     <!-- WAG NYU NA GALAWIN ITONG NAVIGATION BAR -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-transparent ">
        <div class="container mt-3 mb-4">
            <a class="navbar-brand" href="#" style="color: White; font-size: 20px; font-weight: 600; font-family: Georgia, 'Times New Roman', Times, serif; ">
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

    <div class="container mt-5" style="color: White; font-weight: 600; font-family: Georgia, 'Times New Roman', Times, serif;">
        <div class="row text-center">
            <h1  class="mt-3">Introducing our comprehensive range of services at Coco's Kitchen!</h`>
            <div class="col-md-12 text-center border border-info mt-3 mb-3 bg-transparent blur">
                <h3 class="mt-3">We pride ourselves on delivering exceptional quality and convenience to our valued customers.</h3>
                <h3 class="mt-4">From our tantalizing selection of tapsilog variations to our seamless delivery system, <br> we offer an unforgettable dining experience in the comfort of your own home.</h3>
                <h5 class="mt-4 mb-4">Indulge in the mouthwatering combination of tender marinated beef, garlic fried rice, <br> and perfectly cooked sunny-side-up eggs, expertly crafted to satisfy your cravings.</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center mt-5">
                <h4 class="" data-value="TERMS & CONDITION">TERMS & CONDITION</h4>
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
            <div class="card card-body bg-transparent border border-warning text-light mt-3 text-center blur">
                <div class="row mt-4">
                    <h2>TERMS & CONDITIONS</h2>
                    <h5>Effective January 2023</h5>

                    <h3 class="mt-3 border border-light bg-danger">Policy</h3>
                    <p>These terms and conditions outline the rules and regulations for the use of our website and the services we provide. 
                        By accessing this website and/or using our services, you accept and agree to be bound by these terms and conditions as well as our Privacy Policy. 
                        If you do not agree to these terms and conditions, you may not access or use our website or services.</p>

                    <h3 class="mt-3 border border-light bg-danger">Ordering and Payment</h3>
                    <p class="ms-2">When placing an order through our website, 
                        you may pay either with cash on delivery or through Gcash online payment. 
                        By placing an order, you represent that you are authorized to use the selected payment method, 
                        and you authorize us to charge your selected payment method for the total amount of your order, 
                        including any applicable taxes, fees, and delivery charges.</p>

                    <h3 class="mt-3 border border-light bg-danger">Delivery</h3>
                    <p class="ms-2">We will make every effort to deliver your order within the estimated delivery time provided when you place your order, 
                        but please note that delivery times are estimates only and are not guaranteed. 
                        You are responsible for providing accurate delivery information, including your address and contact details, 
                        and for ensuring that someone is present to receive the order upon delivery. 
                        If you are not available to receive your order at the designated delivery address, 
                        we may leave your order with a neighbor, security guard, 
                        or other person you have authorized to receive your order.</p>

                    <h3 class="mt-3 border border-light bg-danger">Returns and Refunds</h3>
                    <p class="ms-2">Due to the nature of our products and for health and safety reasons, 
                        we do not accept returns or offer refunds once the food has been delivered. 
                        If you receive an incorrect or damaged item, please contact us immediately upon receipt 
                        to discuss a replacement or refund. We reserve the right to refuse returns or refunds 
                        if we believe that the request is not warranted.</p>

                    <h3 class="mt-3 border border-light bg-danger">Intellectual Property</h3>
                    <p class="ms-2">All content on our website, including text, graphics, logos, images, and software, 
                        is our property or the property of our affiliates, licensors, or suppliers, and is protected by 
                        copyright and other intellectual property laws. You may not reproduce, modify, distribute, or 
                        otherwise use any content from our website without our prior written consent.</p>

                    <h3 class="mt-3 border border-light bg-danger">Disclaimer of Warranties</h3>
                    <p class="ms-2">We make no representations or warranties of any kind, express or implied, 
                        regarding our website or the information, products, or services provided through our website. 
                        To the fullest extent permitted by law, we disclaim all warranties, express or implied, 
                        including but not limited to implied warranties of merchantability, 
                        fitness for a particular purpose, and non-infringement.</p>

                    <h3 class="mt-3 border border-light bg-danger">Limitation of Liability</h3>
                    <p class="ms-2">We will not be liable to you or any third party for       
                        any indirect, consequential, incidental, punitive, or special damages arising out of or in connection 
                        with your use of our website or the information, products, or services provided through our website. 
                        Our total liability to you for any direct damages arising out of or in connection with your use of our website 
                        or the information, products, or services provided through our website will not exceed the total amount paid by you for your order.</p>

                    <h3 class="mt-3 border border-light bg-danger">Indemnification</h3>
                    <p class="ms-2">These terms and conditions will be governed by and construed in accordance with the 
                        laws of the jurisdiction in which our business is registered, without giving effect to any 
                        principles of conflicts of law. Any disputes arising out of or in connection with these terms and conditions 
                        will be resolved exclusively in the courts of the jurisdiction in which our business is registered.</p>

                    <h3 class="mt-3 border border-light bg-danger">Collection of User Data</h3>
                    <p class="ms-2">We may collect certain personal information from you in order to provide our services and improve your user experience on our website. 
                        This information may include your name, email address, telephone number, billing and delivery addresses, and payment information.</p>
                    <p class="ms-2 mt-1">We may also collect non-personal information such as your IP address, browser type, and device information, 
                        which is used to analyze and improve the performance of our website and services. We may use cookies 
                        and other tracking technologies to collect this information, and you may opt-out of such tracking by adjusting your browser settings.</p>
                    <p class="ms-2 mt-1">We may use your personal information to communicate with you about your orders and account, to respond to your inquiries, 
                        and to send you marketing communications if you have opted-in to receive them. We will not share your personal information with third parties 
                        except as necessary to provide our services, comply with legal obligations, or enforce our rights.</p>
                    <p class="ms-2 mt-1">By using our website and services, you consent to the collection and use of your personal information as described in this section. 
                        If you wish to access, correct, or delete your personal information, please contact us</p>

                    <h3 class="mt-3 border border-light bg-danger">Modifications to Terms and Conditions</h3>
                    <p class="ms-2">We reserve the right to modify these terms and conditions at any time, without notice to you.</p>
                </div>
            </div>
            <div class="row mt-3 border border-dark bg-transparent blur text-center">
                <h5> COCO'S KITCHEN</h5>
            </div>
        </div>
    </div>

</body>
    <script src="bootstrap/js/bootstrap.js"></script>

    <script>
        const audio = document.getElementById('audio');
        const playButton = document.getElementById('playButton');
        const letters = "TERMSX&VCBHDKTION"

        document.querySelector("h4").onmouseover = event => {
            let iterations = 0;
            let interval = setInterval(() => {
                event.target.innerText = event.target.innerText.split("")
                    .map((letter, index) => {
                    if (index < iterations) {
                    return event.target.dataset.value[index];
                    }

                    return letters[Math.floor(Math.random() * 17)]
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