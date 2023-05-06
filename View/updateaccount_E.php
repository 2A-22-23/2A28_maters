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
$con=mysqli_connect("localhost","root","","REVERSO2a28");
if(!$con){
    die("connexion invalid");
}
else{ 
  
   
    $upd= "UPDATE user SET NAME='$Name', Email='$Email', Password='$Password'  WHERE identity_card=$identity_card";

     $req=mysqli_query($con,$upd);
     if($req){
        header('Location:index.php');
     }
     else
     {
        echo("update invalid");
     }
}
?>