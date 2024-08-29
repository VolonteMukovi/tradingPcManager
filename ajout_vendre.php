<?php
include "navabar.php";
?>

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1 class="">Vendre un Produit</h1>
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
    </div><br><br>
    <div class="formulaire flex justify-center">
        <?php if (isset($_GET["produit"])) {
            if (isset($_GET["action"]) and $_GET["action"] == "vendre") {
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
                        <div class="grid grid-cols-3 gap-3">
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
                                    <input type="number" value="<?php echo $prixAchat_produit  ?>" required placeholder="Ex: 300 $" id="prixAchat" name="prixAchat" class="block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 ">
                                </div>
                                <div class="mb-3">
                                    <label class="block font-medium text-gray-500 "><i class="fas fa-coins text-gray-700"></i> Prix Vente</label>
                                    <input type="number" value="<?php echo $prixVente_produit  ?>" required placeholder="Ex: 300 $" name="prixVente" class="block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 ">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="block font-medium text-gray-500 "><i class="fas fa-list-ol text-gray-700"></i> Nombre des Pieces</label>
                                    <input id="nbrPiece" name="nbrPiece" class="block text-gray-500 w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 " type="number">
                                </div>
                                <div class="mb-3">
                                    <label class="block font-medium text-gray-500 "><i class="fas fa-user-tag text-gray-700"></i> Nom du Client</label>
                                    <input name="nomClient" class="block text-gray-500 w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 " type="text">
                                </div>
                                <div class="mb-3">
                                    <label class="block font-medium text-gray-500 "><i class="fas fa-ring text-gray-700"></i> Montat Payer par le Client</label>
                                    <input name="nomClient" class="block text-gray-500 w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5 " type="text">
                                </div>
                                <div class="mb-3">
                                    <label class="block font-medium text-gray-500 "><i class="fas fa-solar-panel text-gray-700"></i> Description ou Observation</label>
                                    <textarea name="nomClient" class="block text-gray-500 w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2 focus:border-blue-500 focus:border-5"></textarea>
                                </div>
                            </div>
                            <div class="col"><br><br>
                                <div class="flex justify-center">
                                    <span><i class="fas fa-calculator text-2xl mx-2"></i> Montat a Payer <span class="bg-green-500 text-white font-bold p-2 rounded-full text-xl" id="montantPayer">$ </span></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 grid grid-cols-2 mx-5">
                            <div class="col">
                                <input name="editProd" value="Enregistrer" type="submit" class="inline-flex items-center p-2 w-full rounded-lg bg-blue-500 text-white font-medium hover:bg-blue-900 ">
                            </div>
                        </div>
                    </form>
                </div>
        <?php
            }
        } ?>
    </div>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->
<script>
    const nbrPiece = document.querySelector("#nbrPiece");
    const prixAchat = document.querySelector("#prixAchat").value;
    const affPrix = document.querySelector("#montantPayer");
    nbrPiece.addEventListener('change', function() {
        var montatPayer = nbrPiece.value * prixAchat;
        affPrix.innerHTML = "$ " + montatPayer;
    })
</script>
</body>

</html>