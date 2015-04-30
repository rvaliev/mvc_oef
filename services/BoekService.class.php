<?php

require_once('data/BoekDAO.class.php');

class BoekService
{

    public function getBoekenOverzicht()
    {
        $BoekDAO = new BoekDAO();
        return $BoekDAO->getAll();
    }



    public function voegNieuwBoekToe($titel, $genreId)
    {
        $BoekDAO = new BoekDAO();
        $BoekDAO->create($titel, $genreId);
    }


    public function verwijderBoek($id)
    {
        $BoekDAO = new BoekDAO();
        $BoekDAO->delete($id);
    }
}