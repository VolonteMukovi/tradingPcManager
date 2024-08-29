<?php
include "navabar.php";
?>

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1 class="">Ajouter un Produit</h1>
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
    </div>
    <div style="float: right; margin-right: 25px;" id="photo-preview" class="ml-6">
        <img id="photo-output" alt="Prévisualisation de la photo">
    </div>
    <div class="formulaire flex justify-center">
        <?php if (isset($_GET["produit"])) {
            if (isset($_GET["action"]) and $_GET["action"] == "edit") {
                $editProd = AfficheProduitsEdit($db, $_GET["produit"]);
                foreach ($editProd as $produits) {
                    $_SESSION["id_prod"] = $produits->id_produits;
                    $nom_prod  = $produits->nom_produit;
                    $prixAchat_produit = $produits->prixAchat_produit;
                    $prixVente_produit  = $produits->prixVente_produit;
                    $prixAchat_produit = $produits->prixAchat_produit;
                    $id_categorie  = $produits->id_categorie;
                    $nom_categorie  = $produits->nom_categorie;
                    $fournisseur_prouiduit = $produits->fournisseur_prouiduit;
                }
        ?>
                <div class="conteirForm">
                    <form action="action.php" method="post" enctype="multipart/form-data">
                        <div class="grid grid-cols-2 gap-3">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="block font-medium text-gray-500 "><i class="fas fa-layer-group text-gray-700"></i> Nom du Produit</label>
                                    <input value="<?php echo $nom_prod ?>" type="text" required placeholder="Ex: Acer" name="nom" class="block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 ">
                                </div>
                                <div class="mb-3">
                                    <label class="block font-medium text-gray-500 "><i class="fas fa-clone text-gray-700"></i> Selectioner une Categorie</label>
                                    <?php $categorie = AfficheCategorie($db); ?>
                                    <select name="id_categ" id="" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>

                                        <?php
                                        foreach ($categorie as $categories) {
                                        ?>
                                            <option value="<?php echo $id_categorie;   ?>"><?php echo $nom_categorie;   ?></option>
                                            <option value="<?php echo $categories->id_categorie;   ?>"><?php echo $categories->nom_categorie;   ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="block font-medium text-gray-500 "><i class="fas fa-comments-dollar text-gray-700"></i> Prix D'achat</label>
                                    <input type="number" value="<?php echo $prixAchat_produit  ?>" required placeholder="Ex: 300 $" name="prixAchat" class="block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 ">
                                </div>
                                <div class="mb-3">
                                    <label class="block font-medium text-gray-500 "><i class="fas fa-coins text-gray-700"></i> Prix Vente</label>
                                    <input type="number" value="<?php echo $prixVente_produit  ?>" required placeholder="Ex: 300 $" name="prixVente" class="block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 ">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="block font-medium text-gray-500 "><i class="fas fa-camera text-gray-700"></i> Image</label>
                                    <input name="img" class="block text-gray-500 w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 " id="photo" type="file" accept="image/*" onchange="previewPhoto(event)">
                                </div>
                                <div class="mb-3">
                                    <label class="block font-medium text-gray-500 "><i class="fas fa-comments-dollar text-gray-700"></i> Fournisseur</label>
                                    <input type="text" value="<?php echo $fournisseur_prouiduit  ?>" required placeholder="Ex: Palos" name="fsr" class="block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 ">
                                </div>
                                <div class="mb-3">
                                    <label class="block font-medium text-gray-500 "><i class="fas fa-list-ol text-gray-700"></i> Nombre des Pieces</label>
                                    <input name="nbrPiece" class="block text-gray-500 w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 " type="number">
                                </div>
                                <div class="mb-3">
                                    <input name="editProd" value="Enregistrer" type="submit" class="inline-flex items-center p-2 w-full rounded-lg bg-blue-500 text-white font-medium hover:bg-blue-900 ">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php
            }
        } else {  ?>
            <div class="conteirForm">
                <form action="action.php" method="post" enctype="multipart/form-data">
                    <div class="grid grid-cols-2 gap-3">
                        <div class="col">
                            <div class="mb-3">
                                <label class="block font-medium text-gray-500 "><i class="fas fa-layer-group text-gray-700"></i> Nom du Produit</label>
                                <input type="text" required placeholder="Ex: Acer" name="nom" class="block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 ">
                            </div>
                            <div class="mb-3">
                                <label class="block font-medium text-gray-500 "><i class="fas fa-clone text-gray-700"></i> Selectioner une Categorie</label>
                                <?php $categorie = AfficheCategorie($db); ?>
                                <select name="id_categ" id="" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>

                                    <?php
                                    foreach ($categorie as $categories) {
                                    ?>
                                        <option value="<?php echo $categories->id_categorie;   ?>"><?php echo $categories->nom_categorie;   ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="block font-medium text-gray-500 "><i class="fas fa-comments-dollar text-gray-700"></i> Prix D'achat</label>
                                <input type="number" required placeholder="Ex: 300 $" name="prixAchat" class="block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 ">
                            </div>
                            <div class="mb-3">
                                <label class="block font-medium text-gray-500 "><i class="fas fa-coins text-gray-700"></i> Prix D'achat</label>
                                <input type="number" required placeholder="Ex: 300 $" name="prixVente" class="block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 ">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="block font-medium text-gray-500 "><i class="fas fa-camera text-gray-700"></i> Image</label>
                                <input required name="img" class="block text-gray-500 w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 " id="photo" type="file" accept="image/*" onchange="previewPhoto(event)">
                            </div>
                            <div class="mb-3">
                                <label class="block font-medium text-gray-500 "><i class="fas fa-comments-dollar text-gray-700"></i> Fournisseur</label>
                                <input type="text" required placeholder="Ex: Palos" name="fsr" class="block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 ">
                            </div>
                            <div class="mb-3">
                                <label class="block font-medium text-gray-500 "><i class="fas fa-list-ol text-gray-700"></i> Nombre des Pieces</label>
                                <input required name="nbrPiece" class="block text-gray-500 w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 " type="number">
                            </div>
                            <div class="mb-3">
                                <input name="SaveProd" value="Enregistrer" type="submit" class="inline-flex items-center p-2 w-full rounded-lg bg-blue-500 text-white font-medium hover:bg-blue-900 ">
                            </div>
                        </div>
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