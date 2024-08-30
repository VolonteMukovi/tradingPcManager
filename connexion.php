<?php include("commande.php") ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter en tant qu'Admin - School Manager</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
       
    </style>
</head>
<body class="bg-[#16C8FF] min-h-screen flex flex-col items-center justify-center">

    <main class="flex flex-col md:flex-row items-center bg-white shadow-lg rounded-lg p-6 w-full md:w-2/3 lg:w-1/2 mt-24">
        <div class="hidden md:block md:w-1/2 mr-4">
            <img src="./img/system-administrator-4487123-3726273.webp" alt="Illustration Admin" class="rounded-lg">
        </div>

        <div class="w-full md:w-1/2">
            <h2 class="text-xl font-bold text-center mb-6">Se connecter en tant qu'Admin</h2>

            <form method="post" id="loginForm" class="space-y-6">
                <div class="relative">
                    <label for="identifiant" class="block text-sm font-bold text-gray-700">Identifiant</label>
                    <input type="text" id="identifiant" name="identifiant" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#16C8FF] focus:border-[#16C8FF] sm:text-sm" required>
                    <i class="fas fa-user absolute top-1/2 mt-3 transform -translate-y-1/2 right-3 text-gray-400"></i>
                </div>

                <div class="relative">
                    <label for="password" class="block text-sm font-bold text-gray-700">Mot de passe</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#16C8FF] focus:border-[#16C8FF] sm:text-sm" required>
                    <i class="fas fa-lock absolute top-1/2 mt-3  transform -translate-y-1/2 right-3 text-gray-400"></i>
                </div>
                <?php
                    if(isset($_POST["btn_login"]))
                    {
                        $pseudo = htmlspecialchars($_POST["identifiant"]);
                        $pwd = htmlspecialchars($_POST["password"]);
                        loginAdmin($db,$pseudo,$pwd);
                        if(loginAdmin($db,$pseudo,$pwd)==TRUE)
                        {
                            header("location: index.php");
                        }
                        else{?>
                                <div id="errorMessage" class="hidde bg-red-500 text-white text-center py-2 rounded-md">
                                    <p>Votre Nom D'identification Ou Mot De Passe Est Incorrect !</p>
                                </div>
                       <?php }
                    }
                    
                ?>


                <button name="btn_login" type="submit" class="btn w-full bg-blue-500  text-white py-2 rounded-md font-semibold hover:bg-gray-700 ">Se connecter</button>
            </form>
        </div>
    </main>

    <!-- <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const password = document.getElementById('password').value;

            if (password !== 'correctPassword') {
                document.getElementById('errorMessage').classList.remove('hidden');
            } else {
                document.getElementById('errorMessage').classList.add('hidden');
            }
        }); -->
    </script>
</body>
</html>
