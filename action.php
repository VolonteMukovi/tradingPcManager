<?php
session_start();
include("connexion_db.php");
include("commande.php");
if(isset($_POST["saveCateg"]))
{
    $nom = htmlspecialchars(ucwords($_POST["nom"]));
    $description = htmlspecialchars(ucwords($_POST["description"]));
    insertCategorie($db,$nom,$description);
}

if(isset($_POST["editCateg"]))
{
    $nom = htmlspecialchars(ucwords($_POST["nom"]));
    $description = htmlspecialchars(ucwords($_POST["description"]));
    $id_categ = $_SESSION["id_categorie"];
    editCategorie($db,$id_categ,$nom,$description);
}









?>