<?php

include '../Controller/livreurC.php';

$error = "";

// create livraison
$livraison = null;

// create an instance of the controller
$livreurC = new livreurC();
if (
    isset($_POST["id"]) &&
    isset($_POST["first_name"]) &&
    isset($_POST["disponibilite"]) &&
    isset($_POST["postal_code"]) 

) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST['first_name']) &&
        !empty($_POST["disponibilite"]) &&
        !empty($_POST["postal_code"]) 

    ) {
        $livreur = new livreur(
            $_POST['id'],
            $_POST['first_name'],
            $_POST['disponibilite'],
            $_POST['postal_code']
        

          
        );
        $livreurC->updatelivreur($livreur, $_POST["id"]);
        header('Location:Listlivreur.php');
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
    <button><a href="Listlivreur.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $livreur = $livreurC->showlivreur($_POST['id']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id">Id livraison:
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" value="<?php echo $livreur['id']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="firstName">First Name:
                        </label>
                    </td>
                    <td><input type="text" name="first_name" id="first_name" value="<?php echo $livreur['first_name']; ?>" maxlength="20"></td>
                </tr>
               
                <tr>
                    <td>
                        <label for="address">disponibilite:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="disponibilite" value="<?php echo $livreur['disponibilite']; ?>" id="address">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dob"> postal code:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="postal_code" id="postal_code" value="<?php echo $livreur['postal_code']; ?>">
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