<?php

include '../Controller/livraisonC.php';

$error = "";

// create livraison
$livraison = null;

// create an instance of the controller
$livraisonC = new livraisonC();
if (
    isset($_POST["id"]) &&
    isset($_POST["first_name"]) &&
    isset($_POST["last_name"]) &&
    isset($_POST["phone_number"]) &&
    isset($_POST["postal_code"]) 

) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST['first_name']) &&
        !empty($_POST["last_name"]) &&
        !empty($_POST["phone_number"]) &&
        !empty($_POST["postal_code"]) 

    ) {
        $livraison = new livraison(
            $_POST['id'],
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['phone_number'],
            $_POST['postal_code']
        

          
        );
        $livraisonC->updatelivraison($livraison, $_POST["id"]);
        header('Location:ListLivraison.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIVRAISON Display</title>
</head>

<body>
    <button><a href="ListLivraison.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $livraison = $livraisonC->showlivraison($_POST['id']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id">Id livraison:
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" value="<?php echo $livraison['id']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="firstName">First Name:
                        </label>
                    </td>
                    <td><input type="text" name="first_name" id="first_name" value="<?php echo $livraison['first_name']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="lastName">Last Name:
                        </label>
                    </td>
                    <td><input type="text" name="last_name" id="lastName" value="<?php echo $livraison['last_name']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="address">phone number:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="phone_number" value="<?php echo $livraison['phone_number']; ?>" id="address">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dob"> postal code:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="postal_code" id="postal_code" value="<?php echo $livraison['postal_code']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>