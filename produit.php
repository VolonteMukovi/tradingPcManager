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
                    <th class="py-2 px-4 text-center">Nom</th>
                    <th class="py-2 px-4 text-center">Categorie</th>
                    <th class="py-2 px-4 text-center">Prix Achat</th>
                    <th class="py-2 px-4 text-center">Prix Vente</th>
                    <th class="py-2 px-4 text-center">Fournisseur</th>
                    <th class="py-2 px-4 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $produits = AfficheProduits($db);
                foreach($produits as $produit){ ?>
                    <tr>
                        <td class="border-t py-2 px-4">
                            <img src="./img/<?php echo  $produit->photos_produit ?>"  class="w-10 h-10 rounded-full">
                        </td>
                        <td class="border-t py-2 px-4 text-center"><?php echo  $produit->nom_produit ?></td>
                        <td class="border-t py-2 px-4 text-center"><?php echo  $produit->nom_categorie ?></td>
                        <td class="border-t py-2 px-4 text-center">$  <?php echo  $produit->prixAchat_produit ?></td>
                        <td class="border-t py-2 px-4 text-center">$  <?php echo  $produit->prixVente_produit ?></td>
                        <td class="border-t py-2 px-4 text-center"><?php echo  $produit->fournisseur_prouiduit ?></td>
                        <td class="border-t py-2 px-4 text-center">
                        <button class="ml-2"><a href="ajout_produit.php?action=edit&produit=<?php echo $produit->id_produits ?>"><i class="fas fa-edit text-blue-500 hover:text-blue-700"></i></a> </button>
                            <button class="ml-2"><a href="suppresion.php?action=delete&produit=<?php echo $produit->id_produits ?>"><i class="fas fa-trash text-red-500 hover:text-red-700"></i></a> </button>
                            <a href="suppresion.php?action=delete&produit=<?php echo $categories->id_categorie ?>" class="bg-yellow-500 text-white rounded-lg hover:bg-yellow-400 p-2 mx-4" ><i class="fas fa-cart-arrow-down"></i> Ventre</a>
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