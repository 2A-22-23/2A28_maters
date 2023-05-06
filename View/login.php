<?php
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = '';
for ($i = 0;$i < 6; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $randomString .= $characters[$index];
    
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
    

	<style>
    .captcha-container {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
}
.captcha-container p {
    margin-right: 10px;
}
.captcha-container input {
    width: 150px;
    margin-left: 10px;
}
</style>
	
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
                      <form  action="login1.php" class="signin-form" method="POST">
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
                    <div class="captcha-container">
    <p>I'm not a robot :      <?php echo $randomString; ?></p>
    <input class="form-control" type="text" name="captcha" id="captcha"  required>
</div>

            <tr align="center">
                <td>
                    <input type="submit" value="Login">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
        <a style='margin-right:130px;' href="adduser.php" >s'inscrire</a>



        <a href="resetpasswordhtml.php" > forgot your password?</a>
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
    var captchaInput = document.getElementById('captcha');
    captchaInput.addEventListener('blur', function() {
        var captchaValue = captchaInput.value.toUpperCase();
        if (captchaValue === '<?php echo $randomString; ?>') {
            console.log('Captcha entered correctly');
            // Do something if captcha is correct, e.g. submit form
        } else {
            console.log('Captcha entered incorrectly');
            // Do something if captcha is incorrect, e.g. show error message
        }
    });
</script>
  
   

	</body>
</html>