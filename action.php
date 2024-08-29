<?php
include("connexion_db.php");
include("commande.php");
if(isset($_POST["saveCateg"]))
{
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $photo = $_FILES["img"];

    insertCategorie($db,$nom,$description,$photo);


}








?>