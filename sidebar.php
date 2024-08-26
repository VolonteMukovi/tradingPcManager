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
        <aside class="w-64 bg-gray-800 text-white flex flex-col h-screen" style="min-height:100%">
            <div class="flex items-center m-4">
                <i class="fas fa-school text-2xl mr-2"></i> 
                <span class="text-xl font-semibold">School Manager</span>
            </div>
            <nav class="flex-grow">
                <ul>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="dasboard.php" class="flex items-center">
                            <i class="fas fa-calendar-alt mr-3"></i> Années scolaires
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="inscrits.php" class="flex items-center">
                            <i class="fas fa-user-graduate mr-3"></i> Élèves
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="classes.php" class="flex items-center">
                        <i class="fas fa-school mr-3"></i></i> Classes
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="listes_prof.php" class="flex items-center">
                            <i class="fas fa-chalkboard-teacher mr-3"></i> Professeurs
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="cours.php" class="flex items-center">
                            <i class="fas fa-book mr-3"></i> Cours
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="options.php" class="flex items-center">
                            <i class="fas fa-stream mr-3"></i> Options
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="Section.php" class="flex items-center">
                            <i class="fas fa-stream mr-3"></i> Section
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="periode.php" class="flex items-center">
                            <i class="fas fa-clock mr-3"></i> Périodes
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="horaire.php" class="flex items-center">
                            <i class="fas fa-calendar-check mr-3"></i> Horaires
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="epreuve.php" class="flex items-center">
                            <i class="fas fa-clipboard-list mr-3"></i> Épreuves
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="identifiant.php" class="flex items-center">
                            <i class="fas fa-id-badge mr-3"></i> Identifiants
                        </a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-700">
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
