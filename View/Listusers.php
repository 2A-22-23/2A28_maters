    <!-- gestion utilisateurs-->

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
            <th>Role</th>
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
                    <label for="Recherche">Search</label>
                    <input class="border px-4 py-2" type="text" style="margin-right: 10px;">
                    <button style=" width: 70px; 
                    height: 30px;
                    border-radius: 15px;
                    background-color: rgb(233, 178, 59);
                    color: black;"> Search </button>
                </div>
            </main>
            <div style="height: 200px;
            width: 100px;"
            class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="#" class="no-underline text-white text-2xl">
                    900
                </a>
                <a href="#" class="no-underline text-white text-lg">
                    number of users
                </a>
            </div>
        </div>


</div>
          
            <!--/Main-->
       
       

</div>
<!-- Centered Modal -->
<div id='centeredModal' class="modal-wrapper">
    <div class="overlay close-modal"></div>
    <div class="modal modal-centered">
        <div class="modal-content shadow-lg p-5">
            <div class="border-b p-2 pb-3 pt-0 mb-4">
                <div class="flex justify-between items-center">
                    View User
                    <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                        <i class="fas fa-times text-gray-700"></i>
                    </span>
                </div>
            </div>
            <!-- Modal content -->
            <tr>
                <div>
                <td class="border px-4 py-2">Malek</td>
            </div>
            <div><td class="border px-4 py-2">Email@gmail.com</td></div>
                <div>
                    <td class="border px-4 py-2">Male</td>
                </div>
             <div>
                <td class="border px-4 py-2">********</td>
             </div>
                
               
            </tr>
        </div>
    </div>
</div>
<!-- Centered With a Form Modal -->
<div id='centeredFormModal' class="modal-wrapper">
    <div class="overlay close-modal"></div>
    <div class="modal modal-centered">
        <div class="modal-content shadow-lg p-5">
            <div class="border-b p-2 pb-3 pt-0 mb-4">
                <div class="flex justify-between items-center">
                    Modify User
                    <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                        <i class="fas fa-times text-gray-700"></i>
                    </span>
                </div>
            </div>
            <!-- Modal content -->
            <form id='form_id' class="w-full">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                            for="grid-first-name">
                            Name
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                            id="grid-first-name" type="text" placeholder="Enter Name">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                            for="grid-last-name">
                            Email
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                            id="grid-last-name" type="text" placeholder="example@gmail.com">
                    </div>
                </div>
              
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                            for="grid-city">
                                Adress
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                            id="grid-city" type="text" placeholder="Enter adress">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                            for="grid-last-name">
                            Passowrd
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                            id="grid-last-name" type="text" placeholder="NEW Password">
                    </div>
                  
                    
                </div>

                <div class="mt-5">
                    <button class='btn btn-primary bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'> Submit
                    </button>
                    <span
                        class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                        Close
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="./main.js"></script>

</body>

</html>