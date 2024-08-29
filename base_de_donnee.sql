CREATE DATABASE bdd_trading_pc_mnanager;
CREATE TABLE tb_categorie (id_categorie INT PRIMARY KEY AUTO_INCREMENT,nom_categorie VARCHAR(50),Description TEXT);
CREATE TABLE tb_admin (id_admin INT PRIMARY KEY AUTO_INCREMENT,pseudo_admin VARCHAR(50) ,mdp_admin VARCHAR(50) );
CREATE TABLE tb_produits (id_produits INT AUTO_INCREMENT PRIMARY KEY,nom_produit VARCHAR(50),prixAchat_produit INT , prixVente_produit INT ,fournisseur_prouiduit VARCHAR(100),photos_produit LONGBLOB , id_categorie INT)