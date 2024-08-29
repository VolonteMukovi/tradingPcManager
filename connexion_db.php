<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=bdd_trading_pc_mnanager", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $errors) {
    die($errors->getMessage());
}
if($db)
{
    //echo "Connecter a la bdd avec succes";
}
else{
    die("Echec De Connéxion à La Base De Données ");
}



?>