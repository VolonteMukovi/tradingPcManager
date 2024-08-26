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


// ======================================================= CATEGORIE ===================================================================
function insertCategorie($db,$nom_categorie,$description)
{
    try {
        $req = $db->prepare("INSERT INTO `tb_categorie`(`nom_categorie`, `Description`) VALUES (?,?)");
        $req->execute(array($nom_categorie,$description));
        header("location: ajout_categorie.php");
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
        header("location: categorie.php");
    } catch (Exception $e) {
        $e->getMessage();
    }
}


function supCategorie($db,$id_categorie)
{
    try {
        $req = $db->prepare("DELETE FROM `tb_categorie` WHERE `id_categorie`=?");
        $req->execute(array($db,$id_categorie));
        header("location: categorie.php");
    } catch (Exception $e) {
        $e->getMessage();
    }
}

// =========================================================================== ORDINATEUR ==================================================================

function afficheEleveEdit($db, $nom_produit, $prixAchat_produit, $prixVente_produit, $fournisseur_prouiduit, $photos_produit, $id_categorie)
{
    try {
        $annee = "Annee en cours";
        $req = $db->prepare("INSERT INTO `tb_produits`(`nom_produit`, `prixAchat_produit`, `prixVente_produit`, `fournisseur_prouiduit`, `photos_produit`, `id_categorie`) VALUES (?,?,?,?,?)");
        $req->execute(array($nom_produit, $prixAchat_produit, $prixVente_produit, $fournisseur_prouiduit, $photos_produit, $id_categorie));
        header("location: clients.php");
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function eleveEdit($db, $matricule_eleve, $nom_eleve, $postnom, $code, $genre_eleve, $lieuNaissance_eleve, $dateNaissance_eleve, $adress_eleve, $ecoleOrigine_eleve, $numePerma_eleve, $nomTuteur_eleve, $numeTelTuteur_eleve, $nationalite_eleve, $photo, $id_classes_inscript, $anneeScholair_inscript, $ide_eleve, $id_inscription)
{
    if (isset($photo) and $photo['error'] == 0) {
        if ($photo['size'] <= 1000000000000000000000000000000000000000000000000000000000000) {
            $infosfichier = pathinfo($photo['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('png', 'jpg', 'jpeg', "avif");
            if (in_array($extension_upload, $extensions_autorisees)) {
                if (move_uploaded_file($photo['tmp_name'], './Images/' . basename($photo['name']))) {
                    try {
                        $req =  $db->prepare("UPDATE `tb_eleve` SET `Matricule_eleve`=?,`Nom_eleve`=?,`postnom`=?,`code`=?,`genre_eleve`=?,`lieuNaissance_eleve`=?,`dateNaissance_eleve`=?,`adress_eleve`=?,`ecoleOrigine_eleve`=?,`numePerma_eleve`=?,`nomTuteur_eleve`=?,`numeTelTuteur_eleve`=?,`Nationalite_eleve`=?, `Photo_eleve`=? WHERE `ID_eleve`=?");
                        $req->execute(array($matricule_eleve, $nom_eleve, $postnom, $code, $genre_eleve, $lieuNaissance_eleve, $dateNaissance_eleve, $adress_eleve, $ecoleOrigine_eleve, $numePerma_eleve, $nomTuteur_eleve, $numeTelTuteur_eleve, $nationalite_eleve, basename($photo['name']), $ide_eleve));
                        $req =  $db->prepare("UPDATE `tb_inscription` SET `id_classes_inscript`=?,`anneeScholair_inscript`=? WHERE `ID_inscription` =?");
                        $req->execute(array($id_classes_inscript, $anneeScholair_inscript, $id_inscription));
                        unset($_POST);
                        header("location: ajouts_eleves.php");
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                } else {
                    echo "Votre image n'as pas pui etre envoiye au serveur veillez ressayer";
                }
            } else {
                echo "L'extension est incorrect";
            }
        } else {
            echo "Veille verifier la taille de votre image peut etre il esg grand par rapport a la taille autorise";
        }
    } else {

        try {
            $req =  $db->prepare("UPDATE `tb_eleve` SET `Matricule_eleve`=?,`Nom_eleve`=?,`postnom`=?,`code`=?,`genre_eleve`=?,`lieuNaissance_eleve`=?,`dateNaissance_eleve`=?,`adress_eleve`=?,`ecoleOrigine_eleve`=?,`numePerma_eleve`=?,`nomTuteur_eleve`=?,`numeTelTuteur_eleve`=?,`Nationalite_eleve`=? WHERE `ID_eleve`=?");
            $req->execute(array($matricule_eleve, $nom_eleve, $postnom, $code, $genre_eleve, $lieuNaissance_eleve, $dateNaissance_eleve, $adress_eleve, $ecoleOrigine_eleve, $numePerma_eleve, $nomTuteur_eleve, $numeTelTuteur_eleve, $nationalite_eleve, $ide_eleve));
            $req =  $db->prepare("UPDATE `tb_inscription` SET `id_classes_inscript`=?,`anneeScholair_inscript`=? WHERE `ID_inscription` =?");
            $req->execute(array($id_classes_inscript, $anneeScholair_inscript, $id_inscription));
            unset($_POST);
            header("location: inscrits.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

function deleteEleve($db, $id_eleve)
{
    try {
        $req = $db->query("DELETE FROM `tb_eleve` WHERE `ID_eleve` = '" . $id_eleve . "' ");
        header("location: inscrits.php");
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function AfficheAnneePasserEleve($db, $annee, $status)
{
    try {
        $req = $db->query("SELECT * FROM tb_inscription JOIN tb_eleve ON tb_inscription.id_eleve_inscript = tb_eleve.ID_eleve JOIN tb_classes ON tb_inscription.id_classes_inscript = tb_classes.ID_classes JOIN tb_annee_scholaire ON tb_inscription.anneeScholair_inscript = tb_annee_scholaire.ID_anne_scholaire JOIN tb_option ON tb_classes.id_option = tb_option.ID_option JOIN tb_section ON tb_option.id_section = tb_section.ID_section WHERE tb_annee_scholaire.annee ='" . $annee . "' AND `status`='" . $status . "'");
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function countEleve($db)
{
    try {
        $annee = "Annee en cours";
        $req = $db->query("SELECT COUNT(*) AS nbrEleve FROM tb_inscription JOIN tb_eleve ON tb_inscription.id_eleve_inscript = tb_eleve.ID_eleve JOIN tb_classes ON tb_inscription.id_classes_inscript = tb_classes.ID_classes JOIN tb_annee_scholaire ON tb_inscription.anneeScholair_inscript = tb_annee_scholaire.ID_anne_scholaire JOIN tb_option ON tb_classes.id_option = tb_option.ID_option JOIN tb_section ON tb_option.id_section = tb_section.ID_section WHERE tb_annee_scholaire.status = '".$annee."'");
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    } catch (Exception $e) {
        $e->getMessage();
    }
}









?>