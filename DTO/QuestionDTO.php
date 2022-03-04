<?php


class QuestionDTO
{
    /**
     * @return mixed
     */
    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    /**
     * @param mixed $idQuestion
     */
    public function setIdQuestion($idQuestion)
    {
        $this->idQuestion = $idQuestion;
    }

    /**
     * @return mixed
     */
    public function getEnonce()
    {
        return $this->enonce;
    }

    /**
     * @param mixed $enonce
     */
    public function setEnonce($enonce)
    {
        $this->enonce = $enonce;
    }
    private $idQuestion;
    private $enonce;
    private $nbIntervenants;

    /**
     * @return mixed
     */
    public function getNbIntervenants()
    {
        return $this->nbIntervenants;
    }

    /**
     * @param mixed $nbIntervenants
     */
    public function setNbIntervenants($nbIntervenants)
    {
        $this->nbIntervenants = $nbIntervenants;
    }


}