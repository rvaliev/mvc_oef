<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update boek</title>
</head>
<body>
<h1>Boek bijwerken</h1>

<form method="post" action="updateboek.php?action=process&id=<?= $boek[0]->getId(); ?>">
    <table>
        <tr>
            <td>Titel:</td>
            <td>
                <input type="text" name="txtTitel" value="<?= $boek[0]->getTitel(); ?>"/>
            </td>
        </tr>
        <tr>
            <td>Genre:</td>
            <td>
                <select name="selGenre">
                    <?php
                    foreach ($genreLijst as $genre) {
                        if ($genre->getId() == $boek[0]->getGenre()->getId()) {
                            $selWaarde = " selected";
                        } else {
                            $selWaarde = "";
                        }

                        ?>
                        <option value="<?= $genre->getId(); ?>" <?= $selWaarde; ?>>
                            <?= $genre->getOmschrijving(); ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Bijwerken"/>
            </td>
        </tr>
    </table>
</form>

</body>
</html>