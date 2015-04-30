<?php

if(isset($_GET['id']))
{
    require_once('services/BoekService.class.php');
    $boekService = new BoekService();
    $boekService->verwijderBoek($_GET['id']);
    header("Location: toonalleboeken.php");
}
else
{
    header("Location: toonalleboeken.php");
}
