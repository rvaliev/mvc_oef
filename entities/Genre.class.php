<?php


class Genre
{
    /**
     * $idMap bevat alle reeds aangemaakte objecten van klasse Genre
     * Het is static, dus het is een lijst voor alle Genre-objecten
     */
    private static $idMap = array();

    private $id;
    private $omschrijving;






    /**
     * Constructor wordt hier als Private gemaakt, zodat geen objecten
     * van buitenaf worden aangemaakt.
     * Een nieuw object wordt NIET via onstructor aangemaakt, maar via
     * een static create-method.
     */
    private function __construct($id, $omschrijving)
    {
        $this->id = $id;
        $this->omschrijving = $omschrijving;
    }








    /**
     * Method create controleert of de objecten werden reeds aangemaakt.
     * Indien ja, dan wordt het bestaade OBJECT teruggegeven.
     * Het aanmaak van objecten gebeurt dus nu via:
     * $obj = new Genre::create(1, "Avontuur");
     */
    public static function create($id, $omschrijving)
    {
        if(!isset(self::$idMap[$id]))
        {
            self::$idMap[$id] = new Genre($id, $omschrijving);
        }
        return self::$idMap[$id];
    }







    public function getId()
    {
        return $this->id;
    }

    public function getOmschrijving()
    {
        return $this->omschrijving;
    }

    public function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;
    }
}