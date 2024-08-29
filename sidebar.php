<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Admin - School Manager</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex">
        <aside class="w-64 bg-white textgray-700 text-gray-700 flex flex-col h-screen" style="min-height:100%">
            <div class="flex items-center m-4">
                <i class="fas fa-desktop mx-5"></i> 
                <span class="text-xl font-bold">Trading Pc</span>
            </div>
            <nav class="flex-grow">
                <ul>
                    <li class="px-6 py-2 hover:bg-gray-200 ">
                        <a href="index.php" class="flex items-center">
                            <i class="fas fa-clone mr-3"></i> Categories
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-200 ">
                        <a href="identifiant.php" class="flex items-center">
                            <i class="fas fa-id-badge mr-3"></i> Identifiants
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-200 ">
                        <a href="deconnexion.php" class="flex items-center">
                            <i class="fas fa-sign-out-alt mr-3"></i> Se déconnecter
                        </a>
                    </li>
                </ul>
            </nav>
        </aside> 
          
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
