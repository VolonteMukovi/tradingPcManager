<?php
include "connexion_db.php";
function loginAdmin($db, $pseudo, $pwd)
{
    try {
        $req = $db->query("SELECT * FROM `tb_admin` WHERE `pseudo_admin`='" . $pseudo . "' AND `mdp_admin`='" . $pwd . "'");
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

function AfficheAdmin($db)
{
    try {
        $req = $db->query("SELECT * FROM `tb_admin` ");
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function editAdmin($db, $pseudo, $pwd)
{
    try {
        $req = $db->prepare("UPDATE `tb_admin` SET `pseudo_admin`=?,`mdp_admin`=?");
        $req->execute(array($pseudo, $pwd));
        header("location: identifiant.php");
    } catch (Exception $e) {
        $e->getMessage();
    }
}


// ======================================================= CATEGORIE ===================================================================
function insertCategorie($db, $nom_categorie, $description)
{
    try {
        $req = $db->prepare("INSERT INTO `tb_categorie`(`nom_categorie`, `Description`) VALUES (?,?)");
        $req->execute(array($nom_categorie, $description));
        header("location: ajout_Catge.php");
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function countCategorie($db,$idCateg)
{
    try {
        $req = $db->query("SELECT COUNT(*) AS nbr FROM `tb_produits` WHERE `id_categorie`='".$idCateg."' ");
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        header("location: ajout_Catge.php");
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function AfficheCategorie($db)
{
    try {
        $req = $db->query("SELECT * FROM `tb_categorie`");
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function AfficheCategoriEdit($db, $id_categorie)
{
    try {
        $req = $db->query("SELECT * FROM `tb_categorie` WHERE `id_categorie`='" . $id_categorie . "'");
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function editCategorie($db, $id_categorie, $nom_categorie, $description)
{
    try {
        $req = $db->prepare("UPDATE `tb_categorie` SET `nom_categorie`=?,`Description`=? WHERE `id_categorie`=?");
        $req->execute(array($nom_categorie, $description, $id_categorie));
        header("location: index.php");
    } catch (Exception $e) {
        $e->getMessage();
    }
}


function deleteCategorie($db, $id_categorie)
{
    try {
        $req = $db->prepare("DELETE FROM `tb_categorie` WHERE `id_categorie`=?");
        $req->execute(array($id_categorie));
        header("location: index.php");
    } catch (Exception $e) {
        $e->getMessage();
    }
}

// =========================================================================== ORDINATEUR ==================================================================

function saveProduits($db, $nom_produit, $prixAchat_produit, $prixVente_produit, $fournisseur_prouiduit, $photo, $id_categorie, $nbrPiece)
{
    try {
        if (isset($photo) and $photo['error'] == 0) {
            if ($photo['size'] <= 1000000000000000000000000000000000000000000000000000000000000) {
                $infosfichier = pathinfo($photo['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('png', 'jpg', 'jpeg', "avif");
                if (in_array($extension_upload, $extensions_autorisees)) {
                    if (move_uploaded_file($photo['tmp_name'], './img/' . basename($photo['name']))) {
                        try {
                            for ($i = 1; $i<=$nbrPiece;$i++) {

                                $req = $db->prepare("INSERT INTO `tb_produits`(`nom_produit`, `prixAchat_produit`, `prixVente_produit`, `fournisseur_prouiduit`, `photos_produit`, `id_categorie`) VALUES (?,?,?,?,?,?)");
                                $req->execute(array($nom_produit, $prixAchat_produit, $prixVente_produit, $fournisseur_prouiduit, basename($photo['name']), $id_categorie));
                            }

                            header("location: ajout_produit.php");
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
            echo "votre image n'as pas ete envoyer au serveur ou n'as pas eter trouver";
        }
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function produitsEdit($db, $nom_produit, $prixAchat_produit, $prixVente_produit, $fournisseur_prouiduit, $photo, $id_categorie)
{
    if (isset($photo) and $photo['error'] == 0) {
        if ($photo['size'] <= 1000000000000000000000000000000000000000000000000000000000000) {
            $infosfichier = pathinfo($photo['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('png', 'jpg', 'jpeg', "avif");
            if (in_array($extension_upload, $extensions_autorisees)) {
                if (move_uploaded_file($photo['tmp_name'], './img/' . basename($photo['name']))) {
                    try {
                        $req =  $db->prepare("UPDATE tb_produits SET `nom_produit`=?, `prixAchat_produit`=?, `prixVente_produit`=?, `fournisseur_prouiduit`=?, `photos_produit`=?, `id_categorie`=? WHERE `nom_produit`=? ");
                        $req->execute(array($nom_produit, $prixAchat_produit, $prixVente_produit, $fournisseur_prouiduit, basename($photo['name']), $id_categorie,$nom_produit));
                        unset($_POST);
                        header("location: produit.php");
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
            $req =  $db->prepare("UPDATE tb_produits SET `nom_produit`=?, `prixAchat_produit`=?, `prixVente_produit`=?, `fournisseur_prouiduit`=?, `id_categorie`=? WHERE `nom_produit`=?");
            $req->execute(array($nom_produit, $prixAchat_produit, $prixVente_produit, $fournisseur_prouiduit, $id_categorie,$nom_produit));
            unset($_POST);
            header("location: produit.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

function deleteProduits($db, $id_produit)
{
    try {
        $req = $db->query("DELETE FROM `tb_produits` WHERE `id_produits` = '" . $id_produit . "' ");
        header("location: produit.php");
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function AfficheProduits($db)
{
    try {
        $req = $db->query("SELECT * FROM `tb_produits` INNER JOIN tb_categorie ON tb_categorie.id_categorie = tb_produits.id_categorie ");
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function AfficheProduitsEdit($db,$id_produit)
{
    try {
        $req = $db->query("SELECT * FROM `tb_produits` INNER JOIN tb_categorie ON tb_categorie.id_categorie = tb_produits.id_categorie WHERE `id_produits`='".$id_produit."' ");
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
        $req = $db->query("SELECT COUNT(*) AS nbrEleve FROM tb_inscription JOIN tb_eleve ON tb_inscription.id_eleve_inscript = tb_eleve.ID_eleve JOIN tb_classes ON tb_inscription.id_classes_inscript = tb_classes.ID_classes JOIN tb_annee_scholaire ON tb_inscription.anneeScholair_inscript = tb_annee_scholaire.ID_anne_scholaire JOIN tb_option ON tb_classes.id_option = tb_option.ID_option JOIN tb_section ON tb_option.id_section = tb_section.ID_section WHERE tb_annee_scholaire.status = '" . $annee . "'");
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    } catch (Exception $e) {
        $e->getMessage();
    }
}




// ======================================================= VENTE ===================================================================
function insertVente($db, $nom_client,$id_produit,$montat_payer,$observation)
{
    try {
        $req = $db->prepare("INSERT INTO `tb_client`(`nom_client`) VALUES (?)");
        $req->execute(array($nom_client));
        $id_client = $db->lastInsertId();
        $req = $db->prepare("INSERT INTO `tb_vente`(`id_produits`, `id_clients`, `montat_payer`, `observation`) VALUES (?,?,?,?)");
        $req->execute(array($id_produit,$id_client,$montat_payer,$observation));
        header("location: vente.php");
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function deleteVente($db,$id_vente,$id_client)
{
    try {
        $req = $db->query("DELETE FROM `tb_vente` WHERE `id_vente`='".$id_vente."'");
        $req = $db->query("DELETE FROM `tb_client` WHERE `id_clients`='".$id_client."'");
        header("location: vente.php");
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function AfficheVente($db)
{
    try {
        $req = $db->query("SELECT * FROM `tb_vente` INNER JOIN tb_client ON tb_client.id_clients = tb_vente.id_clients INNER JOIN tb_produits ON tb_produits.id_produits = tb_vente.id_produits JOIN tb_categorie ON tb_categorie.id_categorie = tb_produits.id_categorie");
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    } catch (Exception $e) {
        $e->getMessage();
    }
}