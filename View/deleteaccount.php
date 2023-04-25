<?php  
$con=mysqli_connect("localhost","root","","REVERSO2a28");
if(!$con){
    die("connexion invalid");
}
else{
   // Assume we have a database connection established
// and an input value $identity_card and a table name $table_name

extract($_GET);
// Build the SQL query to retrieve the identity value from the database
$sql ="DELETE FROM user WHERE identity_card=$identity_card1";
$result = mysqli_query($con, $sql);
if($result){
    header('Location:login.php');
}
else{
    echo "np";
}
}