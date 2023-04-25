<?php

include '../Controller/userC.php';



$error = "";

// create user
$user = null;

// create an instance of the controller
$userC = new userC();

if (
    isset($_POST["identity_card"]) &&
    isset($_POST["Name"]) &&
    isset($_POST["Email"]) &&
    isset($_POST["Sexe"]) &&
    isset($_POST["Password"])
) {
    if (
        !empty($_POST["identity_card"]) &&
        !empty($_POST["Name"]) &&
        !empty($_POST['Email']) &&
        !empty($_POST["Sexe"]) &&
        !empty($_POST["Password"])
    ) {
        $user = new user(
        
            $_POST['identity_card'],
            $_POST['Name'],
            $_POST['Email'],
            $_POST['Sexe'],
            $_POST['Password'],
            'Client'
        );
        $userC->adduser($user);

    }
    header('Location:index.php');
}



?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login 04</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

	
	
	</head>
<body>
	<section class="ftco-section">
		<div class="container ">
			<div class="row justify-content-center">
				
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/bg-1.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
                      <form onSubmit="onSubmit()" action="" class="signin-form" method="POST">
        <table border="1" align="center">
        <div class="form-group mb-3">
            
            <label for="identity_card" class="label"> identity card :
            </label>
        <input type="number" class="form-control" name="identity_card" id="identity_card" maxlength="20" placeholder="Identity Card" required>
            </div>

        <div class="form-group mb-3">
            
                    <label for="Name" class="label"> Name:
                    </label>
                <input type="text" class="form-control" name="Name" id="Name" maxlength="20" placeholder="Name" required>
                    </div>
                    <div class="form-group mb-3">
                    <label class="label" for="Email">Email
                    </label>
                
                <input type="email" class="form-control" name="Email" id="Email" maxlength="60" placeholder="Email" required>
        
                    </div>
                    <div class="form-group mb-3">

           
                    <label for="Sexe" class="label">Sexe:
                    </label>
             
                    <input class="form-control" type="text" name="Sexe" id="Sexe" placeholder="Sexe" required>
              
                    </div>
                    <div class="form-group mb-3">

           
                    <label class="label" for="Password">Password:
                    </label>
               
                    <input class="form-control" type="text" name="Password" id="Password" placeholder="Password" required>
               
                    </div>
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
	<header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="index.php">REVERSO</a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
					<li><a href="index.php" class="nav-link"><P style="color: grey;">Home</P></a></li>
					<li><a  href="services.html" class="nav-link"><p style="color: grey;">Command</p></a></li>
					<li><a href="barber-shop.html" class="nav-link"><p style="color: grey;">Product</p></a></li>
					<li><a href="blog.html" class="nav-link"><p style="color: grey;">Delivery</p></a></li>
					<li><a href="training.html" class="nav-link"><p style="color: grey;">Training</p></a></li>
					<li><a href="contact.html" class="nav-link"><p style="color: grey;">Reclamation</p></a></li>
          <li><a href="deleteaccount.html" class="nav-link"><p style="color: grey;">Delete</p></a></li>
				   
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script>
    function onSubmit() {
        alert("User added successfully!");
       
    }
</script>

	</body>
</html>



