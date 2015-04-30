<?php

require_once('services/BoekService.class.php');
$boekService = new BoekService();
$boekenlijst = $boekService->getBoekenOverzicht();

include('presentation/boekenlijst.php');


