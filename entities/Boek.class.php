<?php

class Boek
{
    private static $idMap = array();

    private $id;
    private $titel;
    private $genre;  // Hier wordt NIET de id van een genre bewaard, WEL heel de OBJECT van klasse Genre


    private function __construct($id, $titel, $genre)
    {
        $this->id = $id;
        $this->titel = $titel;
        $this->genre = $genre;
    }


    public static function create($id, $titel, $genre)
    {
        if(!isset(self::$idMap[$id]))
        {
            self::$idMap[$id] = new Boek($id, $titel, $genre);
        }
        return self::$idMap[$id];
    }


    public function getId()
    {
        return $this->id;
    }

    public function getTitel()
    {
        return $this->titel;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function setTitel($titel)
    {
        $this->titel = $titel;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

}