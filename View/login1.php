<?php
$con=mysqli_connect("localhost","root","","REVERSO2a28");
if(!$con){
    die("connexion invalid");
}
else{
    extract($_GET);
    $sql = "SELECT  * FROM user WHERE identity_card = '$identity_card'";
    $result=mysqli_query($con,$sql);
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        if($Password==$row[4]){
            if($row[5]=='Client'){
            echo 'valid';
            header('Location:index.php');
        }
        else{
            if($row[5]=='ADMIN'){
                echo 'valid';
                header('Location:Listusers.php');
            }
            else{
                echo 'invalid';
            }
        }
    }
        else{
            header('Location:login.php');
        }
    }
    else{
        echo '<script>alert("PASSWORD or IDENTITY CARD ARE INCORRECT ");</script>';
        include('login.php');
        
    }
}

