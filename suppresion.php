<?php
include("connexion_db.php");
include("commande.php");

if (isset($_GET["categories"])) {
    if (isset($_GET["action"]) and $_GET["action"] == "delete") {
      deleteCategorie($db,$_GET["categories"]);
    
    }
  }

  if (isset($_GET["produit"])) {
    if (isset($_GET["action"]) and $_GET["action"] == "delete") {
      deleteProduits($db,$_GET["produit"]);
    
    }
  }

  if (isset($_GET["vendus"])) {
    if (isset($_GET["action"]) and $_GET["action"] == "delete") {
      deleteVente($db,$_GET["vendus"]);
    
    }
  }



?>