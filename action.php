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


if(isset($_POST["SaveProd"]))
{
    $nom = htmlspecialchars(ucwords($_POST["nom"]));
    $id_categ = htmlspecialchars(ucwords($_POST["id_categ"]));
    $prixAchat = htmlspecialchars(ucwords($_POST["prixAchat"]));
    $prixVente = htmlspecialchars(ucwords($_POST["prixVente"]));
    $fsr = htmlspecialchars(ucwords($_POST["fsr"]));
    $nbrPiece = $_POST["nbrPiece"];
    $photo = $_FILES["img"];
    saveProduits($db,$nom,$prixAchat,$prixVente,$fsr,$photo,$id_categ,$nbrPiece);
}

if(isset($_POST["editProd"]))
{
    $nom = htmlspecialchars(ucwords($_POST["nom"]));
    $id_categ = htmlspecialchars(ucwords($_POST["id_categ"]));
    $prixAchat = htmlspecialchars(ucwords($_POST["prixAchat"]));
    $prixVente = htmlspecialchars(ucwords($_POST["prixVente"]));
    $fsr = htmlspecialchars(ucwords($_POST["fsr"]));
    $nbrPiece = $_POST["nbrPiece"];
    $photo = $_FILES["img"];
    produitsEdit($db,$nom,$prixAchat,$prixVente,$fsr,$photo,$id_categ);
}

if(isset($_POST["saveVendre"]))
{
    $nom = htmlspecialchars(ucwords($_POST["nom"]));
    $id_produit = htmlspecialchars(ucwords($_POST["id_produit"]));
    $mntPayer = htmlspecialchars(ucwords($_POST["mntPayer"]));
    $descript = htmlspecialchars(ucwords($_POST["descript"]));
    $nomClient = htmlspecialchars(ucwords($_POST["nomClient"]));
    insertVente($db,$nomClient,$id_produit,$mntPayer,$descript);
}









?>