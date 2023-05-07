<?php
  // session_start();

	include '../Controller/postC.php';
    include '../Controller/commentaireC.php';
	$postC=new postC();
  if (
        
    isset($_POST["query"])
    ) 
    {
      $listePosts=$postC->rechercherpost($_POST["query"]); 
    }
    else
	$listePosts=$postC->afficherpost(); 
   $commentaireC=new commentaireC();

$commentaire = null;

    // create an instance of the controller
    
    if (
        
		isset($_POST["contenu"]) &&		
        isset($_POST["post_id"]) &&		
        isset($_POST["rating"]) 
    ) {
        if (
            
			!empty($_POST['contenu']) &&
            !empty($_POST["post_id"]) 
        ) {
            $commentaire = new commentaire(
                null,
				$_POST['contenu'],
                $_POST['post_id'], 
                $_POST['rating'], 
				
                
            );
            $commentaireC->ajoutercommentaire($commentaire);
            header('Location:afficherListePosts.php');
        }
        else
            $error = "Missing information";
    }
    if (
        
		isset($_POST["titre"]) &&		
        isset($_POST["contenu"]) 
    ) {
        if (
            
			!empty($_POST['titre']) &&
            !empty($_POST["contenu"]) 
        ) {
            $post = new post(
                null,
				$_POST['titre'],
                $_POST['contenu'], 
				
                
            );
            $postC->ajouterpost($post);
            header('Location:afficherListePosts.php');
        }
        else
            $error = "Missing information";
    }
	
?>
<html>
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
          <li class="nav-link"><a href="index.php" class="nav-link">Home</a></li>
          <li><a href="afficherListePosts.php" class="active">Blog</a></li>
          <li><a href="//bigi" class="nav-link">Product</a></li>
          <li><a href="addLivraison.php" class="nav-link">Delivery</a></li>
          <li><a href="//malikk" class="nav-link">training</a></li>
          <li><a href="ajouterAdherent.php" class="nav-link">Reclamation</a></li>
         <li><a href="account.php" class="nav-link"><img style="width:30px; height:30px;border:solid;
         border-radius:15px; " src="images/malllk.png"></a></li>
        </ul>
      </nav>
    </div>

    
  </div>
</div>

</header>


    <div class="container">
    <div class="text-center">
        <br><br><br><form action="" method="POST">
  <input type="text" name="query" placeholder="Rechercher...">
  <button type="submit">Rechercher</button>
</form><br><br><td>
					<a href="afficherListePostsTriTemps.php">trier par date</a>
				</td><br><br>
  <h1>Ajouter une publication</h1><br><br>
</div>
    <form id="addpost" method="POST" action="">
      <div class="form-group">
        <label for="title">titre</label>
        <input type="text" class="form-control" id="titre" name="titre">
      </div>
      <div class="form-group">
        <label for="content">contenu</label>
        <textarea class="form-control" id="contenu" name="contenu"></textarea>
      </div>
      
      <button type="submit" class="btn btn-primary">Add Post</button>
    </form>
  </div>
  <div class="text-center">
  <h1>Liste des publication</h1>
  <br><br>
</div>
      
        
			<?php
				foreach($listePosts as $post){
                    $id_post = $post['id'];
                    $average_rating=$commentaireC->afficherAverageRating($id_post);
    $listeCommentaires = $commentaireC->affichercommentaire($id_post);

			?>
            <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 post">
            <h2><?php echo $post['titre']; ?></h2>
            <p><?php echo $post['contenu']; ?></p>
            <p> <?php echo 'The average rating for this post is: ' . $average_rating;?> /5</p>
            
            
            <form method="POST" action="modifierpost.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $post['id']; ?> name="id">
					</form>
				</td>
				<td>
					<a href="supprimerpost.php?id=<?php echo $post['id']; ?>">Supprimer</a>
				</td>
        </div> </div>

        <!-- comments section -->
        <div class="col-md-6 col-md-offset-3 comments-section">
        <h2> Comment(s)</h2>   <br><br>
        <form class="clearfix" action="" method="POST" id="comment_form">
           
                
                    
                        
        
        <h4>Post a comment:</h4>
                   <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
              
                        <label for="contenu">contenu
                        </label>
                    <input class="form-control" type="text" name="contenu" id="contenu" maxlength="20">
                    <label for="rating">rating
                        </label>
                    <select name="rating" >
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select>







                   
                        <input class="form-control" type="submit" value="Envoyer"> 
                    
                        <input class="form-control" type="reset" value="Annuler" >
                   
            </form>
           <!-- comments section -->
       
            <!-- comment form -->
            
            <!-- Display total number of comments on this post  -->
            <?php
				foreach($listeCommentaires as $commentaire){
                   

			?>
            
            <hr>
            <!-- comments wrapper -->
            <div id="comments-wrapper">
                <div class="comment clearfix">
                        <div class="comment-details">
                            <span class="comment-name">Melvine</span>
                            <span class="comment-date">Apr 24, 2018</span>
                            <p><?php echo $commentaire['contenu']; ?></p>
                            <span class="comment-name"><?php echo $commentaire['rating']; ?> /5</span>
                            <form method="POST" action="modifiercommentaire.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $commentaire['id']; ?> name="id">
					</form>
                            <a href="supprimercommentaire.php?id=<?php echo $commentaire['id']; ?>">Supprimer</a>
                        </div>
                        
                    </div>
            </div>
            <?php
				}
			?>
            <!-- // comments wrapper -->
        </div>
        <!-- // comments section -->
    </div>
</div>

<?php
				}
			?>
            <footer id="footer" class="footer">

<div class="footer-content">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-5 col-md-12 footer-info">
        <a href="index.html" class="logo d-flex align-items-center">
          <span>mind-sway</span>
        </a>
        <p></p>
        <div class="social-links d-flex  mt-3">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>

      <div class="col-lg-2 col-6 footer-links">
        
      </div>

      <div class="col-lg-2 col-6 footer-links">
        

<div class="footer-legal">
  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong><span>mind sway</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nova-bootstrap-business-template/ -->
     
    </div>
  </div>
</div>
</footer><!-- End Footer --><!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<!-- Javascripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap Javascript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
      </body>