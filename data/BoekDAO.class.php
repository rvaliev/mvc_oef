<?php

require_once('data/DBConnect.class.php');
require_once('entities/Genre.class.php');
require_once('entities/Boek.class.php');


class BoekDAO
{
    private $handler;
    private $sql;
    private $query;
    private $result;
    private $genre;
    private $lijst;

    private function connectToDB()
    {
        /**
         * Connect to DB
         */
        $this->handler = new DBConnect();
        $this->handler = $this->handler->startConnection();
    }



    public function getAll()
    {


        self::connectToDB();
        $this->sql = "SELECT boek.id, boek.titel, boek.genre_id, genre.omschrijving FROM mvc_boeken boek INNER JOIN mvc_genres genre ON boek.genre_id=genre.genre_id";

        try{
            $this->query = $this->handler->query($this->sql);
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

            $this->query->closeCursor();
            $this->handler = null;


            foreach ($this->result as $row)
            {
                /**
                 * Creert nieuwe object van klasse Genre, indien deze nog niet gemaakt is.
                 * Anders geeft het gemaakte object terug.
                 */
                $this->genre = Genre::create($row['genre_id'],$row['omschrijving']);

                /**
                 * Het object $this->genre wordt gebruikt als PARAMETER bij het aanmaak van een object
                 * van een klasse Boek indien deze niet aangemaakt is. Anders wordt het object teruggegeven.
                 */
                $this->lijst[] = Boek::create($row['id'], $row['titel'], $this->genre);
            }


            /**
             * Resultaat ziet er zo uit:
             * [0] => Boek Object
                (
                    [id:Boek:private] => 1
                    [titel:Boek:private] => Oorlog en Vrede
                    [genre:Boek:private] => Genre Object
                        (
                            [id:Genre:private] => 2
                            [omschrijving:Genre:private] => Classic
                        )
                )
             */
            return $this->lijst;
        }
        catch(Exception $e){
            echo "Error: Ошибка с запросом";
            return false;
        }

    }


    public function getById($id)
    {
        self::connectToDB();
        $this->sql = "SELECT boek.id, boek.titel, boek.genre_id, genre.omschrijving FROM mvc_boeken boek INNER JOIN mvc_genres genre ON boek.genre_id=genre.genre_id WHERE boek.id = ?";

        try {
            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($id));
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

            $this->handler = null;
            $this->query->closeCursor();

            foreach ($this->result as $row) {
                $this->genre = Genre::create($row['genre_id'], $row['omschrijving']);
                $this->lijst[] = Boek::create($row['id'], $row['titel'], $this->genre);
            }
            return $this->lijst;
        } catch (Exception $e) {
            echo "Error: Ошибка с запросом";
            return false;
        }
    }



    public function create($titel, $genreId)
    {
        self::connectToDB();
        $this->sql = "INSERT INTO mvc_boeken (titel, genre_id) VALUES (?, ?)";

        try {
            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($titel, $genreId));

            $this->handler = null;
            $this->query->closeCursor();


            return $this->lijst;
        } catch (Exception $e) {
            echo "Error: Ошибка с запросом";
            return false;
        }
    }




    public function delete($id)
    {
        self::connectToDB();
        $this->sql = "DELETE FROM mvc_boeken WHERE id = ?";

        try {
            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($id));

            $this->handler = null;
            $this->query->closeCursor();
            return true;

        } catch (Exception $e) {
            echo "Error: Ошибка с запросом";
            return false;
        }
    }






}