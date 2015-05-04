<?php

require_once('services/GenreService.class.php');
require_once('services/BoekService.class.php');

if(isset($_GET['action']) && ($_GET['action'] == "process"))
{
    $boekSvc = new BoekService();
    $boekSvc->updateBoek($_GET['id'], $_POST['txtTitel'], $_POST['selGenre']);
    header("Location: toonalleboeken.php");
    exit();
}
else
{
    $genreSvc = new GenreService();
    $genreLijst = $genreSvc->getGenresOverzicht();
    $boekSvc = new BoekService();
    $boek = $boekSvc->haalBoekOp($_GET['id']);
    include('presentation/updateboekform.php');

}