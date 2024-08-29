<?php
include "navabar.php";
?>

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Produits Vendusgi</h1>
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
            <i class='fas fa-print'></i>
            <span class="text">Rapport</span>
        </a>
    </div><br><br>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded ">
            <thead class="bg-white-200 text-gray-700">
                <tr>
                    <th class="py-2 px-4 text-center">Nom</th>
                    <th class="py-2 px-4 text-center">Categorie</th>
                    <th class="py-2 px-4 text-center">Prix Vente</th>
                    <th class="py-2 px-4 text-center">Client</th>
                    <th class="py-2 px-4 text-center">Description</th>
                    <th class="py-2 px-4 text-center">Date Vente</th>
                    <th class="py-2 px-4 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ventes = AfficheVente($db);
                foreach($ventes as $vente){ ?>
                    <tr>
                        <td class="border-t py-2 px-4 text-center"><?php echo  $vente->nom_produit ?></td>
                        <td class="border-t py-2 px-4 text-center"><?php echo  $vente->nom_categorie ?></td>
                        <td class="border-t py-2 px-4 text-center">$  <?php echo  $vente->prixVente_produit ?></td>
                        <td class="border-t py-2 px-4 text-center"><?php echo  $vente->nom_client ?></td>
                        <td class="border-t py-2 px-4 text-center"><?php echo  $vente->observation ?></td>
                        <td class="border-t py-2 px-4 text-center"><?php echo  $vente->dates ?></td>
                        <td class="border-t py-2 px-4 text-center">
                            <button class="ml-2"><a href="ajout_produit.php?action=edit&produit=<?php echo $produit->id_produits ?>"><i class="fas fa-edit text-blue-500 hover:text-blue-700"></i></a> </button>
                            <button class="ml-2"><a href="suppresion.php?action=delete&produit=<?php echo $produit->id_produits ?>"><i class="fas fa-trash text-red-500 hover:text-red-700"></i></a> </button>
                            <button class="ml-2"><a class="text-green-500 font-semi-bold hover:text-green-700 " href="suppresion.php?action=delete&produit=<?php echo $produit->id_produits ?>">Reçu <i class="fas fa-file-invoice-dollar text-green-500 hover:text-green-700 "></i></a> </button>
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