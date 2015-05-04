<?php

require_once('services/BoekService.class.php');

$obj = new BoekService();



echo "<pre>";
print_r($obj->haalBoekOp(2));
echo "</pre>";

