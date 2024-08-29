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
    <div style="float: right; margin-right: 25px;" id="photo-preview" class="ml-6">
        <img id="photo-output" alt="Prévisualisation de la photo">
    </div>
    <div class="formulaire flex justify-center">
        <?php if (isset($_GET["categories"])) {
            if (isset($_GET["action"]) and $_GET["action"] == "edit") {
                $delete = AfficheCategoriEdit($db, $_GET["categories"]);
                foreach ($delete as $deletes) {
                    $_SESSION["id_categorie"] = $deletes->id_categorie;
                    $nom_categorie  = $deletes->nom_categorie;
                    $description = $deletes->Description;
                }
        ?>
                <div class="conteirForm">
                    <form action="action.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="block font-medium text-gray-500 "><i class="fas fa-layer-group text-gray-700"></i> Nom du Categorie</label>
                            <input type="text" value="<?php echo $nom_categorie      ?>" placeholder="Ex: Acer" name="nom" class="block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 ">
                        </div>
                        <div class="mb-3">
                            <label class="block font-medium text-gray-500 "><i class="fas fa-solar-panel text-gray-700"></i> Description</label>
                            <textarea placeholder="Ex: RAM:4GB Processeur:2Hz 4:Couers Bat:25mAh" name="description" class="block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 "><?php echo $description      ?></textarea>
                        </div>
                        <div class="mb-3">
                            <input name="editCateg" value="Modifier" type="submit" class="inline-flex items-center p-2 w-full rounded-lg bg-blue-500 text-white font-medium hover:bg-blue-900 ">
                        </div>
                    </form>
                </div>
            <?php
            }
        } else {  ?>
            <div class="conteirForm">
                <form action="action.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="block font-medium text-gray-500 "><i class="fas fa-layer-group text-gray-700"></i> Nom du Categorie</label>
                        <input type="text" placeholder="Ex: Acer" name="nom" class="block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 ">
                    </div>
                    <div class="mb-3">
                        <label class="block font-medium text-gray-500 "><i class="fas fa-solar-panel text-gray-700"></i> Description</label>
                        <textarea placeholder="Ex: RAM:4GB Processeur:2Hz 4:Couers Bat:25mAh" name="description" class="block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 "></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block font-medium text-gray-500 "><i class="fas fa-camera text-gray-700"></i> Image</label>
                        <input name="img" class="block text-gray-500 w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 " id="photo" type="file" accept="image/*" onchange="previewPhoto(event)">
                    </div>
                    <div class="mb-3">
                        <input name="saveCateg" value="Enregistrer" type="submit" class="inline-flex items-center p-2 w-full rounded-lg bg-blue-500 text-white font-medium hover:bg-blue-900 ">
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->


<script src="script.js"></script>
<script>
    function previewPhoto(event) {
        const preview = document.getElementById('photo-output');
        const iconUser = document.querySelector('#photo-preview .icon-user');

        const reader = new FileReader();
        reader.onload = function() {
            preview.src = reader.result;
            preview.style.display = 'block';
            iconUser.style.display = 'none';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<style>
    #photo-preview {
        background-color: #f3f4f6;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 190px;
        width: 190px;
        border: 2px dashed #cbd5e0;
    }

    #photo-preview img {
        height: 95%;
        width: 95%;
        object-fit: cover;
        display: none;
    }

    #photo-preview .icon-user {
        font-size: 4rem;
        color: #a0aec0;
    }
</style>
</style>
</body>

</html>