<?php
include '../Controller/userC.php';
$userC = new userC();
$userC->deleteuser($_GET["identity_card"]);
header('Location:Listusers.php');
