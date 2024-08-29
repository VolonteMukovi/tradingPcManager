<?php
include "navabar.php";
?>

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Produits</h1>
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
        <a href="ajout_produit.php" class="btn-download">
            <i class='fas fa-plus'></i>
            <span class="text">Ajouter</span>
        </a>
    </div><br><br>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded ">
            <thead class="bg-white-200 text-gray-700">
                <tr>
                    <th class="py-2 px-4 text-center">Photo</th>
                    <th class="py-2 px-4 text-center">Matricule</th>
                    <th class="py-2 px-4 text-center">Nom</th>
                    <th class="py-2 px-4 text-center">Postnom</th>
                    <th class="py-2 px-4 text-center">Classe</th>
                    <th class="py-2 px-4 text-center">Option</th>
                    <th class="py-2 px-4 text-center">Section</th>
                    <th class="py-2 px-4 text-center">Parents/Tuteur</th>
                    <th class="py-2 px-4 text-center">Telephone</th>
                    <th class="py-2 px-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($eleves as $eleve) { ?>
                    <tr>
                        <td class="border-t py-2 px-4">
                            <img src="./Images/<?php echo  $eleve->Photo_eleve ?>" alt="Photo de l'élève" class="w-10 h-10 rounded-full">
                        </td>
                        <td class="border-t py-2 px-4 text-center"><?php //echo  $eleve->Matricule_eleve  
                                                                    ?></td>
                        <td class="border-t py-2 px-4 text-center"><?php //echo  $eleve->Nom_eleve  
                                                                    ?></td>
                        <td class="border-t py-2 px-4 text-center"><?php //echo  $eleve->postnom  
                                                                    ?></td>
                        <td class="border-t py-2 px-4 text-center"><?php //echo  $eleve->designation_classes  
                                                                    ?></td>
                        <td class="border-t py-2 px-4 text-center"><?php //echo  $eleve->designation_option  
                                                                    ?></td>
                        <td class="border-t py-2 px-4 text-center"><?php //echo  $eleve->designation_section  
                                                                    ?></td>
                        <td class="border-t py-2 px-4 text-center"><?php //echo  $eleve->nomTuteur_eleve  
                                                                    ?></td>
                        <td class="border-t py-2 px-4 text-center"><?php //echo  $eleve->numeTelTuteur_eleve  
                                                                    ?></td>
                        <td class="border-t py-2 px-4 text-center">
                            <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i> <a href="ajouts_eleves.php?action=editer&eleve=<?php echo  $eleve->ID_eleve ?>">Éditer</a> </button>
                            <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i><a href="suppression.php?action=supprimer&eleve=<?php echo  $eleve->ID_eleve ?>">Supprimer</a> </button>
                            <a href="infos_eleves_cours.php" class="text-green-500 hover:text-green-700 ml-2"><i class="fas fa-eye"></i> Consulter</a>
                        </td>
                    </tr>
                <?php  }
                ?>
            </tbody>
        </table>
    </div>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->


<script src="script.js"></script>
</body>

</html>