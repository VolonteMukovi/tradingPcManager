<?php
include "connexion_db.php";
function loginAdmin($db, $pseudo, $pwd)
{
    try {
        $req = $db->query("SELECT * FROM `tb_admin` WHERE `pseudo_admin`='".$pseudo."' AND `mdp_admin`='".$pwd."'");
        if ($req->rowCount() > 0) {
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            setcookie("admin", serialize($data), time() + (365 * 24 * 60 * 60));
            return TRUE;
        } else {
            return FALSE;
        }
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function editAdmin($db, $pseudo, $pwd)
{
    try {
        $req = $db->prepare("UPDATE `tb_admin` SET `pseudo_admin`=?,`mdp_admin`=? WHERE `id_admin`=? ");
        $req->execute(array($pseudo, $pwd));
    } catch (Exception $e) {
        $e->getMessage();
    }
}


// =======================================================  ORDINATEUR ===================================================================
function insertCategorie($db,$nom_categorie,$description)
{
    try {
        $req = $db->prepare("INSERT INTO `tb_categorie`(`nom_categorie`, `Description`) VALUES (?,?)");
        $req->execute(array($nom_categorie,$description));
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function AfficheAdmin($db)
{
    try {
        $req = $db->query("SELECT * FROM `tb_categorie`");
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function editCategorie($db,$id_categorie,$nom_categorie,$description)
{
    try {
        $req = $db->prepare("UPDATE `tb_categorie` SET `nom_categorie`=?,`Description`=? WHERE `id_categorie`=?");
        $req->execute(array($db,$nom_categorie,$description,$id_categorie));
    } catch (Exception $e) {
        $e->getMessage();
    }
}






?>