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
        <h1>Lijst</h1>
        <table id="groceries">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Prijs</th>
                    <th>Aantal</th>
                    <th>Subtotaal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($groceries as $product) : ?>
                <tr>
                    <td>
                        <?= $product['name'] ?>
                    </td>
                    <td class="bedrag, productPrice">
                        <?= $product['price'] ?>
                    </td>
                    <td>
                        <?= $product['quantity'] ?>
                    </td>
                    <td class="bedrag, productTotalCost">
                    <?= $product['quantity'] * $product['price'] ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Totaal</th>
                    <td class="bedrag, TotalCost">
                        <?= $total_cost ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </main>
    <!-- SCRIPT -->
    <!-- <script src="script.js"></script> -->
</body>
</html>
