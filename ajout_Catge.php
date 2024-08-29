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
    <div class="formulaire">
        <?php if (isset($_GET["categories"])) {
            if (isset($_GET["action"]) and $_GET["action"] == "edit") {
                $delete = AfficheCategoriEdit($db, $_GET["categories"]);
                foreach ($delete as $deletes) {
                    $_SESSION["id_categorie"] = $deletes->id_categorie;
                    $nom_categorie  = $deletes->nom_categorie;
                    $description = $deletes->Description;
                }
        ?>
                <div class="conteirForm w-full">
                    <form action="action.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="block font-medium text-gray-500 "><i class="fas fa-layer-group text-gray-700"></i> Nom du Categorie</label>
                            <input type="text" value="<?php echo $nom_categorie      ?>" placeholder="Ex: Acer" name="nom" class="block w-50 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 ">
                        </div>
                        <div class="mb-3">
                            <label class="block font-medium text-gray-500 "><i class="fas fa-solar-panel text-gray-700"></i> Description</label>
                            <textarea placeholder="Ex: RAM:4GB Processeur:2Hz 4:Couers Bat:25mAh" name="description" class="block w-50 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 "><?php echo $description      ?></textarea>
                        </div>
                        <div class="mb-3">
                            <input name="editCateg" value="Modifier" type="submit" class="inline-flex items-center p-2 w-50 rounded-lg bg-blue-500 text-white font-medium hover:bg-blue-900 ">
                        </div>
                    </form>
                </div>
            <?php
            }
        } else {  ?>
            <div class="conteirForm w-full">
                <form action="action.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="block font-medium text-gray-500 "><i class="fas fa-layer-group text-gray-700"></i> Nom du Categorie</label>
                        <input required type="text" placeholder="Ex: Acer" name="nom" class="block w-50 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 ">
                    </div>
                    <div class="mb-3">
                        <label class="block font-medium text-gray-500 "><i class="fas fa-solar-panel text-gray-700"></i> Description</label>
                        <textarea required placeholder="Ex: RAM:4GB Processeur:2Hz 4:Couers Bat:25mAh" name="description" class="block w-50 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 "></textarea>
                    </div>
                    <div class="mb-3">
                        <input name="saveCateg" value="Enregistrer" type="submit" class="inline-flex items-center p-2 w-50 rounded-lg bg-blue-500 text-white font-medium hover:bg-blue-900 ">
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->
</body>

</html>