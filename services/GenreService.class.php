<?php

require_once('data/GenreDAO.class.php');

class GenreService
{
    private $lijst;

    public function getGenresOverzicht()
    {
        $GenreDAO = new GenreDAO();
        $this->lijst = $GenreDAO->getAll();
        return $this->lijst;
    }
}