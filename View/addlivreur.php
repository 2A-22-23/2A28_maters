<?php

include '../Controller/livreurC.php';
$error = "";

// create livrerur
$livreur = null;

// create an instance of the controller
$livreurC = new livreurC();
if (
  isset($_POST["id"]) &&
    isset($_POST["first_name"]) &&
    isset($_POST["disponibilite"]) &&
    isset($_POST["postal_code"]) 

) {
    if (
      !empty($_POST['id']) &&
        !empty($_POST['first_name']) &&
        !empty($_POST["disponibilite"]) &&
        !empty($_POST["postal_code"]) 
    
    ) {
        $livreur = new livreur(
          $_POST['id'],
            $_POST['first_name'],
            $_POST['disponibilite'],
            $_POST['postal_code'],
        );
        $livreurC->addlivreur($livreur);
        header('Location:Listlivreur.php');
    } else {
        $error = "Missing information";
        echo("add invalid");
    }
}



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    
    <title>REVERSO DASHBOARD
        
    </title>
	
	
	</head>
<body>
<!-- <div class="mx-auto bg-grey-lightest"> -->
    <!--Screen-->
    <!-- <div class="min-h-screen flex flex-col"> -->
        <!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">REVERSO DASHBOARD</h1>
                </div>
               
            </div>
        </header>
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar"
                    class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

                    <ul class="list-reset flex flex-col">
                        <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
                            <a href="index.html"
                                class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fas fa-tachometer-alt float-left mx-2"></i>
                                Dashboard
                                <span><i class="fas fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="tables.html" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            user management
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="mail.html" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-wpforms float-left mx-2"></i>
                            delivery management
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="gestionsformateurs.html"
                            class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            training management
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a></li>
                        <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                            <a href="gestionproduit.html"
                                class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fas fa-table float-left mx-2"></i>
                                product management
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a></li>
                            <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                                <a href="gestionreclamation.html"
                                    class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    <i class="fas fa-table float-left mx-2"></i>
                                    reclamation management
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a></li>
                   
                    </ul>

                </aside>
	<section class="ftco-section">
		<div style="width:1000px;
    height:1000px;" class="container ">
			<div class="row justify-content-center">
				
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/personnel-livraison-ride-motos-concept-magasinage_1150-34879.avif);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">add employee (for delivery)</h3>
			      		</div>
								
			      	</div>
                      <form onSubmit="onSubmit()" action="" class="signin-form" method="POST">
        <table border="1" align="center">
        <div class="form-group mb-3">
            
            <label for="id" class="label"> identity card :
            </label>
        <input type="number" class="form-control" name="id" id="id" maxlength="20" placeholder="Identity Card" required>
            </div>

        <div class="form-group mb-3">
            
                    <label for="name" class="label">first Name:
                    </label>
                <input type="text" class="form-control" name="first_name" id="first_name" maxlength="20" placeholder="first name" required>
                    </div>
                    <div class="form-group mb-3">

           
                    <label for="password" class="label">disponibilite:
                    </label>
             
                    <input class="form-control" type="text" name="disponibilite" id="disponibilite" placeholder="phone number" required>
              
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
                   
	

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script>
    function onSubmit() {
        alert("employee added successfully!");
       
    }
</script>

	</body>
</html>



