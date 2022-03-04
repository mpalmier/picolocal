<?php
include("views/header.php");
session_start();

$nb=intval($_SESSION["nbJoueurs"])+1;
if (isset($_GET["nom"])){
    $_SESSION["nom".$nb]=$_GET["nom"];
    $_SESSION["nbJoueurs"]=strval($nb);
    header('Location: ajouterjoueur.php');
}


function afficherJoueur(){
    for ($i=1; $i<$_SESSION["nbJoueurs"]+1  ;$i++) {
        echo '<div class="joueurs"><p class="width">' . $_SESSION["nom" . $i] . '</p><form action="supprimerjoueur.php?nomJoueur=' . $_SESSION["nom".$i] . '" method="post"><input class="submit delete" type="image" src="img/fermer.png" border="0" alt="Submit" /></form></div>';
    }
}

?>
<div class="back">
    <a href="jouer.php"><img src="img/arrow.png" alt=""></a>
</div>
<div class="wrapper joueurs">
    <div class="content">
        <?php afficherJoueur();
        echo '<form action="ajouterjoueur.php" method="GET"><p><span>Ajouter  </span><input type="text" name="nom" required /></p><input class="submit" type="image" src="img/right-arrows.png" border="0" alt="Submit" " /></form>';?>

    </div>
</div>
</body>
</html>