<?php

require_once('data/DBConnect.class.php');
require_once('entities/Genre.class.php');

class GenreDAO
{
    private $handler;
    private $sql;
    private $query;
    private $result;
    private $genre;

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
        $this->sql = "SELECT genre_id, omschrijving FROM mvc_genres";

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
                $this->genre[] = Genre::create($row['genre_id'],$row['omschrijving']);
            }


            /**
             * Resultaat ziet er zo uit:
                [0] => Genre Object
                    (
                        [id:Genre:private] => 1
                        [omschrijving:Genre:private] => Adventure
                    )
             */
            return $this->genre;
        }
        catch(Exception $e){
            echo "Error: Ошибка с запросом";
            return false;
        }

    }


    public function getById($id)
    {
        self::connectToDB();
        $this->sql = "SELECT genre_id, omschrijving FROM mvc_genres WHERE genre_id = ?";

        try {
            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($id));
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

            $this->handler = null;
            $this->query->closeCursor();

            foreach ($this->result as $row) {
                $this->genre[] = Genre::create($row['genre_id'],$row['omschrijving']);
            }
            return $this->genre;
        } catch (Exception $e) {
            echo "Error: Ошибка с запросом";
            return false;
        }
    }

}