<?php
include "navabar.php";
?>

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1 class="">Ajouter une Categorie</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Accueille</a>
                </li>
            </ul>
        </div>
    </div><br><br><br>
    <div class="flex justify-center">
        <form method="post" class="space-y-6 w-50">
            <div class="relative">
                <label for="identifiant" class="block text-sm font-bold text-gray-700">Identifiant</label>
                <input type="text" id="identifiant" name="identifiant" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#16C8FF] focus:border-[#16C8FF] sm:text-sm" required>
                <i class="fas fa-user absolute top-1/2 mt-3 transform -translate-y-1/2 right-3 text-gray-400"></i>
            </div>

            <div class="relative">
                <label for="password" class="block text-sm font-bold text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#16C8FF] focus:border-[#16C8FF] sm:text-sm" required>
                <i class="fas fa-lock absolute top-1/2 mt-3  transform -translate-y-1/2 right-3 text-gray-400"></i>
            </div><br>
            <button name="btn_login" type="submit" class="w-full bg-blue-500  text-white py-2 rounded-md font-semibold hover:bg-blue-700 ">Modifier</button>
        </form>
    </div>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->
</body>

</html>