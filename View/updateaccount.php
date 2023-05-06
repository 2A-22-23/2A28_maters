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
//   connexion valid


$sql = "SELECT  * FROM user WHERE identity_card = '$identity_card'";

// Execute the query and retrieve the result
$result = mysqli_query($con, $sql);

// Check if the query returned a result
if($result && mysqli_num_rows($result) > 0) {
    header('Location:updatefront.php');
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $update_logindata="UPDATE user SET Name=$name , Email=$email , Password=$password WHERE identity_card=$identity_card  " ;

} else {
   echo("invalid");
}
}
   




?>
<!-- form pour label -->
<!-- recuperation de la valeur label name identity -->
<!-- fetch data if identity=identity_card -->
<!-- si existe redirection form update else utilisateur non trouvee -->

