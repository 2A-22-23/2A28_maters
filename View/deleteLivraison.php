<?php
include '../Controller/livraisonC.php';
$livraisonC = new livraisonC();
$livraisonC->deletelivraison($_GET["id"]);
header('Location:ListLivraison.php');
