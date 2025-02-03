<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boodschappenlijst</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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
            <?php foreach ($groceries as $item) : ?>
            <tr>
                <td>
                    <?= $item['name'] ?>
                </td>
                <td class="bedrag, productPrice">
                    <?= $item['price'] ?>
                </td>
                <td>
                    <input type="number" min="0" size="3" class="productQuantity"
                      value="<?= $item['quantity'] ?>"
                    />
                </td>
                <td class="bedrag, productTotalCost">
                    0.00
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

    <!-- SCRIPT -->
    <!-- <script src="script.js"></script> -->
</body>
</html>