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
   // Assume we have a database connection established
// and an input value $identity_card and a table name $table_name

extract($_GET);
// Build the SQL query to retrieve the identity value from the database
$sql ="DELETE FROM user WHERE identity_card=$identity_card";
$result = mysqli_query($con, $sql);
if($result){
    header('Location:login.php');
}
else{
    echo "np";
}
}