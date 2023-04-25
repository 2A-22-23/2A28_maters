<?php

include '../Controller/userC.php';

$error = "";

// create user
$user = null;

// create an instance of the controller
$userC = new userC();
if (
    isset($_POST["identity_card"]) &&
    isset($_POST["Name"]) &&
    isset($_POST["Email"]) &&
    isset($_POST["Sexe"]) &&
    isset($_POST["Password"])
) {
    if (
        !empty($_POST["identity_card"]) &&
        !empty($_POST["Name"]) &&
        !empty($_POST['Email']) &&
        !empty($_POST["Sexe"]) &&
        !empty($_POST["Password"])
    ) {
        $user = new user(
            $_POST['identity_card'],
            $_POST['Name'],
            $_POST['Email'],
 
            $_POST['Sexe'],
            $_POST['Password'],
        );
        $userC->updateuser($user, $_POST["identity_card"]);
        header('Location:Listusers.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    
    <title>REVERSO DASHBOARD
        
    </title>
</head>

<body>
    
<div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar"
                    class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

                    <ul class="list-reset flex flex-col">
                        <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
                            <a href="index.html"
                                class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fas fa-tachometer-alt float-left mx-2"></i>
                                Dashboard
                                <span><i class="fas fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="tables.html" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            user management
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="mail.html" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-wpforms float-left mx-2"></i>
                            delivery management
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="gestionsformateurs.html"
                            class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            training management
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a></li>
                        <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                            <a href="gestionproduit.html"
                                class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fas fa-table float-left mx-2"></i>
                                product management
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a></li>
                            <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                                <a href="gestionreclamation.html"
                                    class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    <i class="fas fa-table float-left mx-2"></i>
                                    reclamation management
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a></li>
                   
                    </ul>

                </aside>
    

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['identity_card'])) {
        $user = $userC->showuser($_POST['identity_card']);

    ?>
      <div class="flex flex-col">
    <!-- Card Sextion Starts Here -->
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <!--Horizontal form-->
      
        <!--/Horizontal form-->

        <!--Underline form-->
    
        <!--/Underline form-->
    </div>
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div style="background-color: #cda45e;" class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                 Clients
                            </div>
                            <div class="p-3">
                            <main class="bg-white-500 flex-1 p-3 overflow-hidden">



        <form class="form" action="" method="POST">
            <table border="1" align="center" class="table-responsive w-full rounded">
                <tr>
                    <td>
                        <label class="border px-4 py-2" for="identity_card">Identity Card:
                        </label>
                    </td>
                    <td><input class="input" type="text" name="identity_card" id="identity_card" value="<?php echo $user['identity_card']; ?>" maxlength="20"></td>
                </tr>
              
                <tr>
                    <td>
                        <label class="border px-4 py-2" for="Name"> Name:
                        </label>
                    </td>
                    <td><input class="input" type="text" name="Name" id="Name" value="<?php echo $user['Name']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label class="border px-4 py-2" for="Email">Email:
                        </label>
                    </td>
                    <td><input class="input" type="text" name="Email" id="Email" value="<?php echo $user['Email']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label class="border px-4 py-2" for="Sexe">Sexe:
                        </label>
                    </td>
                    <td>
                        <input class="input" type="text" name="Sexe" value="<?php echo $user['Sexe']; ?>" id="Sexe">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="border px-4 py-2" for="Password">Password:
                        </label>
                    </td>
                    <td>
                        <input class="input" type="text" name="Password" value="<?php echo $user['Password']; ?>" id="Password">
                    </td>
                </tr>
               
               
                <tr>
                    <td></td>
                    <td>
                        <input class="input" type="submit" value="Update">
                    </td>
                  
                </tr>
            </table>
        </form>
                      
                        </div>
                        </div>
                        </div>
                        </main>
                        </div>
    <?php
    }
    ?>
    <button><a href="Listusers.php">Back to list</a></button>
</div>
</body>


</html>