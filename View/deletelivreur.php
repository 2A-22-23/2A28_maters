<?php
include '../Controller/livreurC.php';
$livreurC = new livreurC();
$livreurC->deletelivreur($_GET["id"]);
header('Location:Listlivreur.php');
