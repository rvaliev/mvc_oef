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


    public function haalBoekOp($id)
    {
        $boekDAO = new BoekDAO();
        $boek = $boekDAO->getById($id);
        return $boek;  // returns the whole object
    }

    public function updateBoek($id, $titel, $genreId)
    {
        $genreDAO = new GenreDAO();
        $boekDAO = new BoekDAO();
        $genre = $genreDAO->getById($genreId); // returns the whole object
        $boek = $boekDAO->getById($id);  // returns the whole object
        $boek[0]->setTitel($titel);
        $boek[0]->setGenre($genre);
        $boekDAO->update($boek);
    }
}