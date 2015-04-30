<?php

require_once('services/GenreService.class.php');
require_once('services/BoekService.class.php');

print_r($_GET);


if(isset($_GET['action']) && ($_GET['action'] == "process"))
{
    $boekService = new BoekService();
    $boekService->voegNieuwBoekToe($_POST['txtTitel'], $_POST['selGenre']);
    header("Location: toonalleboeken.php");
    exit(0);
}
else
{
    $genreService = new GenreService();
    $genreLijst = $genreService->getGenresOverzicht();
    include('presentation/nieuwboekform.php');

}