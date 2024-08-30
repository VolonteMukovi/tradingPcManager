<?php
unset($_COOKIE["admin"]);
setcookie("admin","",time()-10);
header("location: connexion.php");
?>