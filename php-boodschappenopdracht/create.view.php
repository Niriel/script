<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boodschappenlijst</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="./index.php">Lijst</a></li>
            <li><a href="./create.php">Toevoegen</a></li>
        </ul>
    </nav>
    <main>
        <h1>Toevoegen</h1>
        <form>
            <ul>
                <li>
                    <label for="productName">Naam:
                    <input type="text" id="productName" name="productName" value="brood">
                </li>
                <li>
                    <label for="productPrice">Prijs per stuk:
                    <input type="number" id="productPrice" name="productPrice" min="0" step="0.01" value="1.00">
                </li>
                <li>
                    <label for="productQuantity">Aantal:
                    <input type="number" id="productQuantity" name="productQuantity" min="0" step="1" value="1">
                </li>
            </ul>
            <input type="submit" value="Voeg aan de lijst toe">
        </form>
    </main>
</body>
</html>
