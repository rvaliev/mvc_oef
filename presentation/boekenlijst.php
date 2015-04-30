<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Boeken</title>
    <style>
        table { border-collapse: collapse; }
        td, th { border: 1px solid black; padding: 3px; }
        th { background-color: #ddd}
    </style>
</head>
<body>
<h1>Boekenlijst</h1>

<table>
    <tr>
        <th>Titel</th>
        <th>Genre</th>
        <th>Action</th>
    </tr>

    <?php
    foreach ($boekenlijst as $boek)
    {
    ?>
        <tr>
            <td>
                <?= $boek->getTitel(); ?>
            </td>
            <td>
                <?php
                /* Resultaat van $boek is deze:
                [id:Boek:private] => 1
                [titel:Boek:private] => Oorlog en Vrede
                [genre:Boek:private] => Genre Object
                (
                    [id:Genre:private] => 2
                    [omschrijving:Genre:private] => Classic
                )
             */?>
                <?= $boek->getGenre()->getOmschrijving(); ?>
            </td>
            <td>
                <a href="verwijderboek.php?id=<?= $boek->getId(); ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>

<a href="voegboektoe.php">Voeg boek toe</a>

</body>
</html>