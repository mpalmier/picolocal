<?php
include_once ("DAO/QuestionDAO.php");
include_once ("DTO/QuestionDTO.php");
include_once("views/header.php");
session_start();

$listeQuestions=$_SESSION["listeQuestion"];

function unIntervenant($question){
    $listeJoueurs=joueurAleatoire(1);
    $questionreformule=str_replace("player1",$listeJoueurs[0],$question->getEnonce());
    $questionreformule=str_replace("quantite",random_int(3,6),$questionreformule);
    return $questionreformule;
}

function deuxIntervenant($question){
    $listeJoueurs=joueurAleatoire(2);
    $questionreformule=str_replace("player1",$listeJoueurs[0],$question->getEnonce());
    $questionreformule=str_replace("player2",$listeJoueurs[1],$questionreformule);
    $questionreformule=str_replace("quantite",random_int(3,6),$questionreformule);
    return $questionreformule;
}

function troisIntervenant($question){
    $listeJoueurs=joueurAleatoire(3);
    $questionreformule=str_replace("player1",$listeJoueurs[0],$question->getEnonce());
    $questionreformule=str_replace("player2",$listeJoueurs[1],$questionreformule);
    $questionreformule=str_replace("player3",$listeJoueurs[2],$questionreformule);
    $questionreformule=str_replace("quantite",random_int(3,6),$questionreformule);
    return $questionreformule;
}

function quatreIntervant($question){
    $listeJoueurs=joueurAleatoire(4);
    $questionreformule=str_replace("player1",$listeJoueurs[0],$question->getEnonce());
    $questionreformule=str_replace("player2",$listeJoueurs[1],$questionreformule);
    $questionreformule=str_replace("player3",$listeJoueurs[2],$questionreformule);
    $questionreformule=str_replace("player4",$listeJoueurs[3],$questionreformule);
    $questionreformule=str_replace("quantite",random_int(3,6),$questionreformule);
    return $questionreformule;
}



function joueurAleatoire($nbJoueurs) {
    $listeJoueurs=array();
    $listeJoueursAleatoire=array();

    for ($i=1 ; $i<$_SESSION["nbJoueurs"]+1 ; $i++) {
        array_push($listeJoueurs,$_SESSION["nom".$i]);
    }
    shuffle($listeJoueurs);

    for ($i=0;$i<$nbJoueurs;$i++) {
        array_push($listeJoueursAleatoire,$listeJoueurs[$i]);
    }
    return $listeJoueursAleatoire;
}

function afficherQuestion($listeQuestions) {
    if (count($_SESSION["listeQuestion"])!=0) {
        $random=random_int(0,count($listeQuestions)-1);
        $questionrandom=$listeQuestions[$random];
        switch ($questionrandom->getNbIntervenants()) {
            case 0 :
                echo str_replace("quantite",random_int(3,6),$questionrandom->getEnonce());
                break;
            case 1 :
                if ($_SESSION["nbJoueurs"]>=1) {
                    echo unIntervenant($questionrandom);
                }
                else {
                    unset($_SESSION["listeQuestion"][$random]);
                    afficherQuestion($listeQuestions);
                }
                break;
            case 2 :
                if ($_SESSION["nbJoueurs"]>=2) {
                    echo deuxIntervenant($questionrandom);
                }
                else {
                    unset($_SESSION["listeQuestion"][$random]);
                    afficherQuestion($listeQuestions);
                }
                break;
            case 3 :
                if ($_SESSION["nbJoueurs"]>=3) {
                    echo troisIntervenant($questionrandom);
                }
                else {
                    unset($_SESSION["listeQuestion"][$random]);
                    afficherQuestion($listeQuestions);
                }
                break;
            case 4 :
                if ($_SESSION["nbJoueurs"]>=4) {
                    echo quatreIntervant($questionrandom);
                }
                else {
                    unset($_SESSION["listeQuestion"][$random]);
                    afficherQuestion($listeQuestions);
                }
                break;
        }
        unset($_SESSION["listeQuestion"][$random]);
        shuffle($_SESSION["listeQuestion"]);
    }
    else {
        echo "Vous avez fini toutes les questions malinois !";
    }



}



?>
<div class="body">
    <div class="back">
        <a href="index.php"><img src="img/arrow.png" alt=""></a>
        <a href="ajouterjoueur.php"><img src="img/plus.png" alt=""></a>
    </div>
    <a href="jouer.php">
        <div class="wrapper">
            <div class="content">
                <?php if (count($_SESSION["listeQuestion"])==0) {echo "<a href='index.php'>Rejouer !</a>";} ?>
                <h1 class="question"><?php afficherQuestion($listeQuestions); ?></h1>
            </div>
        </div>
    </a>
</div>



</body>
</html>