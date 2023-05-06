<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identity_card = $_POST['identity_card'];
    $password = $_POST['Password'];
    $con=mysqli_connect("localhost","root","","REVERSO2a28");
    if(!$con){
        die("connexion invalid");
    } else {
        $sql = "SELECT  * FROM user WHERE identity_card = '$identity_card'";
        $result=mysqli_query($con,$sql);
        if($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            if($password == $row[4]) {
                if($row[5] == 'Client' || $row[5] == 'ADMIN') {
                    $_SESSION['identity_card'] = $identity_card;
                    $_SESSION['Password'] = $password;
                    
                    // Update the login time in the database
                    $user_identity_card = $row[0];
                    $login_time = date('Y-m-d H:i');
                    $update_sql = "UPDATE user SET login_time = '$login_time' WHERE identity_card = $user_identity_card";
                    mysqli_query($con, $update_sql);

                    // Redirect the user to the appropriate page
                    if($row[5]=='Client') {
                        header('Location:index.php');
                        exit;
                    } else {
                        header('Location:Listusers.php');
                        exit;
                    }
                } else {
                    echo 'invalid';
                }
            } else {
                header('Location:login.php');
                exit;
            }
        } else {
            echo '<script>alert("PASSWORD or IDENTITY CARD ARE INCORRECT ");</script>';
            include('login.php');
            exit;
        }
    }
}
?>
