
<?php
session_start();

// Check if the identity_card session variable is set
if (isset($_SESSION['identity_card'])) {
    // Use the identity_card session variable
    $identity_card = $_SESSION['identity_card'];

    // Do something with the identity_card variable
    // ...
} else {
    // The identity_card session variable is not set
    // Handle the error
}
?>


<!doctype html>
<html lang="en">

  <head>
    <title>REVERSO &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



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
                  <li> <a href="index.php" class="nav-link">Home</a></li>
                  <li><a href="services.html" class="nav-link">Command</a></li>
                  <li><a href="barber-shop.html" class="nav-link">Product</a></li>
                  <li><a href="blog.html" class="nav-link">Delivery</a></li>
                  <li><a href="training.html" class="nav-link">training</a></li>
                  <li><a href="contact.html" class="nav-link">Reclamation</a></li>
                 <li><a href="account.html" class="nav-link"><img style="width:30px; height:30px;border:solid;
                 border-radius:15px; " src="images/malllk.png"></a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('images/backgrounduser.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
                <form style="margin-bottom: 40px;" onSubmit="onSubmit()" action="deleteaccount.php" class="signin-form" method="POST">
                    <table border="1" align="center">
                    <div class="form-group mb-3">
                        
                        <label for="identity_card1" class="label"> identity card :
                        </label>
                    <input type="number" class="form-control" name="identity_card1" id="identity_card1" maxlength="20" placeholder="Identity Card" value="<?php echo $identity_card; ?>"disabled>
                        </div>
                      
                            <input  type="submit" value=" Delete">
                            <input type="reset" value="Reset">
                       
                    </table>
                </form> 
                <form  action="updateaccount.php" class="signin-form" method="POST">
                    <table border="1" align="center">
                    <div class="form-group mb-3">
                        
                        <label for="identity_card" class="label"> identity card :
                        </label>
                    <input type="text" class="form-control" name="identity_card" id="identity_card" maxlength="20" placeholder="Identity Card" value="<?php echo $identity_card; ?>"disabled>
                        </div>
            
                    
                        <tr align="center">
                            <td>
                                <input type="submit" value="Update">
                            </td>
                            <td>
                                <input type="reset" value="Reset">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <!-- HTML code for log out button -->
<a href="logout.php">Log Out</a>

          </div>
        </div>
      </div>
    </div>
    
    
    

</html>

