<?php
	include '../Controller/commentaireC.php';
	$commentaireC=new commentaireC();
	$commentaireC->supprimercommentaire($_GET["id"]);
	header('Location:afficherListePosts.php');
?>