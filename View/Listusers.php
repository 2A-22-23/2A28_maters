
<!DOCTYPE html>
<html lang="en">
<?php
include '../Controller/userC.php';
$userC = new userC();
$list = $userC->listusers();




?>

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
<!--Container -->
<div class="mx-auto bg-grey-lightest">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">REVERSO DASHBOARD</h1>
                </div>
               
            </div>
        </header>
        <!--/Header-->

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
                        <a href="Listusers.php" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            user management
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="ListLivraison.php" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
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
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <!--Horizontal form-->
                      
                        <!--/Horizontal form-->

                        <!--Underline form-->
                    
                        <!--/Underline form-->
                    </div>
                    <!-- /Cards Section Ends Here -->

                    <!--Grid Form-->

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                 Clients (Users and Admins)
                            </div>
                            <div class="p-3">
                                
                                <table border="1" align="center" class="table-responsive w-full rounded">
                                 
                                    <tr>
            <th>IDentity Card</th>
            <th> Name</th>
            <th>Email</th>
            <th>Sexe</th>
            <th>Password</th>
            <th>Role <th>
            
            <th>Update</th>
            <th>Delete</th>
            
        </tr>
        <?php
        foreach ($list as $user) {
        ?>
        
       
    
            <tr>
                <td class="border px-4 py-2"><?= $user['identity_card']; ?></td>
                <td class="border px-4 py-2"><?= $user['Name']; ?></td>
                <td class="border px-4 py-2"><?= $user['Email']; ?></td>
                <td class="border px-4 py-2"><?= $user['Sexe']; ?></td>
                <td class="border px-4 py-2"><?= $user['Password']; ?></td>
                <td class="border px-4 py-2"><?= $user['Role']; ?></td>
                <td class="border px-4 py-2"><?= $user['login_time']; ?></td>
                <td align="center">
                    <form method="POST" action="updateuser.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $user['identity_card']; ?> name="identity_card">
                    </form>
                </td>
                <td>
                    <a href="deleteuser.php?identity_card=<?php echo $user['identity_card']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>    
                                    </table>
                               
                            </div>
                            <div style="height: 150px;
            width: 400px;"
            class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
            <a href="#" class="no-underline text-white text-2xl">
    <?php
    // Get the count of rows in the user table
    $pdo = AConfig::getConnexion();
    $query = "SELECT COUNT(*) FROM user";
    $stmt = $pdo->query($query);
    $count = $stmt->fetchColumn();

    // Output the count value
    echo $count;
    ?>
</a>

                <a href="#" class="no-underline text-white text-lg">
                    number of users
                </a>
                <a href="#" class="no-underline text-white text-lg">
                    every day we grow bigger!
                </a>
            </div>
        </div>
  
                            <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                                <a href="reverso2/utilisateur.html" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    <i class="fab fa-wpforms float-left mx-2"></i>
                                    check login on the web site
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                            
                        </div>
                        
                    </div>
                    <div style="display: flex; align-items: center;  margin-left: 20px;">
                        <label for="Recherche">Search User</label>
                       
                    </div>

                    <!--/Grid Form-->
                </div>
                <div style="display: flex; align-items: center;  margin-left: 20px;">
                <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                                <input id="search-input" type="text" placeholder="Search...">

                                
                            </li>

                        
                </div>
    </div>

                <title>AJAX Search Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#search-input").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
                </div>
            </main>
         


</div>
          



<script src="./main.js"></script>

</body>

</html>