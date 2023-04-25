<?php  
$con=mysqli_connect("localhost","root","","REVERSO2a28");
if(!$con){
    die("connexion invalid");
}
else{ 
    extract ($_GET);
  
   
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