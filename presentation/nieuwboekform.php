<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Boek toevoegen</title>
</head>
<body>

    <h1>Nieuw boek toevoegen</h1>

    <form method="post" action="voegboektoe.php?action=process">
        <table>
            <tr>
                <td>
                    Titel:
                </td>
                <td>
                    <input type="text" name="txtTitel"/>
                </td>
            </tr>
            <tr>
                <td>
                    Genre
                </td>
                <td>
                    <select name="selGenre" id="1">
                        <?php
                        foreach ($genreLijst as $genre) {
                        ?>
                            <option value="<?= $genre->getId(); ?>">
                                <?= $genre->getOmschrijving();  ?>
                            </option>
                        <?php
                        }

                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Toevoegen"/>
                </td>
            </tr>
        </table>
    </form>


</body>
</html>