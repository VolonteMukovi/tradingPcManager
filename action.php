<?php
include("connexion_db.php");
include("commande.php");
if(isset($_POST["saveCateg"]))
{
    $nom = htmlspecialchars(ucwords($_POST["nom"]));
    $description = htmlspecialchars(ucwords($_POST["description"]));
    insertCategorie($db,$nom,$description);
}








?>