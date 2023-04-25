
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
			      			<h3 class="mb-4">LOGIN</h3>
			      		</div>
								
			      	</div>
                      <form  action="login1.php" class="signin-form" method="GET">
        <table border="1" align="center">
        <div class="form-group mb-3">
            
            <label for="identity_card" class="label"> identity card :
            </label>
        <input type="number"  class="form-control" name="identity_card" id="identity_card" maxlength="20" placeholder="Identity Card" required>
            </div>

           <div>
                    <label class="label" for="Password">Password:
                    </label>
               
                    <input class="form-control" type="password" name="Password" id="Password" placeholder="Password" required>
               
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
        <a href="adduser.php" >s'inscrire</a>
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
  
   

	</body>
</html>