<?php

include_once("tools/DatabaseLinker.php");
include_once("DTO/QuestionDTO.php");


class QuestionDAO
{
    public static function getQuestion()
    {
        $questionArray = array();

        $connex = DatabaseLinker::getConnexion();

        $state = $connex->prepare("SELECT * FROM question");
        $state->execute();

        $resultats = $state->fetchAll();


        foreach ($resultats as $result)
        {
            $question = QuestionDAO::getQuestionById($result["idQuestion"]);
            $questionArray[] = $question;
        }
        return $questionArray;
    }


    public static function getQuestionById($idQuestion)
    {
        $question = null;

        $connex = DatabaseLinker::getConnexion();

        $state = $connex->prepare("SELECT * FROM question WHERE idQuestion=?");

        $state->bindParam(1, $idQuestion);
        $state->execute();

        $resultats = $state->fetchAll();


        if (sizeof($resultats) > 0)
        {
            $result = $resultats[0];

            $question = new QuestionDTO();
            $question->setIdQuestion($idQuestion);
            $question->setEnonce($result["enonce"]);
            $question->setNbIntervenants($result["nbIntervenants"]);
        }

        return $question;
    }
}

?>