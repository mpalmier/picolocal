<?php
include_once ("DAO/QuestionDAO.php");
include_once ("DTO/QuestionDTO.php");
session_start();
for ($i=1 ; $i<$_SESSION["nbJoueurs"]+1 ; $i++) {
    $_SESSION["nom".$i]=$_POST["nom".$i];
}
$_SESSION["cpt"]=0;
$_SESSION["listeQuestion"]=QuestionDAO::getQuestion();
header('Location: jouer.php');
