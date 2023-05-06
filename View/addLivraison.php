<?php

include '../Controller/livraisonC.php';
session_start();

// Check if the identity_card session variable is set
if (isset($_SESSION['identity_card'])) {
    // Use the identity_card session variable
    $identity_card = $_SESSION['identity_card'];

    // Assuming you have established a database connection
    $con = mysqli_connect("localhost", "root", "", "REVERSO2a28");
    if (!$con) {
        die("Connection invalid");
    } else {
        // Prepare the SQL query
        $query = "SELECT Name FROM user WHERE identity_card = ?";

        // Prepare a statement
        $stmt = mysqli_prepare($con, $query);

        // Bind the value to the parameter
        mysqli_stmt_bind_param($stmt, 's', $identity_card);

        // Execute the query
        mysqli_stmt_execute($stmt);

        // Fetch the result
        $result = mysqli_stmt_get_result($stmt);

        // Check if a row was returned
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['Name'];
            // Do something with the retrieved name
          
        } else {
           
        }

        // Do something with the identity_card variable
        $error = "";

        // create livraison
        $livraison = null;

        // create an instance of the controller
        $livraisonC = new livraisonC();
        if (
            isset($identity_card) &&
            isset($name) &&
            isset($_POST["phone_number"]) &&
            isset($_POST["postal_code"])
        ) {
            if (
                !empty($identity_card) &&
                !empty($name) &&
                !empty($_POST["phone_number"]) &&
                !empty($_POST["postal_code"])
            ) {
                $postal_code = (int)$_POST['postal_code'];

                $sql = "SELECT r.first_name as livreur_first_name, r.disponibilite, r.postal_code as livreur_postal_code
                        FROM livreur r
                        WHERE r.postal_code = ?";
                $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, 's', $_POST['postal_code']);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['disponibilite'] == 1) {
                        $livraison = new livraison(
                            $identity_card,
                            $name,
                            $_POST['phone_number'],
                            $_POST['postal_code']
                        );
                        $livraisonC->addlivraison($livraison);

                        // update livreur disponibilite to 0
                        $sql_update = "UPDATE livreur SET disponibilite = 0 WHERE postal_code = ?";
                        $stmt_update = mysqli_prepare($con, $sql_update);
                        mysqli_stmt_bind_param($stmt_update, 's', $_POST['postal_code']);
                        mysqli_stmt_execute($stmt_update);

                        header('Location:ListLivraison.php');
                        exit; // Added exit to stop further execution
                    } else {
                        echo 'Livreur not available.';
                    }
                } else {
                    echo 'Postal code not found in livreur table.';
                }
            }
           }
            else {
                $error = "Missing information";
                echo "Add invalid";
            }
          }
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
						<div class="img" style="background-image: url(images/vrr.webp);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">proceed to delivery</h3>
			      		</div>
								
			      	</div>
                      <form  action="" class="signin-form" method="POST">
        <table border="1" align="center">
        <div class="form-group mb-3">
            
            <label for="id" class="label"> identity card :
            </label>
        <input type="number" class="form-control" name="id" id="id" maxlength="20" placeholder="Identity Card" value="<?php echo $identity_card; ?>"disabled>
            </div>

        <div class="form-group mb-3">
            
                    <label for="name" class="label"> Name:
                    </label>
                <input type="text" class="form-control" name="first_name" id="first_name" maxlength="20" placeholder="first name" value="<?php echo $name; ?>"disabled>
                    </div>
             
                    <div class="form-group mb-3">

           
                    <label for="password" class="label">phone number:
                    </label>
             
                    <input class="form-control" type="text" name="phone_number" id="phone_number" placeholder="phone number" required>
              
                    </div>
                    <div class="form-group mb-3">

           
                    <label class="label" for="email">Postal code:
                    </label>
               
                    <input class="form-control" type="text" name="postal_code" id="postal_code" placeholder="postal code" required>
               
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
					<li><a  href="//zgolii" class="nav-link"><p style="color: grey;">Command</p></a></li>
					<li><a href="//bigi" class="nav-link"><p style="color: grey;">Product</p></a></li>
					<li><a href="addLivraison.php" class="nav-link"><p style="color: grey;">Delivery</p></a></li>
					<li><a href="//malik" class="nav-link"><p style="color: grey;">Training</p></a></li>
					<li><a href="//bouba" class="nav-link"><p style="color: grey;">Reclamation</p></a></li>
         
				   
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
 

	</body>
</html>



