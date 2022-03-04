<?php
session_start();
$nb=intval($_SESSION["nbJoueurs"])-1;
$_SESSION["nbJoueurs"]=strval($nb);

$bool=false;
for ($i=1;$i<=$nb+1;$i++) {
    if ($_GET["nomJoueur"]==$_SESSION["nom".$i]){
        $_SESSION["nom".$i]=$_SESSION["nom".strval($i+1)];
        unset($_SESSION["nom".$_GET["nomJoueur"]]);
        $bool=true;
    }
    if ($bool==true) {
        $_SESSION["nom".$i]=$_SESSION["nom".strval($i+1)];
    }
}

header('Location: ajouterjoueur.php?nomJoueur='.$_GET["nomJoueur"]);