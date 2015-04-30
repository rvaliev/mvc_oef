<?php

require_once('data/GenreDAO.class.php');


$obj = new GenreDAO();

echo "<pre>";
print_r($obj->getById(2));
echo "</pre>";

